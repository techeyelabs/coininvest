<?php  
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
function __autoload($class_name) { 
    include_once($class_name . ".php"); 
} 

class EgoPayAuth
{
    protected $sAccountName;
    protected $sApiId;
    protected $sSecurityWord;
    
    function __construct($accountName, $apiId, $securityWord)
    {
        $this->sAccountName  = $accountName;
        $this->sApiId        = $apiId;
        $this->sSecurityWord = $securityWord;
    } 
    
    public function getAccountName()
    {
        return $this->sAccountName;
    }
    
    public function getApiId()
    {
        return $this->sApiId;
    }
    
    public function getAuthToken()
    {        
        $sDatePart = gmdate("Ymd:H");
        $sAuthString = $this->sSecurityWord . ":" . $sDatePart;
        $sha256 = bin2hex(mhash(MHASH_SHA256, $sAuthString));
        return strtoupper($sha256);
    }
}

class EgoPayApiException extends Exception {
    
}

class TransactionDetails {
    public  $sId,
            $sDate,
            $fAmount,
            $fFee,
            $sEmail,
            $sType,
            $sDetails,
            $sStatus
        ;
            
  
}
?> 
