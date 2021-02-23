<!--Content Portion Start-->
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-type:attachment; filename=user-excel.xls");
 if(!in_array("Financials",$permission)) 
 {  
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit(); 
 }
?>
<?php error_reporting(1);?>
<?php
 if(!in_array("User",$permission)) 
 { 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit(); 
 }
?>
 <?php require 'include/page1.php'; ?>
<?php
if(isset($_POST['bulk_delete_submit']))
{ 
		//print_r($_POST['chkSub']);
		//exit;

$count = sizeof($_POST['chkSub']);
for($i=0;$i<$count;$i++)
{
$mem_id = $_POST['chkSub'][$i];
         
	if($mem_id)
	{	
		echo $mem_id;		
		$select_delete = mysql_query("select * from deposit where member_id='$mem_id'");	 
		while($fetch_delete = mysql_fetch_array($select_delete))
		{
			$deposit_id = $fetch_delete['deposit_id'];
			$delte5=mysql_query("delete from sub_deposit where deposit_id='$deposit_id'"); 
			$delte1=mysql_query("delete from deposit where deposit_id='$deposit_id'");
			
		}
		
		$delte2=mysql_query("delete from history where user_id='$mem_id'");
		$delte3=mysql_query("delete from members where member_id='$mem_id'");	
		//exit();
	}
}

	if($delte2)
	{
		$_SESSION['success_flag']="<font color='#004000'><b>User Successfully Deleted</b></font>";
		header("Location:user.php?status=active");
	}
}
	if($_POST['cana'] == 1)
	{
		if(isset($_POST['update']))
		{
			$coid=$_POST['chkSub'];
			if(count($coid) > 0)
			{
			for($i=0;$i<count($coid);$i++) 
			{
				$cnid=$coid[$i];
				$characters = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z");
				$keys = array();
				while(count($keys) < 3) 
				{
					$x = mt_rand(0, count($characters)-1);
					if(!in_array($x, $keys)) 
					{
					   $keys[] = $x;
					}
				}
				foreach($keys as $key)
				{
				   $random_chars .= $characters[$key];
				}
				$rand = rand(0,999);
				$userid = $random_chars.date('md').$rand;
				$query="update  members set status='active' where member_id ='".$cnid."' "; 
				mysql_query($query);

				$query_y="select * from members where member_id ='".$cnid."'";
				$fetch1111 = mysql_fetch_array(mysql_query($query_y));

				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];

				$adminmail=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 3"));
				$adminmail=$adminmail['set_value'];

				$siteurl=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= 37"));
				$siteurl=$siteurl['set_value'];
				
				$message='<table cellspacing="0" cellpadding="40" border="0" width="98%">
  <tbody>
       <tr>
      <td bgcolor="#f7f7f7" width="100%" style="font-family: lucida grande,tahoma,verdana,arial,sans-serif;"><table cellspacing="0" cellpadding="0" border="0" width="620">
          <tbody>
           <tr>
              <td style="background:url(\''.$siteurl.'/images/top_bg.gif\');"><img src="'.$siteurl.'/images/logo.jpg" width="236px" height="73px"></td>
           </tr>
            <tr>
              <td valign="top" style="background-color: rgb(255, 255, 255); border-bottom: 1px solid rgb(59, 89, 152); border-left: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); font-family: lucida grande,tahoma,verdana,arial,sans-serif; padding: 15px;"><table width="100%">
                  <tbody>
                    <tr>
                      <td align="left" width="470px" valign="top" style="font-size: 12px;"><div style="margin-bottom: 15px; font-size: 13px;">Hi '.$fetch1111['first_name'].',</div>
                       <div style="margin-bottom: 15px;">Your account has been Activated Successfully</div>
                        <div style="margin-bottom: 15px;">User Id: '.$fetch1111['username'].'</div>
                        <div style="margin-bottom: 15px;">Password: '.$fetch1111['password'].'</div>
                        <div style="margin: 0pt;">Thanks,<br>
			'.$sitename.'</div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
	  <tr>
             <td style="background:url(\''.$siteurl.'/images/top_bg.gif\'); color:#FFFFFF; height:30px; padding-left:20px; font-family:Arial, Helvetica, sans-serif; font-size:12px">Copyright &copy; '.date('Y').' '.$sitename.'</td>
            </tr>
        </table></td>
    </tr>
      </tbody>
</table>';

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: '.$sitename.'Email Confirmation <'.$adminmail.'>' . "\r\n";
				mail($fetch['member_email'],"Account Information",$message,$headers);
			}

			$_SESSION['success_flag']="<font color='#004000'><b><center>Successfully Users Activated</center></b></font>";
			echo '<meta http-equiv="refresh" content="0;url=user.php?status=new" />';
			exit();
			}
		}
	}
	
	
	/*if(isset($_POST['excel']) && $_POST['excel'] == 1 )
	{
					 if(isset($_GET['status']) && $_GET['status'] != '')
					   {
						    $status=trim($_GET['status']);
					   }
					   else
					   {
						   $status='active';
					   }	  
				

						if(isset($_GET['country']) && trim($_GET['country']) != '')
						{
							$countrysql=" AND country='".$_GET['country']."'";
						}
						else
						{
							$countrysql='';
						}				   

					$exportuserids='';
					if(count($_POST['chkSub']) > 0)
					{
						foreach($_POST['chkSub'] as $key=>$item)
						{
							$exportuserids.=$item.',';
						}
						$userids=rtrim($exportuserids,',');
		 				$sql = mysql_query("select * from members where status= '".$status."' AND member_id IN(".$userids.") ");
					}
					else
					{
						$sql =mysql_query("select * from members where status= '".$status."'");					
					}
		   
			$exceloutput='<table width="1%" border="1" >
				<tr>
                             <th width="10%" ><strong>Username</strong></th>
 			<th width="10%" ><strong>Email Id</strong></th>
			<th width="10%" ><strong>Name</strong></th>
			<th width="10%"><strong>Country</strong></th>
			<th width="10%" ><strong>Sponsor Name </strong></th>						
			<th width="10%" ><strong>Member Since</strong></th>                            
			</tr>';

		if(mysql_num_rows($sql) > 0)
		{
			while($data=mysql_fetch_assoc($sql))
			{
					if($data['intro_id']!='')
					{
							$select_spon=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['intro_id']));
							$direct=$select_spon['username'];
					}
					else
					{
							$direct="None";
					}
					$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$data['country']."'"));

				$exceloutput.='<tr><td >'.$data['username'].'</td>
						<td >'.$data['member_email'].'</td>
				               <td >'.$data['first_name'].'&nbsp;'.$fetch['last_name'].'</td>
				               <td>'.$country['country'].'</td>
					       <td>'.$direct.'</td>
						<td>'.$data['date_of_join'].'</td></tr>';			
			}
		}
		else
		{
		 $exceloutput.=' <tr>
		    <td class="alert_stxt" valign="top" align="center" colspan="7">No Records Found</td>
		    </tr>';
		}
	  		$exceloutput.='</table>';
				$sitename=mysql_fetch_array(mysql_query("select * from admin_settings where set_id= '1'"));
				$sitename=$sitename['set_value'];
				 $filename = $sitename."_".$_GET['status']."userdetails_" .date('Ymd') .".xls"; 
				  file_put_contents($filename, $exceloutput);
			echo '<meta http-equiv="refresh" content="0;url=' . $filename . '"';							
	}*/
	
