
<?php
 if(!in_array("User",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
?><!--Content Portion Start-->
<div id="primary_right">
				<div class="inner" style="width:70%">

					<h1 style="color:#fff" >User Management</h1>
                    <?php require 'include/top/user.php'; ?>
			<hr />

					<h1 style="color:#fff" >Create Representative</h1>
                    
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

    
						 
					  <input type="hidden" name="intro_name" class="mf" value="0">  
				 
                        
     <p>
							<label>Username <font color="#FF0000">*</font></label>
							: <input type="text" name="txtname" class="mf" value="<?=$_SESSION['post_user']; $_SESSION['post_user']=''; ?>"> <? if($_SESSION['empty_user']) { echo $_SESSION['empty_user']; $_SESSION['empty_user']=''; } ?>

                                                  <? if($_SESSION['empty_userstr']) { echo $_SESSION['empty_userstr']; $_SESSION['empty_userstr']=''; } ?>

                                                  <? if($_SESSION['empty_userexist']) { echo $_SESSION['empty_userexist']; $_SESSION['empty_userexist']=''; } ?>
						</p>
                        
                           <p>
							<label> Password<font color="#FF0000">*</font></label>
							: <input type="password" name="txtpass" class="mf" value="<?=$_SESSION['post_pass']; $_SESSION['post_pass']=''; ?>">      <? if($_SESSION['empty_pass']) { echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; } ?>

                                                  <? if($_SESSION['empty_passstr']) { echo $_SESSION['empty_passstr']; $_SESSION['empty_passstr']=''; } ?>
						</p>
                        
                        <p>
							<label> Confirm Password  <font color="#FF0000">*</font></label>
							:<input type="Password" name="txtcpass" class="mf" value="<?=$_SESSION['post_cpass']; $_SESSION['post_cpass']=''; ?>"><? if($_SESSION['empty_cpass']) { echo $_SESSION['empty_cpass']; $_SESSION['empty_cpass']=''; } ?>
						</p>
                        
                        <p>
							<label> E-mail Address  <font color="#FF0000">*</font></label>
							:<input type="text" name="txtmail" class="mf" value="<?=$_SESSION['post_mail']; $_SESSION['post_mail']=''; ?>" /> <? if($_SESSION['empty_mail']) { echo $_SESSION['empty_mail']; $_SESSION['empty_mail']=''; } ?>

                             <? if($_SESSION['invaild_mailflag']) { echo $_SESSION['invaild_mailflag']; $_SESSION['invaild_mailflag']=''; } ?>
						</p>
     
      
                        <p>
							<label> Full Name  <font color="#FF0000">*</font></label>
							:<input type="text" name="txtfname"  class="mf" value="<?=$_SESSION['post_fname']; $_SESSION['post_fname']=''; ?>"><? if($_SESSION['empty_fname']) { echo $_SESSION['empty_fname']; $_SESSION['empty_fname']=''; } ?> 
						</p>
                        
                        
                         <p>
							<label> Gender  <font color="#FF0000">*</font></label>
							:Male <input checked="checked" type="radio" name="gender" id="gender" value="Male" />
                            Female <input type="radio" name="gender" id="gender" value="Female" />
						</p>
                        
                          <p>
							<label> Date Of Birth  <font color="#FF0000">*</font></label>
							:
                            
                            <?php 
							$day='<select name="day">
							<option value="0">--Day--</option>';
							for($i=1;$i<=31;$i++)
							{
								if($_SESSION['old_date'] == $i)
								$day.='<option selected="selected" value="'.$i.'">'.$i.'</option>';
								else
								$day.='<option value="'.$i.'">'.$i.'</option>';
							}
							$day.='</select>';
							
							$month='<select name="month">
							<option value="0">--Month--</option>';
							for($j=1;$j<=12;$j++)
							{
								if($_SESSION['old_month'] == $j)
								$month.='<option selected="selected" value="'.$j.'">'.$j.'</option>';
								else
								$month.='<option value="'.$j.'">'.$j.'</option>';
							}
							
							$month.='</select>';
							
								$year='<select name="year">
							<option value="0">--Year--</option>';
							
							
							for($k=1950;$k<=date('Y');$k++)
							{
								if($_SESSION['old_year'] == $k)
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
							<label> Address  </label>
							:<input name="add1" type="text" class="mf" id="add1" value="<?=$_SESSION['post_address'];  $_SESSION['post_address']=''; ?>" /><? if($_SESSION['empty_add1']) { echo $_SESSION['empty_add1']; $_SESSION['empty_add1']=''; } ?>
						</p>

                            

 
						 <input name="add2" type="hidden" class="mf" id="add2" value=""  />
              
               
                        <p>
							<label> City  </label>
							:<input name="city" type="text" class="mf" id="city" value="<?=$_SESSION['post_city'];  $_SESSION['city']=''; ?>"  /><? if($_SESSION['empty_city']) { echo $_SESSION['empty_city']; $_SESSION['empty_city']=''; } ?>
						</p>
                        <p>
							<label> State/Province   </label>
							:<input name="state" type="text" class="mf" id="state" value="<?=$_SESSION['post_state']; $_SESSION['post_state']='';  ?>"   /><? if($_SESSION['empty_state']) { echo $_SESSION['empty_state']; $_SESSION['empty_state']=''; } ?>
						</p>
                        
                         <p>
							<label> Zip code   </label>
							:<input name="zipcode" type="text" class="mf" id="zipcode" value="<?=$_SESSION['post_zip']; $_SESSION['post_zip']='';  ?>"   /><? if($_SESSION['empty_zip']) { echo $_SESSION['empty_zip']; $_SESSION['empty_zip']=''; } ?>
						</p>

                         <p>
       							<label> Country  <font color="#FF0000">*</font> </label>
							:<?php CreateOption('Country',$_SESSION['post_country'],'country_master')?><? if($_SESSION['empty_country']) { echo $_SESSION['empty_country']; $_SESSION['empty_country']=''; } $_SESSION['post_country'] =''; ?>
						</p>

                         <input name="pm_num" type="hidden" class="mf" id="pm_num" value="0"   />
						 <input name="st_pay" type="hidden" class="mf" id="st_pay" value="0"   />
						 <input name="paypal" type="hidden" class="mf" id="paypal" value="0"   />
						 
						<p>
							<label> Bitcoin ID  </label>
							:<input name="bitcoin" type="text" class="mf" id="bitcoin" value="<?=$_SESSION['post_bitcoin']; $_SESSION['post_bitcoin']='';   ?>"   /><? if($_SESSION['empty_bitcoin']) { echo $_SESSION['empty_bitcoin']; $_SESSION['empty_bitcoin']=''; } ?>
						</p>
					 
						  <input name="payeer" type="hidden" class="mf" id="payeer" value="0"   /> 
						 <input name="neteller" type="hidden" class="mf" id="neteller" value="0"   /> 
						 <input name="skrill" type="hidden" class="mf" id="skrill" value="0"   /> 
						 <input name="Advcash" type="hidden" class="mf" id="Advcash" value="0"   /> 
						 <input name="lr_num" type="hidden" class="mf" id="lr_num" value="0>"   />
						 
						 <p>
							<label> Security Question  <font color="#FF0000">*</font></label>
							:<select id="question" class="select_field" name="question" title="If you forget your password we will ask for the answer to your security question">
                            <option value="">- Select One -</option>
                          <option value="What is the first name of your favorite uncle?">What is the first name of your favorite uncle?</option>
                          <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
                          <option value="What is your oldest cousins name?">What is your oldest cousin's name?</option>
                          <option value="What is your youngest childs nickname?">What is your youngest child's nickname?</option>
                          <option value="What is your oldest childs nickname?">What is your oldest child's nickname?</option>
                          <option value="What is the first name of your oldest niece?">What is the first name of your oldest niece?</option>
                          <option value="What is the first name of your oldest nephew?">What is the first name of your oldest nephew?</option>
                          <option value="What is the first name of your favorite aunt?">What is the first name of your favorite aunt?</option>
                          <option value="Where did you spend your honeymoon?">Where did you spend your honeymoon?</option>
                            </select>
                            <? if($_SESSION['empty_question']) { echo $_SESSION['empty_question']; $_SESSION['empty_question']=''; } ?>
						</p>

                        <p>
							<label> Security Question  <font color="#FF0000">*</font></label>
							:<input name="sec_ans" type="text" class="mf" id="sec_ans" value="<?=$_SESSION['post_sec_ans']; $_SESSION['post_sec_ans'] = ''; ?>"   /><? if($_SESSION['empty_sec_ans']) { echo $_SESSION['empty_sec_ans']; $_SESSION['empty_sec_ans']=''; } ?>
						</p>


			            <div class="clearboth"></div>
						
						<p style="padding-left:200px;"><input class="button admin-btn" type="submit" value="Submit"  name="update" id="update"/> <!--<input class="button" type="reset" value="Reset" />--></p>
					</fieldset>
					</form>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
            <?php 
unset($_SESSION['succ_dir']);
unset($_SESSION['errror_msg']);
?>