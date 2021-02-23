<?php 
    $parseUrl = explode("?", $_SERVER['REQUEST_URI']);
    $parseFile = split('/', $parseUrl[0]);
    if($parseFile[1] == 'login.php'){
        echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
    }

?>
<div class="container-fluid" class="jumpingNav">
    <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black pl-4" id="exampleModalLabel"> User Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="row form-group">
                     
                    </div>
                    <form id="login" method="POST"  style="margin: 0 auto;">
                       <p class="msg" style="color: red;"></p> 
                       <p  class="error_message" style="display:none" ></p> 
                       <p  class="success_message" style="display:none" ></p> 
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="txtUsername">User Name</label>
                                <input type="text" id="txtUsername" name="txtUsername" autocomplete="false" class="form-control inpBox" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="txtPassword">Password</label>
                                <input type="password" id="txtPassword" name="txtPassword" autocomplete="false" class="form-control inpBox" >
                            </div>
                        </div>

                        <div class="form-group text-center" style="margin-bottom:0px; margin-top:30px;">
                                <input type="submit" value="Login" class="btn btn-primary login-submit-btn" style="background-color:#b59966;border-color:#b59966">
                        </div>
                        <div class="text-center mt-2">
                            <div class="" style=" padding-left:5px;padding-right:5px;cursor:pointer;" class="close" data-dismiss="modal" aria-label="Close">
                                <span style="color: #aaa;" data-toggle="modal" data-target="#exampleModalForgetPass">Forget Password</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