?>

<div id="primary_right">
       <div class="inner" >
	<?php require 'include/top/user.php';?>
		 <!-- end dashboard items -->        
              
	<h1 style="color:#fff" >View <?php echo ucfirst($_GET['status']); ?> Users</h1>
  <?php if($_SESSION['success_flag']) { 
	?>

	 <div class="notification success"> 
		<span></span> 
		<div class="text"> 
			<p><strong>Success!</strong> <?php echo $_SESSION['success_flag']; $_SESSION['success_flag']=''; ?> </p> 
		</div> 
	  </div>
    <?php
    } 
    ?>
 
     <?php 					
	    /*  excel
	    
	    echo '<div align="right">
                <form method="post" action="templates/user_excel.php">
                <input type="image"  border="0" style="border-width:0px;" src="assets/images/excel.jpeg" name="excelexport" id="excelexport" />           
               <input type="hidden" name="excel" value="submit" />            
                </form> </div>'; */
?>
     <div>           
<?php
	 //print_r($_GET['act']);
		$cur_link = $_SERVER['PHP_SELF'].'?act='.$_GET['act'];
?>
          
          <?php if($_SESSION['success_flag'] != '')
	  { 
		  echo '<div class="notification success"> 
				<span></span> 
				<div class="text"> 
					<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
				</div> 
			 </div>';
	} 
