<?php 
    $parseUrl = explode("?", $_SERVER['REQUEST_URI']);
    $parseFile = split('/', $parseUrl[0]);
    if($parseFile[1] == 'forgot_password.php'){
        echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
    }
?>

<div class="container-fluid" class="jumpingNav">
    <div class="modal fade" id="exampleModalForgetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black pl-4" id="exampleModalLabel"> Forgot password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <!-- <p>
                        <?php
                        // if($_SESSION['mail_check'] != '')
                        //     {
                        //         echo $_SESSION['mail_check'];
                        //         unset($_SESSION['mail_check']); 
                        //     }
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
                               // } 
                            ?>
                            <?php 
                                //if($_SESSION['mail_not_matched']) 
                                //{ ?>
                                    <li style="color: red;">
                                    <?php 
                                        // echo $_SESSION['mail_not_matched']; 
                                        // $_SESSION['mail_not_matched']=''; 
                                        ?>
                                    </li> 
                                    <?php
                                //}
                            ?>                                               
                        </ul>
                    </p> -->
                    <form id="forPass" method="POST"  style="margin: 0 auto;">
                        <p class="msgforpass" style="color: red;"></p> 
                        <p  class="success_message_forPass" style="display:none" ></p> 
                        <p  class="error_message_forPass" style="display:none" ></p> 
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="txtUsername">Email</label>
                                <input type="email" id="email" name="email" autocomplete="false" class="form-control inpBox" >
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-bottom:0px; margin-top:30px;">
                            <input type="submit" value="Submit" id="forgotPassButton" class="btn btn-primary login-submit-btn" style="background-color:#b59966;border-color:#b59966">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>