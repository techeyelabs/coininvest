<?php
require("functions.php");
$action = "pay";
$canDisplayForm = true;
$wasError = false;
if ($action == "pay")
{
	$payerAcct = $admin_lr_id;
	$securityWord = $securityWord;
	$receiverEmail;
	$amount1;
	$apiName;

	$transferList = stripslashes($trsferlist);
	$apiName = stripslashes($apiName);
	$canDisplayForm = false;
	$canDisplayResult = true;


	$request = new TransferRequest($apiName, $securityWord);
	$request->addTransfersFromText($payerAcct, $transferList, $transferListError);	
	$transferListError = str_replace("\n","<br />", $transferListError);

	if ($transferListError != "")
	{
		$wasError = true;
	}
}
if ($canDisplayResult)
{


	$responseContent = $request->getResponse();
	$responseParseErrors = "";
	$responseObjectsCount = 0;
	if (trim($responseContent) != "")
	{
		$responseObjects = $request->parseResponse($responseContent, $responseParseErrors);
		$responseObjectsCount = count($responseObjects);
	}

	if ($responseObjectsCount > 0)
	{

		for ($i = 0; $i < $responseObjectsCount; $i++)
		{
			$ro = $responseObjects[$i];
			if (method_exists($ro, "ApiError"))
			{
					$instantflag = 1;
			}
		}
	}

}





?>		