?>

<?php
	if($_GET['status']=='active')
	{
		$status = "active ";
	}	
	else if($_GET['status'] =='new')
	{
		$status = "new";
	}	
	else if($_GET['status'] =='suspended')
	{
		$status = "suspended";
	}	
	else if($_GET['status'] =='duplicate')
	{
		$select = "duplicate";
	}	
	else
	{
		$select = "SELECT * FROM members";
	}
	

	if(isset($_POST['search']))
	{
		  $select = "SELECT * FROM members WHERE ";			  
							  
		  if($_POST['username']!='' && $_POST['username']!='User Name')
		 {
			$select.='username = "'.$_POST['username'].'"';
		 }
		 else
		 {
			$select.='';
		 }

	         if($_POST['email']!='' && $_POST['email']!='E-Mail ID')
		 {
			$select.='member_email = "'.$_POST['email'].'"';
		 }
		 else
		 {
			$select.='';
		 }		
				
		 if($_POST['country']!='' && $_POST['country']!='Country')
		 {
			$select.='country = "'.$_POST['country'].'"';
		 }
		 else
		 {
			$select.='';
		 }
	
	         if($_POST['sponser']!='Sponsor Name' && $_POST['sponser']!='')
		 {
			$select.='intro_id = "'.$_POST['sponser'].'"';
		 }
		 else
		 {
			$select.='';
		 }
						

	
		if($username != '')
		{	
			$addsql.=" AND username='".$username."'";
		}
		if($email != '')
		{
			$addsql.=" AND member_email ='".$email."'";
		}

		if($country != '')
		{
			$country_id = mysql_fetch_array(mysql_query("select country_id from country_master where country='".trim(ucfirst($country))."'"));
			$addsql.=" AND country ='".$country_id['country_id']."'";
		}
		if($sponsor != '')
		{
		$intro_id = mysql_fetch_array(mysql_query("select member_id from members where username='".$sponsor."'"));													
			$addsql.=" AND intro_id='".$intro_id['member_id']."'";
		
		}
	}
		
				
/*				 if(isset($_POST['status']) && $_POST['status'] != '')
					   {
						    $status=trim($_POST['status']);
					   }
					   else
					   {
						   $status='active';
					   }*/
				

						/*if($_GET['act'] == 'active')
						{					
							 $cat = 'active';
						}

						else if($_GET['act'] =='new')
						{				
							$cat = 'new';
						}
						else
						{
							 $cat = 'matured';
						}*/

						/*echo "<pre>";
						print_r($_GET);*/

				
			$sql = "select * from members where status= '".$status."' order by member_id desc";
				
				//echo $sql;echo '<br>';
				//echo $addsql;exit;

				// if(isset($_POST['search']))
				// {	 
				// 	if(isset($_POST['username']))
				// 	{
				// 	$queryCondition .= "AND username LIKE '%" . $_POST['username'] . "%'";					
				// 	}
				// 	if(isset($_POST['email']))
				// 	{
				// 	$queryCondition .= "AND member_email LIKE '%" . $_POST['email'] . "%'";
				// 	}
				// 	if(isset($_POST['cou']))
				// 	{
				// 	$queryCondition .= "AND country LIKE '%" . $_POST['cou'] . "%'";
				// 	}
				// if($queryCondition )
	 			// 	$sql = "select * from members where status= '".$status."'".$queryCondition;				
				// 	}

				$query = $sql.$addsql;
				$total_pages = mysql_num_rows(mysql_query($query));
				//$limit = 25; 	
				if(isset($_GET['page']))
				{
					$page=intval(trim($_GET['page']));
				}
				else
				{
					$page=1;
				}

				if($page) 
					$start = ($page - 1) * $limit; 		
				else
					$start = 0;	
							
					
				//$query = $query." order by date_of_join desc limit $start, $limit";
				$select_company = mysql_query($query);							
				//$link=$_SERVER['PHP_SELF'];
				$link='http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?status='.trim($status).'&page=';	
				//$paging=newpage($page,$total_pages,$limit,$link);
				//echo $paging;
		?>


