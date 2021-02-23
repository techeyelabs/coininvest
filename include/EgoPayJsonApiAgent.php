<?php
class EgoPayJsonApiAgent
{
    private $sRootUrl = "https://www.egopay.com/api/json/";
    private $oAuth;
    
    function __construct(EgoPayAuth $a)
    {
        $this->oAuth = $a;    
    }
    
    public function getBalance($currency = null)
    {
        $sResponse = $this->getResponse('balance');
        $oBalance = $this->parseResponse($sResponse);
        if($currency !== null)
            if(isset($oBalance->$currency))
                return $oBalance->$currency;
            else
                return null;
        return $oBalance;
    }
    
    public function getFindTransaction($iTransactionId)
    {
        $sResponse = $this->getResponse('findTransaction',array(
            'transactionId' => $iTransactionId
        ));
        
        $oTransactionDetails = $this->parseResponse($sResponse);
        
        return $oTransactionDetails;
    }
    
    public function getTransfer($sPayeeEmail, $fAmount, $sCurrency, $sDetails)
    {
        $sResponse = $this->getResponse('transfer',array(
            'payeeEmail'    => $sPayeeEmail,
            'amount'        => $fAmount,
            'currency'      => $sCurrency,
            'details'       => $sDetails            
        ));
        
        $oTransactionDetails = $this->parseResponse($sResponse);
        
        return $oTransactionDetails;
    }
    
    public function getHistory($aParams = array())
    {
        $sResponse = $this->getResponse('history',$aParams);
        
        $oTransactionsDetails = $this->parseResponse($sResponse);
        
        return $oTransactionsDetails;
    }
   
    private static function generateId()
    {
        return uniqid();
    }
    
    private function buildAuthenticationQuery()
    {
        return array(
            'id'            => $this->generateId(),
            'account_name'  => $this->oAuth->getAccountName(),
            'api_id'        => $this->oAuth->getApiId(),
            'token'         => $this->oAuth->getAuthToken()
        );
    }
    
    private function getResponse($sAction ,$aData = array())
    {
        if (!function_exists('curl_init')) {
            die("Curl library not installed.");
            return false;
        }
        
        $sRequestUrl = $this->sRootUrl.$sAction;
        $aRequestData = array_merge(
            $this->buildAuthenticationQuery(),
            $aData
        );
        
        $sAgent = "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/3.2.1 Safari/525.27.1";
        $handler  = curl_init();
        curl_setopt($handler, CURLOPT_URL, $sRequestUrl);
        curl_setopt($handler, CURLOPT_HEADER, 0);
        curl_setopt($handler, CURLOPT_POST, true);
        curl_setopt($handler, CURLOPT_POSTFIELDS, http_build_query($aRequestData));
        // ignore SSL certificate
        curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($handler, CURLOPT_USERAGENT, $sAgent);
        //curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        ob_start();
        curl_exec($handler);
        curl_close($handler);
        $sContent = ob_get_contents();
        ob_end_clean();
        return $sContent;
    }
    
    private function parseResponse($sResponse)
    {      
        $response = json_decode($sResponse);   
        $this->checkError($response);
        return $response;
    }
     
  
    private function checkError($response)
    {
        if($response === null)
            throw new EgoPayApiException('Invalid Response Format', (int) 0);
        if(isset($response->status) && $response->status == 'ERROR')
            throw new EgoPayApiException($response->error_message, (int) $response->error_code);
    }        
}