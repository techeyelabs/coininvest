<?php 
    $parseUrl = explode("?", $_SERVER['REQUEST_URI']);
    $parseFile = split('/', $parseUrl[0]);
    if($parseFile[1] == 'forgot_password.php'){
        echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
    }
?>
<div class="container-fluid" class="jumpingNav">
    <div class="modal fade" id="exampleModalPassReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalPassReset" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black pl-4" id="exampleModalPassReset"> Reset password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div class="row form-group">
                     
                    </div>
                    <?php 
                        $uid = $_SESSION['password_reset_uid'];
                        $row = mysql_fetch_array(mysql_query("select * from password_reset where uid=$uid order by id desc limit 1"));
                    ?>
                    <form id="passReset" method="POST"  style="margin: 0 auto;">

                        
                            
                        <!-- <p>
                            <?php
                                // if (isset($_SESSION['mail_check'])) {
                                //     echo $_SESSION['mail_check'];
                                //     unlink($_SESSION['mail_check']);
                                // }
                            ?>
                        </p>
                        <p class="msg" style="color: red;">
                        <?php
                            // if($_SESSION['invalid'] != '')
                            // {
                            //     unset($_SESSION['invalid']);    
                            // }
                        ?>  
                        <ul>
                        <?php //if($_SESSION['empty_mail_id']) {  ?>
                            <li style="color: red;">
                                <?php 
                                    // echo $_SESSION['empty_mail_id'];  
                                    // $_SESSION['empty_mail_id']='';
                                ?>
                            </li>
                            <?php               
                                //} 
                            ?>
                            <?php 
                                // if($_SESSION['mail_not_matched']) 
                                // { ?>
                                <li style="color: red;"><?php 
                                    // echo $_SESSION['mail_not_matched']; 
                                    // $_SESSION['mail_not_matched']=''; 
                                    ?>
                                    </li> 
                                    <?php
                                //}
                                ?>                                               
                            </ul>
                        </p> -->
                        
                         

                        <input type="hidden" id="uid" name="uid" value="<?php echo $row['uid'] ; ?>" class="form-control inpBox" >
                        <input type="hidden" id="email" readonly name="email" autocomplete="false" value="<?php echo $row['email'];?>" class="form-control inpBox" >
                        <!-- <input type="hidden" id="uid" name="uid" value="1021601476151" class="form-control inpBox" >
                        <input type="hidden" id="email" readonly name="email" autocomplete="false" value="raisulislam.50@gmail.com" class="form-control inpBox" > -->

                        <p class="msgpassreset" style="color: red;"></p> 
                        <p  class="success_message_resPass" style="display:none" ></p> 
                        <p  class="error_message_resPass" style="display:none" ></p> 
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="txtUsername">New Password</label>
                                <input type="password" id="new_password" name="new_password" autocomplete="false" class="form-control inpBox" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="txtPassword">Confirm Password</label>
                                <input type="password" id="new_confirm_password" name="new_confirm_password" autocomplete="false" class="form-control inpBox" >
                            </div>
                        </div>

                        <div class="form-group text-center" style="margin-bottom:0px; margin-top:30px;">
                            <input type="submit" value="submit" class="btn btn-primary login-submit-btn" id="resPassButton" style="background-color:#b59966;border-color:#b59966">
                        </div>
                    </form>
                    <div style="text-align:center">
                        <?php 
                            if($row['uid'] == '')
                            {
                                echo '<span style="color:#000;text-align:center">Token has expired.<span class="" style=" padding-left:5px;padding-right:5px;cursor:pointer;" class="close" data-dismiss="modal" aria-label="Close">
                                            <span style="color: #aaa;" data-toggle="modal" data-target="#exampleModalForgetPass">Forget Password</span>
                                        </span></span>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


