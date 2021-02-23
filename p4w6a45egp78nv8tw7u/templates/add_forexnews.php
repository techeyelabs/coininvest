<!--Content Portion Start-->

<? 
	
	//$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = 1"));
	
	
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		
		$pcdesc = $_POST['month_sub'];
		if($pcdesc != '' && $plan_name != '')
		{
			$dt = date('Y-m-d H:i:s');		
			$update=mysql_query("insert into forexnews(news_header,news_description,dt) values('$plan_name','$pcdesc','$dt')");
			$_SESSION['success_flag']='<font color="#006600">Forex News Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=forexnews.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_forexnews.php">';
			exit();
		}
	}
	
	
?>
<div id="primary_right">
 <div class="inner" style="width:900px">
  
<?php require 'include/top/content_management.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                    <h1>Add News</h1>
                    
                    
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


   

      <form name='form1' method='post' action="add_forexnews.php" >
     
                              	<fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>



<p>
							<label>Forex News Header <font color="#FF0000">*</font></label>
							: 
                           <input name="plan_name" type="text" class="tbox1" id="plan_name" value="" /><br /><? if($_SESSION['empty_plan_name']) { echo $_SESSION['empty_plan_name']; $_SESSION['empty_plan_name']=''; } ?>
                              
                             
						</p>
                        
                         <p>
							<label> Forex News Description <font color="#FF0000">*</font></label>
							: 
                           <textarea name="month_sub" rows="10" cols="80" class="tbox1"></textarea>
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?>
						</p>
    
                  
            
              <!--  <tr>
                  <td align="right" class="formtext2"> <span class="redstar">*</span>Site Logo :</td>
                  <td align="left" class="formtext2"><input name="setup" type="file" class="tbox1" id="setup" /> 
                  <br /><img src="../<?$fetch['site_logo']; ?>" width="154px" height="68px" border="0" alt="Logo" /></td>
                </tr>
             -->
              
               
               <div class="clearboth"></div>
						
						<p align="center" style="padding-right: 310px;">
                    
                        <input type="hidden" name="submit" value="1" />
                            <input class="button" type="submit" name="update" value="Submit" />
                        </p>
                        
                        
                        </fieldset>
                        </form>
      
      
      
   
    <div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
<!--Content Portion End-->
