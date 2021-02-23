



<!--Content Portion Start-->
<?php
error_reporting(0);
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
	$fetcha1=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 1"));
	$fetcha2=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 3"));
	$fetcha9=mysql_fetch_array(mysql_query("select * from admin_settings where set_id = 45"));
	$fetcha3=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 31"));
	$fetcha4=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 32"));
	$fetcha6=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 36"));
	$fetcha7=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 37"));
	$fetch44=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 64"));
	$fetch45=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 65"));
	$fetch46=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 66"));
	$fetch47=mysql_fetch_assoc(mysql_query("select * from admin_settings where set_id = 67"));
	$fetch8=mysql_fetch_assoc(mysql_query("select * from site_statistics where stat_id = 1"));
	$fetch1=mysql_fetch_array(mysql_query("select * from meta_info where meta_id = 1"));
	
	
	$fetch_image1 = mysql_fetch_array(mysql_query("select * from sitebanner where id = 1"));
	$fetch_image2 = mysql_fetch_array(mysql_query("select * from sitebanner where id = 2"));
	$fetch_image3 = mysql_fetch_array(mysql_query("select * from sitebanner where id = 3"));
	$fetch_image4 = mysql_fetch_array(mysql_query("select * from sitebanner where id = 4"));
	
	
	
	if(count($_POST) > 0)
	{

	if(isset($_POST['update']))
	{
			if($_FILES['site_logo']['name'] != '')
		{
		
		 $site_logo = $_FILES['site_logo']['name'];   
	//echo $site_logo;  break;
	
	
	$site_image_type = $_FILES['site_logo']['type'];
/*	$ebook_path = $_FILES['ebook_path']['name'];
	$ebook_path_type = $_FILES['ebook_path']['type'];
*/	
	if($site_logo == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_site_logo']="<span class='validate_error'>Please select the Image</span>";
	}
	else
	{
		if(!($site_image_type=="image/pjpeg" || $site_image_type=="image/gif" || $site_image_type=="image/jpeg" || $site_image_type=="image/bmp" || $site_image_type=="image/png"))
		{
			$firstnameflag=1;
			$_SESSION['empty_site_logo']="<font color='#FF0000' size=1>Please enter the Vaild Image</font>";
		}
		else
		{
			$uploads=$site_logo;
			$uploads = date('YmdHis').rand(0,999).$uploads;
			$uploads1="../uploadimages/".$uploads;
			move_uploaded_file($_FILES["site_logo"]["tmp_name"],$uploads1);
			$new_ebook_image = "uploadimages/".$uploads;
		}
		
	}
		$up_image="update admin_settings set set_value='$new_ebook_image' where set_id='44'"; 
		
		
		
		mysql_query($up_image);
		
		
		
		}
	
	}
	
	
	if(count($_POST) > 0)
	{
		if(isset($_POST['update']))
		{
			if($_FILES['site_banner']['name'] != '')
			{
				 $path="../banner/";
				 
				 $site_banner = $_FILES['site_banner']['name'];  
				 $temp_name   = $_FILES['site_banner']['tmp_name']; 
				 $rand 		  = rand(0,999).'_'.$site_banner;
				 $source      =  $path.$rand;
				
				 move_uploaded_file($temp_name,$source);
		
				$up_image1 = mysql_query("update sitebanner set image = '".$rand."' where id = 1 "); 
			}
			
			/*if($_FILES['site_banner1']['name'] != '')
			{
				 $path="../banner/";
				 
				 $site_banner = $_FILES['site_banner1']['name'];  
				 $temp_name   = $_FILES['site_banner1']['tmp_name']; 
				 $rand 		  = rand(0,999).'_'.$site_banner;
				 $source      =  $path.$rand;
				
				 move_uploaded_file($temp_name,$source);
		
				$up_image1 = mysql_query("update sitebanner set image = '".$rand."' where id = 2 "); 
			}
			
			if($_FILES['site_banner2']['name'] != '')
			{
				 $path="../banner/";
				 
				 $site_banner = $_FILES['site_banner2']['name'];  
				 $temp_name   = $_FILES['site_banner2']['tmp_name']; 
				 $rand 		  = rand(0,999).'_'.$site_banner;
				 $source      =  $path.$rand;
				
				 move_uploaded_file($temp_name,$source);
		
				$up_image1 = mysql_query("update sitebanner set image = '".$rand."' where id = 3 "); 
			}

			if($_FILES['site_banner3']['name'] != '')
			{
				 $path="../banner/";
				 
				 $site_banner = $_FILES['site_banner3']['name'];  
				 $temp_name   = $_FILES['site_banner3']['tmp_name']; 
				 $rand 		  = rand(0,999).'_'.$site_banner;
				 $source      =  $path.$rand;
				
				 move_uploaded_file($temp_name,$source);
		
				$up_image1 = mysql_query("update sitebanner set image = '".$rand."' where id = 4 "); 
			}*/


		}
	}
	
	
	
	
	
	
	if($_POST['submit'])
	{

		$site_name = $_POST['site_name'];
		$admin_mail = $_POST['admin_mail'];
		$meta_title = $_POST['meta_title'];
		$meta_keyword = $_POST['meta_keyword'];
		$meta_desc = $_POST['meta_desc'];
		$googleanalytical = $_POST['googleanalytical'];
		$site_url = $_POST['site_url'];
				
				
				$parter_admin_mail = $_POST['parter_admin_mail'];
				$footer = $_POST['footer'];
				$siteofflinemessage=$_POST['siteofflinemessage'];
		if(isset($_POST['userlogin']) && $_POST['userlogin'] != '' )
		{
			$userlogin = 'on';
		}
		else
		{
			$userlogin = 'off';
		}
		if(isset($_POST['userreg']) && $_POST['userreg'] != '' )
		{
			$userreg = 'on';
		}
		else
		{
			$userreg = 'off';
		}				
			
		if(isset($_POST['unique_email']) && $_POST['unique_email'] != '' )
		{
			$unique_email = 'on';
		}
		else
		{
			$unique_email = 'off';
		}
		if(isset($_POST['unique_ip']) && $_POST['unique_ip'] != '' )
		{
			$unique_ip = 'on';
		}
		else
		{
			$unique_ip ='off';
		}
		
		if(isset($_POST['sitestatus']) && $_POST['sitestatus'] != '' )
		{
			$sitestatus = 'on';
		}
		else
		{
			$sitestatus ='off';
		}
		
	$site_start= $_POST['site_start'];
		
		
		$update1=mysql_query("update admin_settings set set_value='$site_name' where set_id = 1 ");
		
		$update2=mysql_query("update admin_settings set set_value='$admin_mail' where set_id = 3 ");
		
			$update3=mysql_query("update admin_settings set set_value='$unique_email' where set_id = 31");
				$update4=mysql_query("update admin_settings set set_value='$unique_ip' where set_id = 32");
				
				$update5=mysql_query("update site_statistics set site_val='$site_start' where stat_id = 1");
				
				$update10=mysql_query("update admin_settings set set_value='$sitestatus' where set_id = 64");
				$update11=mysql_query("update admin_settings set set_value='$siteofflinemessage' where set_id = 65");
				$update12=mysql_query("update admin_settings set set_value='$userlogin' where set_id = 66");
				$update13=mysql_query("update admin_settings set set_value='$userreg' where set_id = 67");
				
				mysql_query("update admin_settings set set_value='".$googleanalytical."' where set_id = 36");
				
				mysql_query("update admin_settings set set_value='".$site_url."' where set_id = 37");
				
				mysql_query("update admin_settings set set_value='".$footer."' where set_id = 45");
				
				
					mysql_query("update admin_settings set set_value='".$parter_admin_mail."' where set_id = '41'");
				
				
		
		$update3=mysql_query("update meta_info set meta_title='$meta_title', meta_keyword='$meta_keyword', meta_desc = '$meta_desc' where meta_id='1'");
		
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=site_settings.php" />';
		exit();
	}
	
	}

	
	
