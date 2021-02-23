<?php
	require '../include/connect.php';
	
	require_once('paypal.class.php');
	
	$p = new paypal_class;
	
	if ($p->validate_ipn()) 
	{
	  
	   $postcontent='<table cellpadding="0" cellspacing="0" border="0" width="549">';
		 
	    foreach($_POST as $key=>$value)
		{
			$postcontent.='<tr>
                			<td valign="top" align="left" width="150"><p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica,
							 sans-serif; font-size:12px; line-height:22px; color:#555555;">'.$key.'</p></td><td valign="top" align="left" width="10">
							 <p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; color:#555555;">:</p>
							 </td><td valign="top" align="left" width="440"><p style="margin:5px 0; padding:0; font-family:Verdana, Arial, Helvetica, sans-serif; 
							 font-size:12px; line-height:22px; color:#555555; font-weight:bold;">'.$value.'</p></td>
               </tr>';
		}
		
		$postcontent.='</table>';
		
		$table = html_entity_decode($postcontent);
		
		$reference_id 	=   base64_decode($_POST['custom']);
		$ex      		=   explode(',',$reference_id);
		$userid         =   $ex[0];
		$amount 		=   $ex[1];
		$transactionid	=	$_POST['txn_id'];
		$paymentid		=	1;		                       
		$amount			= 	$_POST['mc_gross'];
		require '../successdata.php';
	}
	
	
	

?>