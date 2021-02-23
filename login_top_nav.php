     <!-- Navbar start -->
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" style="margin-top: -30px;">
                            <div class="top">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div id="colorlib-logo">
                                            <a href="index.php">Ab<span>cd</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="loc">
                                            
                                            <p style="padding-top: 23px;">
                                                
                                                <a href="login.php"  style="color:#9bdf46;">Login</a> / <a href="registration.php"  style="color:#9bdf46;">Registration</a>
                                           
                                                  <span class="icon" style="top: 17px !important;">
                                                    <i class="flaticon-healthy-1"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="menu-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8" style="margin-top: -28px;">
                                <div class="menu-1">
                                     <ul>
                                    
                                        <?php if($menuname == 'index.php') { ?>
                                        <li class="active">
                                            <a href="index.php">HOME</a>
                                        </li>
                                    <?php }else { ?>
                                        <li>
                                            <a href="index.php">HOME</a>
                                        </li>
                                    <?php } ?>
                                         <?php if($menuname == 'about-us.php') { ?>
                                        <li  class="active"><a href="about-us.php">ABOUT US</a></li>
                                        <?php }else { ?>
                                        <li>
                                            <a href="about-us.php">ABOUT US</a>
                                        </li>
                                    <?php } ?>
                                       
                                        <?php if($menuname == 'investors.php') { ?>
                                        <li  class="active"><a href="investors.php">INVESTORS</a></li>
                                        <?php }else { ?>
                                        <li>
                                            <a href="investors.php">INVESTORS</a>
                                        </li>
                                    <?php } ?>
                                       
                                        <?php if($menuname == 'faq.php') { ?>
                                        <li  class="active"><a href="faq.php">FAQ</a></li>
                                        <?php }else { ?>
                                        <li>
                                            <a href="faq.php">FAQ</a>
                                        </li>
                                    <?php } ?>

                                         
                                      <!--  <li><a href="#contact">Contact Us</a></li>-->
                                        
                                        
                                    <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){  ?>
                                       <li  class="active"><a href="logout.php">LOGOUT</a></li>
                                        <?php }else { ?>
                                        <li>
                                            <a href="login.php">LOGIN</a>
                                        </li>
                                    <?php } 
                                     ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