?>

<?php
	$sitevalues=mysql_fetch_array(mysql_query("select * from admin_settings where set_id ='44'"));
	$business_day=mysql_fetch_array(mysql_query("select * from admin_settings where set_id ='51'"));

?>


<?php
	$sitevalues1=mysql_fetch_array(mysql_query("select * from admin_settings where set_id ='46'"));


?>
 <form action="site_settings.php" method='post' enctype="multipart/form-data" name='form1' >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/site_settings.php'; ?>

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Site Settings</h1>
                      <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
              <?php if($_SESSION['empty_pass'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						</div> 
					</div>';
						} ?>
                        
                        
                        
					<fieldset>
						<legend>Manage your Site Settings</legend>
                        
                        <p>
							<label>Site Started Date:</label>
                            
						                           
                            <input name="site_start" type="text" class="mf" id="site_start" value="<?php echo $fetch8['site_val']; ?>" />
							<?php if($_SESSION['empty_site_start']) { echo $_SESSION['empty_site_start']; $_SESSION['empty_site_start']=''; } ?>
							
						</p>
						
						
						<p>
							<label>Site Name:</label>
						                           
                            <input name="site_name" type="text" class="mf" id="plan_name" value="<?php echo $fetcha1['set_value']; ?>" />
							<?php if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
                        
                        <p>
							<label>Site URL:</label>
						                           
                            <input name="site_url" type="text" class="mf" id="site_url" value="<?php echo $fetcha7['set_value']; ?>" />
							<?php if($_SESSION['empty_site_url']) { echo $_SESSION['empty_site_url']; $_SESSION['empty_site_url']=''; } ?>
							
						</p>
						
						
                 	<p>
							<label>Admin Mail Id:</label>
						<input name="admin_mail" type="text" class="mf" id="month_sub" value="<?php echo $fetcha2['set_value']; ?>"  />     <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
							
						</p>
                        
                        <p>
							<label>Footer Content:</label>
						<input name="footer" type="text" class="mf" id="footer" value="<?php echo $fetcha9['set_value']; ?>"  />     <? if($_SESSION['empty_footer']) { echo $_SESSION['empty_footer']; $_SESSION['empty_footer']=''; } ?>
							
						</p>
						
		
						<p>
							<label>Site Meta Title:</label>
							<input name="meta_title" type="text" class="mf" id="plan_name" value="<?php echo $fetch1['meta_title']; ?>" /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
							
						</p>
                        
              <p>
							<label>Site Meta Keywords:</label>
						<input name="meta_keyword" type="text" class="mf" id="setup" value="<?php echo $fetch1['meta_keyword']; $_SESSION['setup']='';?>"  /> 
                  <?php if($_SESSION['empty_setup']) { echo $_SESSION['empty_setup']; $_SESSION['empty_setup']=''; } ?>
						</p>
              <p>
                <label>Site Logo:</label>
               <input name="site_logo" type="file" class="mf" id="site_logo" value="<?php echo $sitevalues['site_logo']; ?>" />
                <?php if($_SESSION['empty_site_logo']) { echo $_SESSION['empty_site_logo']; $_SESSION['empty_site_logo']=''; } ?>
                <img  border="0" src="../<?=$sitevalues['set_value']; ?>" alt="" height="60" width="250" />
                
              </p>
              
              
              
               <p>
                <label>Site Banner:</label>
               <input name="site_banner" type="file" class="mf" id="site_banner" value="<?php echo $sitevalues['site_banner']; ?>" />
                <?php if($_SESSION['empty_site_banner']) { echo $_SESSION['empty_site_banner']; $_SESSION['empty_site_banner']=''; } ?>
				<img  border="0" src="../banner/<?=$fetch_image1['image']; ?>" alt="" height="60" width="250" />
              </p>
			  
			  
<!--               <p>
                <label>Site Banner2:</label>
               <input name="site_banner1" type="file" class="mf" id="site_banner1" value="<?php echo $sitevalues['site_banner']; ?>" />
			   <img  border="0" src="../banner/<?php echo $fetch_image2['image']; ?>" alt="" height="60" width="250" />
              </p>
			  
			  
               <p>
                <label>Site Banner3:</label>
               <input name="site_banner2" type="file" class="mf" id="site_banner2" value="<?=$sitevalues['site_banner']; ?>" />
			   <img  border="0" src="../banner/<?=$fetch_image3['image']; ?>" alt="" height="60" width="250" />
              </p>


               <p>
                <label>Site Banner4:</label>
               <input name="site_banner3" type="file" class="mf" id="site_banner3" value="<?=$sitevalues['site_banner']; ?>" />
			   <img  border="0" src="../banner/<?=$fetch_image4['image']; ?>" alt="" height="60" width="250" />
              </p>
-->			  
			  
			  
			  
			  
			  
			  
<p>
							<label>Site MetaDescription:</label>
							<textarea rows="5" cols="50" class="mf" name="meta_desc"><?php echo $fetch1['meta_desc']; ?></textarea><? if($_SESSION['empty_pdesc']) { echo $_SESSION['empty_pdesc']; $_SESSION['empty_pdesc']=''; } ?>
                           
							
						</p>
                        
                        <p>
							<label>Google Analytical Code:</label>
							<textarea rows="5" cols="50" class="mf" name="googleanalytical"><?php echo $fetcha6['set_value'];?></textarea>
                           
							
						</p>
                        
                         <p>
							<label>Allow User Login :</label>
                         
                            <input type="checkbox" <?php if($fetch46['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="userlogin" />
                      
                            <?php if($_SESSION['userlogin']) { echo $_SESSION['userlogin']; $_SESSION['userlogin']=''; } ?>
                            
							
							
						</p>
                        
                         <p>
							<label>Allow User Registration :</label>
                         
                            <input type="checkbox" <?php if($fetch47['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="userreg" />
                      
                            <? if($_SESSION['userreg']) { echo $_SESSION['userreg']; $_SESSION['userreg']=''; } ?>
                            
							
							
						</p>
      
                     	
                          <p>
							<label>Check Ip  :</label>
                            
                     <input type="checkbox" <?php if($fetcha4['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="unique_ip" />
                                                   
                                                   
                          
                            
							 <?php if($_SESSION['unique_ip']) { echo $_SESSION['unique_ip']; $_SESSION['unique_ip']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Site Status  :</label>
                            
                     <input type="checkbox" <?php if($fetch44['set_value'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="sitestatus" />
                                                   
                                                   
                          
                            
							 <?php if($_SESSION['sitestatus']) { echo $_SESSION['sitestatus']; $_SESSION['sitestatus']=''; } ?>
							
						</p>
                        
                         <p>
							<label>Site Offline Message  :</label>
                        
                        <textarea rows="5" cols="50" class="mf"  name="siteofflinemessage"><?php echo $fetch45['set_value']; ?></textarea>
                        
                        </p>
                       					
						<div class="clearboth"></div>
						
					<p align="center" style="padding-right:400px">
                    
                         <input type="hidden" name="submit" value="1" />
                       <input class="button" type="submit" value="Submit" name="update" /></p>
					</fieldset>	
				</div> <!-- inner -->
			</div>
</form>
