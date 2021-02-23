<!--Content Portion Start-->

<div id="primary_right">
				<div class="inner" style="width:70%">

					<h1>User Management</h1>
                     <?php require 'include/top/user.php'; ?>
				
					<hr />

					<h1>Edit User</h1>
                    
                      <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
                          <?php if($_SESSION['errror_msg'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['errror_msg'].'</font></p> 
						</div> 
					</div>';
						} ?>
                    
         
      <form name='form1' method='post' action="user_validate.php" >
      <fieldset>
						<legend><font color="#FF0000">*</font> = Required Fields</legend>
						
						<h2>Account Information</h2>
      
       <?php
		  	$fetch = mysql_fetch_array(mysql_query("select * from members where member_id=".$_GET['id']));
			
			$intro_name = mysql_fetch_array(mysql_query("select * from members where member_id=".$fetch['intro_id']));
		  	
		  ?>
                
                
                		<p>
							<label>Referral</label>
							: <input type="text" name="intro_name" class="mf" value="<?=$intro_name['username']; $_SESSION['post_intro_name']=''; ?>"> <? if($_SESSION['intro_idflag_sd']) { echo $_SESSION['intro_idflag_sd']; $_SESSION['intro_idflag_sd']=''; } ?>
        
						</p>
                        
                        	<p>
							<label>Username</label>
							:<input type="text" name="txtname" class="mf" value="<?=$fetch['username']; $_SESSION['post_user']=''; ?>">
                            <?php if($_SESSION['empty_user']) { echo $_SESSION['empty_user']; $_SESSION['empty_user']=''; } ?>
							 <?php if($_SESSION['empty_userstr']) { echo $_SESSION['empty_userstr']; $_SESSION['empty_userstr']=''; } ?>
							<?php if($_SESSION['empty_userexist']) { echo $_SESSION['empty_userexist']; $_SESSION['empty_userexist']=''; } ?>
						</p>
                        
                        
                        <p>
							<label>Password</label>
							: <input type="text" name="txtpass" class="mf" value="<?=$fetch['password'];  ?>"> 
				  <? if($_SESSION['empty_pass']) { echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; } ?>
<?php if($_SESSION['empty_passstr']) { echo $_SESSION['empty_passstr']; $_SESSION['empty_passstr']=''; } ?>
						</p>
                        
                  
                    <!-- <p>
							<label>Confirm Password</label>
							: <input type="Password" name="txtcpass" class="mf" value="<?php //=$_SESSION['post_cpass']; $_SESSION['post_cpass']=''; ?>"><br><?php //if($_SESSION['empty_cpass']) { echo $_SESSION['empty_cpass']; $_SESSION['empty_cpass']=''; } ?>
						</p>-->
                        
   
                        <p>
							<label>E-mail Address </label>
							: <input type="text" name="txtmail" class="mf" value="<?=$fetch['member_email']; $_SESSION['post_mail']=''; ?>" /><br> <? if($_SESSION['empty_mail']) { echo $_SESSION['empty_mail']; $_SESSION['empty_mail']=''; } ?>

                 <? if($_SESSION['invaild_mailflag']) { echo $_SESSION['invaild_mailflag']; $_SESSION['invaild_mailflag']=''; } ?>
                </p>
                    
                     <p>
							<label>Full Name </label>
							: <input type="text" name="txtfname"  class="mf" value="<?=$fetch['first_name']; $_SESSION['post_fname']=''; ?>"><br /><? if($_SESSION['empty_fname']) { echo $_SESSION['empty_fname']; $_SESSION['empty_fname']=''; } ?> 
                </p>
                
                 <p>
							<label> Gender  <font color="#FF0000">*</font></label>
							:Male 
                            <?php
							if($fetch['gender'] == 'Male')
							{
								 echo ' <input  type="radio" checked="checked" name="gender" id="gender" value="Male" />';
							}
							else
							{
								   echo '<input  type="radio" name="gender" id="gender" value="Male" />';
							}
							?>
							Female
							<?php
							if($fetch['gender'] == 'Female')
							{
								echo '<input type="radio" checked="checked" name="gender" id="gender" value="Female" />';
							}
							else
							{
								echo '<input type="radio" name="gender" id="gender" value="Female" />';
							}
							?>
                         
                          
                            
						</p>
                        
                         <p>
							<label> Date Of Birth  <font color="#FF0000">*</font></label>
							:
                            
                            <?php 
							$dobarray=explode('-',$fetch['dob']);
							$dbyear=$dobarray[0];
							$dbmonth=$dobarray[1];
							$dbday=$dobarray[2];
							
							
							$day='<select name="day">
							<option value="0">--Day--</option>';
							for($i=1;$i<=31;$i++)
							{
								if($dbday == $i)
								$day.='<option selected="selected" value="'.$i.'">'.$i.'</option>';
								else
								$day.='<option value="'.$i.'">'.$i.'</option>';
							}
							$day.='</select>';
							
							$month='<select name="month">
							<option value="0">--Month--</option>';
							for($j=1;$j<=12;$j++)
							{
								if($dbmonth == $j)
								$month.='<option selected="selected" value="'.$j.'">'.$j.'</option>';
								else
								$month.='<option value="'.$j.'">'.$j.'</option>';
							}
							
							$month.='</select>';
							
								$year='<select name="year">
							<option value="0">--Year--</option>';
							
							
							for($k=1950;$k<=date('Y');$k++)
							{
								
								if(trim($dbyear) == $k)
								$year.='<option  selected="selected" value="'.$k.'">'.$k.'</option>';
								else
								$year.='<option value="'.$k.'">'.$k.'</option>';
								
							}
							$year.='</select>';
							
							echo $day.'&nbsp;'.$month.'&nbsp;'.$year;
							?>
                            <? if($_SESSION['empty_dateofbirth']) { echo $_SESSION['empty_dateofbirth']; $_SESSION['empty_dateofbirth']=''; } ?>
                            
						</p>
                        

 <p>
							<label>Address </label>
							: 
                            <input name="add1" type="text" class="mf" id="add1" value="<?=$fetch['street']; ?>" /><br /><? if($_SESSION['empty_add1']) { echo $_SESSION['empty_add1']; $_SESSION['empty_add1']=''; } ?>
                </p>
       

 <p>
							<label>City </label>
							: <input name="city" type="text" class="mf" id="city" value="<?=$fetch['city']; ?>"  /><br /><? if($_SESSION['empty_city']) { echo $_SESSION['empty_city']; $_SESSION['empty_city']=''; } ?>
                            </p>
    
     <p>
							<label>State/Province </label>
							: <input name="state" type="text" class="mf" id="state" value="<?=$fetch['state']; ?>"   /><br /><? if($_SESSION['empty_state']) { echo $_SESSION['empty_state']; $_SESSION['empty_state']=''; } ?>
                            </p>
                            
                            <p>
							<label> Zip code   </label>
							:<input name="zipcode" type="text" class="mf" id="zipcode" value="<?=$fetch['zipcode']; ?>"   /><? if($_SESSION['empty_zip']) { echo $_SESSION['empty_zip']; $_SESSION['empty_zip']=''; } ?>
						</p>
                            
                                 <p>
							<label>Country </label>
							: <? CreateOption('Country',$fetch['country'],'country_master')?><br /><? if($_SESSION['empty_Country']) { echo $_SESSION['empty_Country']; $_SESSION['empty_Country']=''; } ?>
                            </p>
                
         
                <p>
							<label>Alertpay </label>
							: <input name="alertpay" type="text" class="mf" id="alertpay" value="<?=$fetch['alerypay_num']; $_SESSION['post_alertpay']='';   ?>"   /><br /><? if($_SESSION['empty_alertpay']) { echo $_SESSION['empty_alertpay']; $_SESSION['empty_alertpay']=''; } ?>
                            </p>
                
        <p>
							<label>Liberty Reserve </label>
							:<input name="lr_num" type="text" class="mf" id="lr_num" value="<?=$fetch['lr_num']; $_SESSION['post_lr_num']='';   ?>"   /><br /><? if($_SESSION['empty_lr_num']) { echo $_SESSION['empty_lr_num']; $_SESSION['empty_lr_num']=''; } ?>
                            </p>
                
                
                  <p>
							<label>Security Question </label>
							:<select id="question" class="select_field" name="question" title="If you forget your password we will ask for the answer to your security question">

        <option value="">- Select One -</option>

                          <option value="What is the first name of your favorite uncle?" <? if($fetch['question'] == 'What is the first name of your favorite uncle?') { ?> selected="selected" <? } ?>>What is the first name of your favorite uncle?</option>

                          <option value="Where did you meet your spouse?" <? if($fetch['question'] == 'Where did you meet your spouse?') { ?> selected="selected" <? } ?>>Where did you meet your spouse?</option>

                          <option value="What is your oldest cousins name?" <? if($fetch['question'] == "What is your oldest cousin's name?") { ?> selected="selected" <? } ?>>What is your oldest cousin's name?</option>

                          <option value="What is your youngest childs nickname?" <? if($fetch['question'] == "What is your youngest child's nickname?") { ?> selected="selected" <? } ?>>What is your youngest child's nickname?</option>

                          <option value="What is your oldest childs nickname?" <? if($fetch['question'] == "What is your oldest child's nickname?") { ?> selected="selected" <? } ?>>What is your oldest child's nickname?</option>

                          <option value="What is the first name of your oldest niece?" <? if($fetch['question'] == 'What is the first name of your oldest niece?') { ?> selected="selected" <? } ?>>What is the first name of your oldest niece?</option>

                          <option value="What is the first name of your oldest nephew?" <? if($fetch['question'] == 'What is the first name of your oldest nephew?') { ?> selected="selected" <? } ?>>What is the first name of your oldest nephew?</option>

                          <option value="What is the first name of your favorite aunt?" <? if($fetch['question'] == 'What is the first name of your favorite aunt?') { ?> selected="selected" <? } ?>>What is the first name of your favorite aunt?</option>

                          <option value="Where did you spend your honeymoon?" <? if($fetch['question'] == 'Where did you spend your honeymoon?') { ?> selected="selected" <? } ?>>Where did you spend your honeymoon?</option>

            </select> <br />   <? if($_SESSION['empty_question']) { echo $_SESSION['empty_question']; $_SESSION['empty_question']=''; } ?>
                            </p>
           

  <p>
							<label>Security Answer </label>
							:<input name="sec_ans" type="text" class="mf" id="sec_ans" value="<?=$fetch['answer']; $_SESSION['post_sec_ans'] = ''; ?>"   /><br /><? if($_SESSION['empty_sec_ans']) { echo $_SESSION['empty_sec_ans']; $_SESSION['empty_sec_ans']=''; } ?>
                            </p>
                
                
                  <p>
		<p>
							<label>Status of User </label>
							:<input type="radio" name="status" value="active" <? if($fetch['status'] =='active') echo 'checked="checked"'; ?> />Active&nbsp;&nbsp;<input type="radio" name="status" value="suspended" <? if($fetch['status'] =='suspended') echo 'checked="checked"'; ?> />Suspend&nbsp;&nbsp;
                            </p>
                
               <div class="clearboth"></div>
						
						<p><input type="hidden" name="id" value="<?=$fetch['member_id']; ?>" />
                        <input class="button" type="submit" name="update" id="update"  value="Submit" /> </p>
            
                	
             
      </fieldset>
					</form>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
    
<!--Content Portion End-->
<?php
unset($_SESSION['succ_dir']);
unset($_SESSION['errror_msg']);

?>