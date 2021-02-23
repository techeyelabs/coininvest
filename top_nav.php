
<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

  <div class="container">
    <div class="row align-items-center position-relative">
      <div class="site-logo ">
        <a href="index.php#home-section" class="text-black"><span class="text-primary" style="color:#b59966!important">AtKinSons</a>
      </div>

      <?php 
        $current_page = split('/',$_SERVER['REQUEST_URI'] );
      ?>

      <div class="col-12">
        <nav class="site-navigation text-center " role="navigation">
          <?php if (!isset($_SESSION['userid'])) { ?>
            <ul class="site-menu-desktop js-clone-nav ml-auto site-nav-wrap-desktop " >
              <li><a href="#home-section" class="nav-link destop">Home</a></li>
              <li><a href="#about-section" class="nav-link destop">About Us</a></li>
              <li><a href="#investors-section" class="nav-link destop">Investors</a></li>
              <li><a href="#affiliator-section" class="nav-link destop">Affiliator</a></li>
              <li><a href="#press-section" class="nav-link destop">Q&A</a></li>
              <li><a href="#contact-section" class="nav-link destop">Contact Us</a></li>
            </ul>
          <?php } else { ?>
            <?php if ($current_page[1] == 'index.php') { ?>
              <ul class="site-menu-desktop js-clone-nav ml-auto site-nav-wrap-desktop " >
                <li><a href="#home-section" class="nav-link destop">Home</a></li>
                <li><a href="#about-section" class="nav-link destop">About Us</a></li>
                <li><a href="#investors-section" class="nav-link destop">Investors</a></li>
                <li><a href="#affiliator-section" class="nav-link destop">Affiliator</a></li>
                <li><a href="#press-section" class="nav-link destop">Q&A</a></li>
                <li><a href="#contact-section" class="nav-link destop">Contact Us</a></li>
              </ul>
            <?php }else{ ?>
              <ul class="site-menu-desktop js-clone-nav ml-auto site-nav-wrap-desktop " >
                <li><a href="index.php" class="nav-link destop">Home</a></li>
                <li><a href="index.php#about-section" class="nav-link destop">About Us</a></li>
                <li><a href="index.php#investors-section" class="nav-link destop">Investors</a></li>
                <li><a href="index.php#affiliator-section" class="nav-link destop">Affiliator</a></li>
                <li><a href="index.php#press-section" class="nav-link destop">Q&A</a></li>
                <li><a href="index.php#contact-section" class="nav-link destop">Contact Us</a></li>
              </ul>
            <?php } ?>
          <?php } ?>
        </nav>
      </div>


      <div class="toggle-button align-items-center d-flex destop">
        <table>
          <tbody>
            <tr>
              <?php if (!isset($_SESSION['userid'])) { ?>
                <td>
                  <div class="btn btn-primary" style="background-color: #b59966; border-color: #b59966;">
                    <span style="color: #fff;" data-toggle="modal" data-target="#exampleModalLogin">LogIn</span>&nbsp; / &nbsp;<span style="color: #fff;" data-toggle="modal" data-target="#exampleModalReg">SignUp</span>
                  </div>
                </td>
              <?php } else { ?>
                <td>
                  <span><a href="account.php" style="color: #000"><?php echo $_SESSION['username_real']; ?></a></span>
                </td>
              <?php }?>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="toggle-button align-items-center d-flex mobile">
        <table>
          <tbody>
            <tr>
              <?php if (!isset($_SESSION['userid'])) { ?>
                <td>
                  <div class="btn btn-primary" style="background-color: #b59966; border-color: #b59966; padding-left:5px;padding-right:5px">
                    <span style="color: #fff;" data-toggle="modal" data-target="#exampleModalLogin">LogIn</span>&nbsp; / &nbsp;<span style="color: #fff;" data-toggle="modal" data-target="#exampleModalReg">SignUp</span>
                  </div>
                </td>
              <?php } else { ?>
                <td>
                  <a class="site-menu-toggle p-1 js-menu-toggle text-black d-inline-block d-lg-none d-flex">
                    <span class="icon-menu h3 m-0"></span>
                  </a>
                </td>
              <?php }?>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</header>