<form name="chk_bx" method="post" onsubmit="javascript:return condel();">
			<table class="normal fullwidth table table-striped table-hover table-bordered" id="editable-sample">
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="10%" class="col-width"></colgroup>
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="10%" class="col-width"></colgroup>
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="5%" class="col-width"></colgroup>
				   <colgroup width="50%" class="col-width"></colgroup>
				   <colgroup width="50%" class="col-width"></colgroup>
				<thead>
				<tr>
                             <?php 
				if($_GET['status'] =='new') 
				{ 
				echo ' <form name="frm1" method="post" action="user.php?status='.$_GET['status'].'">';
	echo '<input type="submit" name="update"  value="Active" class="button_link" id="update" /><input type="hidden" name="cana" value="1" /> ';
				
				 } 

				if($_GET['status'] == 'new')
				{
			echo '<th width="10%"><input type="checkbox" name="chkMain" onClick="chkall();" class="check" value="" id="select_all"></th>';
				}
				else
				{
echo ' <td width="5%" valign="middle" style=" background: -moz-linear-gradient(center top , #FBFBFB, #F5F5F5) repeat scroll 0 0 transparent;
					border-bottom: 1px solid #CCCCCC;">
<input type="checkbox" name="chkMain" onClick="chkall();" class="check" value="" id="select_all">				
						</td>';
				echo ' <th width="10%"><strong>Username</strong></th>';
				}
		?>
			<th width="56"><strong>Password</strong></th>			 
			<th width="56"><strong>Email Id</strong></th>
			  <th width="56"><strong>Name</strong></th>
			  <th width="379"><strong>Country</strong></th>
			  <th width="102" nowrap="nowrap"><strong>Sponsor Name </strong></th>						
                              <th width="75" nowrap="nowrap"><strong>Total Deposit</strong></th>
			      <th width="98"  nowrap="nowrap"><strong>Member Since</strong></th>
                              <th width="92"><strong>Options</strong></th>                               
		</tr>
	</thead>
		
	<!-- 			    
	<tfoot>
            <tr>
                <th>User Name</th>
                <th>Email ID</th>
                 <th>Name</th>
                <th>Country</th>
                <th>Sponsor Name</th>                           
            </tr>
        </tfoot> 
        -->

	<tbody>             	                        
<?php
				//$select_company = mysql_query("SELECT a.*,b.username,c.plan_type,d.payment_name FROM `deposit` a, members b,plan c,payment_process d where a.member_id=b.member_id and a.plan_id = c.plan_id and a.payment_thro = d.payment_id and a.status='$cat'");
					

				$i=0;
				if(mysql_num_rows($select_company) > 0)
				{
					while($fetch = mysql_fetch_array($select_company))
					{
						$i++;
						$value = $i % 2;
						if($value ==0)
						{
							$class = "odd";
						}
						else
						{
							$class = "";
						}

						if($fetch['intro_id']!='')
						{
							$select_spon=mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['intro_id']));
							$direct=$select_spon['username'];
						}
						else
						{
							$direct="None";
						}

						$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$fetch['country']."'"));
				

						//*********AVAILABLE BALANCE*************//
						$total_earning_query="select sum(amount) as tot_earnings from history where user_id=".$fetch['member_id']." and 
							(type='intrest_earned' or type='bonus' or type='commissions' or type='release_deposit' 
							or type='internal_transaction_receive')";

						$total_earning_result=mysql_query($total_earning_query);
						$total_earning_row=mysql_fetch_array($total_earning_result);
						$total_earnings=$total_earning_row['tot_earnings'];

					

						if(!$total_earnings) { $total_earnings=0; }

					

	$tesql="select sum(amount) as total_with from history where user_id=".$fetch['member_id']." and (type='withdrawal' or type='withdraw_pending' or type='penality') order by type";
						$teres=mysql_query($tesql);			

						if(mysql_num_rows($teres)>0)
						{
							$terow=mysql_fetch_array($teres);
							$total_withdraw=$terow['total_with'];
						}
						else
						{
							$total_withdraw=0;
						}
						

						$available = number_format($total_earnings - $total_withdraw,8);
						$total_deposit=mysql_fetch_array(mysql_query("select sum(amount) as tot_deposit from deposit where member_id=".$fetch['member_id']));
						$total_deposit = $total_deposit['tot_deposit'];

						if(!$total_deposit) $total_deposit =0;	


				echo '<tr class="'.$class.'">';
				if($_GET['status'] =='new') 
				{ 
				echo '<td ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="'.$fetch['member_id'].'" />
		  <input type="hidden" name="id" value="'.$fetch['member_id'].'"></td>';
				} 
				else
				{ 	
			echo '<td ><input name="chkSub[]" id="chkSub" type="checkbox" class="check" value="'.$fetch['member_id'].'" />			
		  </td>';			  
				 echo '<td id="test">
<div class="fade_hover tooltip" title="clik to view the '.$fetch['first_name'].'&nbsp;'.$fetch['last_name'].' details">
				 <a href="view_users.php?id='.$fetch['member_id'].'" style="text-decoration:none;color:#353535;">'.$fetch['username'].'</a>
				  </div>
		</td>';
		 }
		 
		 

