<?php
class EgoPaySoapApiAgent
{
    private $sRootUrl = "https://www.egopay.com/api/soap?wsdl";
    private $sHeaderUrl = "https://www.egopay.com/api/soap/";
    private $oAuth;
    private $oClient;
    
    function __construct(EgoPayAuth $a)
    {
        $this->oAuth = $a;        
    }        
    
    private function setupCredentials()
    {                
        $this->oClient = new SoapClient($this->sRootUrl);
        $oHeader = new SoapHeader($this->sHeaderUrl, "authenticate", 
                new SoapVar($this->buildAuthenticationQuery(), SOAP_ENC_OBJECT));        
        $this->oClient->__setSoapHeaders(array($oHeader));                                       
        
    }
    
    public function getBalance($sCurrency = null)
    {        
        $this->setupCredentials();
           
        $oBalance = $this->oClient->balance();
        if($sCurrency !== null)
        if(isset($oBalance->$sCurrency))
            return $oBalance->$sCurrency;
        else
            return null;
        
        return $oBalance;
    }
       
    public function getHistory($aParams = array())
    {        
        $this->setupCredentials();
        $oHistory = $this->oClient->history($aParams);
        return $oHistory;
    }
    
    public function getFindTransaction($aParams = array())
    {
        $this->setupCredentials();
        $oTransaction = $this->oClient->findTransaction($aParams);
        return $oTransaction;
    }
    
    public function getTransfer($aParams = array())
    {
        $this->setupCredentials();
        $oTransfer = $this->oClient->transfer($aParams);
        return $oTransfer;
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
}