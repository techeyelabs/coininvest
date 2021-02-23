<?php
date_default_timezone_set("Europe/London");


$publickey = "6Ld5p70SAAAAAACp9WiouDRAdbEIasylYIoNzyP7";
$privatekey = "6Ld5p70SAAAAAEJC-8PXaN0v9j8RvDhGHfUQAC0k";

# the response from reCAPTCHA
$resp = null;

# the error code from reCAPTCHA, if any
$error = null;
 

    $meta = mysqli_fetch_array(mysqli_query("select * from meta_info where meta_id=1"));
    $pagename = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $sitevalues = mysqli_fetch_array(mysqli_query("select set_value from admin_settings where set_id='44'"));

    $parseUrl = explode("?", $_SERVER['REQUEST_URI']);
    $parseFile = split('/', $parseUrl[0]);
    if($parseFile[1] == 'registration.php'){
        echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
    }

?>


<div class="container-fluid" class="jumpingNav">
    <div class="modal fade" id="exampleModalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-black text-center pl-4" id="exampleModalLabel">User Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body " style="padding:1rem 3rem 2rem 3rem">
                    <p class="msg" >
                        <div  style="list-style: none;">
                            <?php  
                            if(!empty($_SESSION['empty_first_name'])) { 
                                    echo $_SESSION['empty_first_name']; 
                                    echo '<li>';
                                    $_SESSION['empty_first_name']=''; 
                                    echo '</li>';
                                    unset($_SESSION['empty_first_name']);
                                } 
                        
                            if($_SESSION['empty_username']) { 
                                    echo '<li >';
                                echo $_SESSION['empty_username'];  
                                $_SESSION['empty_username']='';
                                    echo '</li>';
                                    unset($_SESSION['empty_username']);
                                    }  
                        
                                if($_SESSION['empty_mail_id']) {
                                    echo '<li >';
                                echo $_SESSION['empty_mail_id'];
                                $_SESSION['empty_mail_id']=''; 
                                echo '</li>';
                                unset($_SESSION['empty_mail_id']);
                            } 
                            if($_SESSION['empty_mail']) {
                                    echo '<li >';
                                echo $_SESSION['empty_mail'];  
                                $_SESSION['empty_mail']=''; 
                                echo '</li>';
                                unset($_SESSION['empty_mail']);
                            }  
                                if($_SESSION['empty_intro_name']) {
                                echo '<li >';
                                echo $_SESSION['empty_intro_name']; 
                                $_SESSION['empty_intro_name']=''; 
                                echo '</li>';
                                unset($_SESSION['empty_intro_name']);
                            }  
                                if($_SESSION['empty_bitcoin']!=='') { 
                                    echo '<li >';
                                echo $_SESSION['empty_bitcoin']; 
                                unset($_SESSION['empty_bitcoin']);
                                    echo '</li>';
                                    unset($_SESSION['empty_bitcoin']);
                                    } 
                        
                                if($_SESSION['empty_pass']) { 
                                    echo '<li >';
                                echo $_SESSION['empty_pass']; 
                                $_SESSION['empty_pass']=''; 
                                    echo '</li>';
                                    unset($_SESSION['empty_pass']);
                            } 
                            
                                if($_SESSION['empty_passstr']) {
                                    echo '<li >';
                                    echo $_SESSION['empty_passstr']; 
                                    $_SESSION['empty_passstr']='';
                                echo '</li>';
                                unset($_SESSION['empty_passstr']);
                                }                                           
                                
                                if($_SESSION['empty_cpass']) {
                                    echo '<li >';
                                    echo $_SESSION['empty_cpass']; 
                                    $_SESSION['empty_cpass']=''; 
                                    echo '</li>';
                                    unset($_SESSION['empty_cpass']);
                                }  
                        
                                if($_SESSION['empty_question']) { 
                                echo '<li >';
                                echo $_SESSION['empty_question']; 
                                $_SESSION['empty_question']='';
                                    echo '</li>'; 
                                    unset($_SESSION['empty_question']);
                                }  
                        
                                if($_SESSION['empty_answer']) {
                                    echo '<li >'; 
                                echo $_SESSION['empty_answer']; 
                                $_SESSION['empty_answer']=''; 
                                    echo '</li>';
                                    unset($_SESSION['empty_answer']);
                                }
                            ?>
                        </div>
                    </p>
                    <?php   ?>
                    <p class="msgreg" style="color: red;"></p>
                    <p  class="error_message_reg" style="display:none" ></p> 
                    <form name="regform" id="regform" method="post">
                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12">   
                                
                                <input type="text" id="first_name" name="first_name" autocomplete="false" class="form-control inpBox" 
                                placeholder="Full Name" value="<?php if($_SESSION['first_name']) { echo $_SESSION['first_name'];
                                     $_SESSION['first_name']=''; } ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12">                                            
                                <input type="text" id="username" name="username" autocomplete="false" class="form-control inpBox" 
                                placeholder="User Name"
                                value="<?php if($_SESSION['username']) { echo $_SESSION['username']; $_SESSION['username']=''; } ?>"    
                                >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">                                            
                                <input type="email" id="member_email" name="member_email" autocomplete="false" class="form-control inpBox"
                                 placeholder="Email" value="<?php if($_SESSION['mail_id']) { echo $_SESSION['mail_id']; $_SESSION['mail_id']=''; } ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12">                             
                                <?php if(strlen($_SESSION['introname'])==0)     { ?>             
                                <input type="text" id="intro_name" name="intro_name" autocomplete="false" class="form-control inpBox" placeholder="Refferal Code">
                            <?php   }else{ ?>
                            
                                <input type="text" id="intro_name" name="intro_name" autocomplete="false" class="form-control inpBox" placeholder="Refferal Code" value="<?php if($_SESSION['introname']) { echo $_SESSION['introname'];  } ?>" readonly >
                            <?php  } ?> 
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 col-sm-11">                                
                                <input type="text" id="bitcoin" name="bitcoin" autocomplete="false" class="form-control inpBox" placeholder="Bitcoin" value="<?php 
                                if(isset($_SESSION['bitcoin'])) { 
                                    echo $_SESSION['bitcoin']; 
                                    $_SESSION['bitcoin']=''; 
                                } ?>">
                            </div>
                        </div>

                            <div class="row form-group">
                            <div class="col-md-12 col-sm-11">                                            
                                <input type="password" id="password" name="password" autocomplete="false" class="form-control inpBox" placeholder="Type Password">
                            </div>
                        </div>    
                            
                        <div class="row form-group">
                            <div class="col-md-12 col-sm-10">                                            
                                <input type="password" id="re_password" name="re_password" autocomplete="false" class="form-control inpBox" placeholder="Retype Password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12">         
                                <select name="question" class="form-control inpBox" id="select2" title="Choose your security question">
                                    <option value="">- Select One -</option>
                                    <option value="What is the first name of your favorite uncle?">What Is your favorite book?</option>
                                    <option value="Where did you meet your spouse?">What is the name of the road you grew up on?</option>
                                    <option value="What is your oldest cousins name?">What is your mother’s maiden name?</option>
                                    <option value="What is your youngest childs nickname?">What was the name of your first/current/favorite pet?</option>
                                    <option value="What is your oldest childs nickname?">What was the first company that you worked for?</option>                           
                                    <option value="What is the first name of your oldest niece?">Where did you meet your spouse?</option>                                     
                                    <option value="What is the first name of your oldest nephew?">Where did you go to high school/college?</option> 
                                    <option value="What is the first name of your favorite aunt?">What is your favorite food?</option>                  
                                    <option value="Where did you spend your honeymoon?">What city were you born in?</option>
                                    <option value="Where did you spend your honeymoon?">Where is your favorite place to vacation? </option>
                                </select>   
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 col-sm-12">        
                                <input type="text" id="answer" name="answer" autocomplete="false" class="form-control inpBox" placeholder="Select Answer"
                                value="<?php if($_SESSION['answer']) { echo $_SESSION['answer']; $_SESSION['answer']=''; } ?>">
                            </div>
                        </div>

                        <?php  if(isset($_SESSION["rep_introname"])){ ?>
                                        <input type="hidden" name="rep_introname" value="<?php echo $_SESSION["rep_introname"]; ?>"/>        
                            <?php               
                            }else{?>
                                    <input type="hidden" name="rep_introname" value=""/>        
                                <?php
                            }
                            ?>
                        <div class="form-group text-center" style="margin-bottom:0px; margin-top:30px;">
                            <input type="submit" value="Submit" style="background-color:#b59966;border-color:#b59966" class="btn btn-primary login-submit-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 