$vpass_res = mysql_fetch_array(mysql_query("select * from pass_saver where username='".$fetch['username']."' and user_email='".$fetch['member_email'] ."'"  ));

//$vpass_res['password']
			echo ' <td >'. $fetch['readable_pass'] .' </td>';
                echo ' <td >'.$fetch['member_email'].'</td>
                  <td >'.$fetch['first_name'].'&nbsp;'.$fetch['last_name'].'</td>
                  <td>'.$country['country'].'</td>
                  <td>'.$direct.'</td>
		  <td>&#x0e3f;'.number_format($total_deposit,8).'</td>
	   <td >'.$fetch['date_of_join'].'</td>	';
	$table_action='<td>';               

		if($_GET['status'] != 'new')
	 	{
			$table_action.='<a href="edit_user.php?id='.$fetch['member_id'].'" title="Edit this user" class="tooltip table_icon"><img src="assets/icons/actions_small/Pencil.png" alt="" /></a>&nbsp;
			 <a href="user_validate.php?pass_id='.$fetch['member_id'].'&&status='.$_GET['status'].'&&usertype=user" class="tooltip table_icon" title="Forgot password" onClick="javascript:return resend();"><img src="assets/icons/small_icons_2/comments.png" width="16" height="16" alt="" /></a>

	<a href="sendmail1.php?id='.$fetch['member_id'].'&&status='.$_GET['status'].'" title="Contact User" class="tooltip table_icon">
                                    <img src="assets/icons/small_icons_2/messages.png" width="16" height="16" alt="" /></a>';
			}
                          echo $table_action;  
							
?>          
                 			
   <a href="user_validate.php?mem_id=<?php echo $fetch['member_id']; ?>" title="Delete this user" class="tooltip table_icon" onClick="javascript:return condelete('<?php echo $fetch['username']; ?>');"><img src="assets/icons/actions_small/Trash.png" alt="" /></a>
                                </td>
                 <!--
                 <a href="user_validate.php?mem_id='.$fetch['member_id'].'"
                 javascript:return condelete('.$fetch['username'].');
                 -->                                                         

</tr>
<?php
  	}

}else {
		echo '<tr><td class="alert_stxt" valign="top" align="center" colspan="10">No Records Found</td></tr>';   
    }
?>           
 </tr></tbody>
 
<!--           <div style="display:none;" class="exerror">No Records Found</div> -->

         </table>
    <input style="color:#888" type="submit" name="bulk_delete_submit" value="Delete"/>
  </form>
<div class="clearboth"></div>
</div> <!-- inner -->
</div>
       
<script language="javascript1.2">
function condelete()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this Deposit ?");
return confrm;
}

function payment()
{
var confrm;
confrm=window.confirm("Are You sure you want to confirm this Deposit ?");
return confrm;
}

function condel()
{
var confrm;
confrm=window.confirm("Are You sure you want to delete this Records?");
return confrm;
}

</script>
<script language="JavaScript">
function chkall()
{
	len=document.chk_bx.chkSub.length;
	if(len > 1) 
	{
		for(i=0;i<len;i++)
		{
			if(document.chk_bx.chkMain.checked==true) 
			{
				document.chk_bx.chkSub[i].checked=true;
			}
			else 
			{
				document.chk_bx.chkSub[i].checked=false;
			}
		}
	}
	else
	{
			if(document.chk_bx.chkMain.checked==true)
			{
					document.chk_bx.chkSub.checked=true;
			}
			else
			{
				document.chk_bx.chkSub.checked=false;
			}
	}
}
</script>