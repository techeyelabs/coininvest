<?php
   session_start();
   require( __DIR__ .'/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AtKinSons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

  <?php include('top_nav.php'); ?>
  <?php if(isset($_SESSION['userid'])){?>
    <div class="mobile">
      <?php include('side_menu.php'); ?>
    </div>
  <?php }?>

<div class="site-wrap"id="home-section" >
    <div class="owl-carousel slide-one-item">
      <div class="site-section-cover overlay img-bg-section" style="background-image: url('images/hero_2.jpg'); ">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-8 pr-md-3 pr-0 ">
              <div class="" style="color:#fff">
                <h1 style="">
                  <div class="row align-items-center col-md-12">
                    <div> GOLD -> GBP/OZ</div>
                  </div>
                </h1>
                <div class="bannerFontSize" style="">
                  <div class="row align-items-center col-md-12 pl-md-4 pr-md-3 pr-0">
                    <div class="pr-md-4 pr-3 mypanel"></div>
                    <div class="pr-md-1 arrow  pr-2"></div>
                    <div class="pr-md-4 priceDiffShowClass pr-3"></div>
                    <div class="priceDiffPercentageShowClass" ></div>
                  </div>
                </div>
                
                <p style="margin-bottom:0px">Our rates are updated every 5 seconds providing the most accurate gold prices per oz in the UK. The current price of gold per oz in GBP (£).</p>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section-cover overlay img-bg-section" style="background-image: url('images/hero_1.jpg'); ">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-10">
            <div class="graph"></div>
              <h1>Re-imagining mining to improve people's lives</h1>
              <p>We are working hard to build a brighter and healthier future for our communities, host countries and those who depend on our products every day.</p>
            </div>
          </div>
        </div>
      </div>

      
    </div>



    <div id="about-section">
      <div class="site-section block__73694">
        <div class="container-fluid">
          <div class="row d-flex no-gutters align-items-stretch">

            <div class="col-6 col-lg-3 block__73422" style="background-image: url('images/hero_1.jpg');">
            </div>

            <div class="col-6 col-lg-3 block__73422" style="background-image: url('images/hero_2.jpg');">
            </div>
            
            <div class="col-lg-6 p-lg-5 mt-4 mb-4 mt-lg-0">
              <h2 class="mb-3 text-black" style="color: #c69b5f!important;">DISCOVERING THE POTENTIAL</h2>
              <p class="lead">In many industries, an organisation’s key asset is its people. AtKinSons Bullion Invest & Mining Company 
                has an exceptional and diverse group of people focused on responsible business and value creation for its shareholders 
                and investors.  When a diverse group of experienced and creative professionals with an aligned goal come together, 
                there is a direct correlation to a successful outcome. At AtKinSons, our Board of Directors and management have an aligned goal, 
                our team has extensive experience safely leading senior mining & bullion companies, creating billions of shareholder wealth and 
                have succeeded in discovering, expanding, developing and producing millions of profitable ounces of gold worldwide. </p>
              <p>We embrace change and innovation to help create an aligned team in order to outperform not only our peers but various 
                financial products available in the marketplace today. We are fully invested and aligned with our investors. 
                AtKinSons is a multi-asset gold producer & wholesaler focused on execution and building sustainable value for our shareholders, 
                investors, communities we operate in, and all stakeholders.</p>

              <div class="row mt-3">
                <div class="col-lg-6 pr-0 pr-md-3">
                  <ul class="ul-check primary list-unstyled">
                    <li>World class gold silver terrain</li>
                    <li>Best drilling 6.00 m @ 43.56 g/t gold and 1,618 g/t silver</li>
                    <li>10,000 data point proprietary geochemical data base</li>
                    <li>Extensive high-grade drill intercepts indicate potential. Weak gold market halts exploration</li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="ul-check primary list-unstyled" style="margin-bottom:75px">
                    <li>240,000 hectare land position</li>
                    <li>Several shallow drill programs conducted during next 36 months</li>
                    <li>Large number of anomalies never followed up. Potential for new discoveries</li>
                    <li>High grades gold and silver prospecting samples to 395 g/t gold and 2.3kg silver</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="site-section bg-primary" style="background-color: #6c757d !important;">
        <div class="container">
          <div class="row justify-content-center mb-4 block-img-video-1-wrap">
            <div class="col-md-12 mb-5">
              <figure class="block-img-video-1" data-aos="fade">
                <img src="images/bg_about.jpg" alt="Image" class="img-fluid  mx-auto">
              </figure>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="15">0</span></span>
                    <span class="caption">Year of Experience</span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="392">0</span></span>
                    <span class="caption">Number of Engineers</span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="39332">0</span></span>
                    <span class="caption">Number of Employees</span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                  <div class="block-counter-1">
                    <span class="number"><span data-number="53500">0</span></span>
                    <span class="caption">Number of Golds</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="investors-section">
      <div class="site-section destop" style="padding-bottom:0rem">
        <div class="container" style="padding-top:0rem">
          <div class="row mb-5">
            <div class="col-12">
              <div class="block-heading-1">
                <h2>Investment Plan</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">BRONZE</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">0.1/3.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">0.7</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="block-team-member-1 text-center rounded ">
                <h3 class="font-size-20 text-black">SILVER</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">4/7.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">0.9</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">GOLD</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">8/15.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.2</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>
          </div>

          <div class="row mt-md-4">
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0" data-aos="fade-up"></div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">PLATINUM</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">16/31.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.5</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">365</span>Days</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">BLACK</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">32/500</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.7</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">365</span>Days</p>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200"></div>
          </div>
        </div>
      </div>
<!-- tab view -->
      <div class="site-section tab">
        <div class="container" style="padding-top:3rem">
          <div class="row mb-5">
            <div class="col-12">
              <div class="block-heading-1">
                <h2>Investment Plan</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">BRONZE</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">0.5/3.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">0.7</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="block-team-member-1 text-center rounded ">
                <h3 class="font-size-20 text-black">SILVER</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">4/7.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">0.9</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>
          </div>

          <div class="row mt-md-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">GOLD</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">8/15.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.2</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">180</span>Days</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">PLATINUM</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">16/31.99</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.5</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">365</span>Days</p>
              </div>
            </div>
          </div>

          <div class="row mt-md-4">
            <div class="col-lg-2 col-md-3 mb-md-4 mb-lg-0" data-aos="fade-up"></div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="block-team-member-1 text-center rounded">
                <h3 class="font-size-20 text-black">BLACK</h3>
                <p class="px-3 mb-0">Min/Max Invest : <span style="color:#c69b5f;font-size: 20px;">32/500</span>BTC</p>
                <p class="px-3 mb-0">Interest Rate : <span style="color:#c69b5f;font-size: 20px;">1.7</span>%</p>
                <p class="px-3 mb-0">Duration : <span style="color:#c69b5f;font-size: 20px;">365</span>Days</p>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200"></div>
          </div>
        </div>
      </div>
      
      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="block-heading-1">
                <span>Why Invest in</span>
                <h2>AtKinSons</h2>
              </div>
            </div>
            <div class="col-lg-8">
              <ul class="list-unstyled">
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>ATTRACTIVE TRADING METRICS<br/>Compelling value opportunity due to large annual production, excellent operating track record and relatively low-risk growth opportunities</p>
                </li>
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>BALANCE SHEET STRENGTH AND FLEXIBILITY<br/>Strong position to finance organic development projects with existing liquidity and cash flow generation</p>
                </li>
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>SENIOR GOLD PRODUCER<br/>Large, pure gold producer with a diversified portfolio of mines and development projects. Our operations are located in two core regions: British region and Africa</p>
                </li>
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>TECHNICALLY SKILLED OPERATOR<br/>Among the best safety records in the industry. Achieving operating efficiencies through strong culture of continuous improvement. Developed a range of operating expertise working in variety of environments in both open pit and underground mines</p>
                </li>
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>GROWTH OPPORTUNITIES</br>We continue to advance our portfolio of high quality development projects and future opportunities. Our exploration program has a strong record of extending mine life and is focused on high-quality brownfield targets and the discovery of new resources within existing footprint of our mines.</p>
                </li>
                <li class="mb-4">
                  <h2 class="h4"></h2>
                  <p>INDUSTRY LEADER IN RESPONSIBLE MINING</br>One of the best safety performances in the industry, with reportable injury rates on par with low-risk non-industrial sectors. Lowest energy use and greenhouse gas emission intensities per tonne of ore processed among our gold industry peers.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="site-section bg-light block-13" id="affiliator-section" data-aos="fade">
      <div class="container">
        <div class="text-center mb-5">
          <div class="block-heading-1">
            <h2>Affiliator Commission</h2>
          </div>
        </div>

        <div class="owl-carousel nonloop-block-13">
          <div>
            <div class="block-testimony-1 text-center">
              <blockquote class="mb-4">
                <h3 class="font-size-20 text-black">BRONZE </h3>
                <p class="mb-0"> Level 1 : <span style="color:#c69b5f;font-size: 20px;">7%</span> </p>
                <p class="mb-0"> Level 2 : <span style="color:#c69b5f;font-size: 20px;">1%</span> </p>
                <p class="mb-0"> Level 3 : <span style="color:#c69b5f;font-size: 20px;">1% </span></p>
                <p class="mb-0"> Level 4 : <span style="color:#c69b5f;font-size: 20px;">1% </span></p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="block-testimony-1 text-center">
              <blockquote class="mb-4">
                <h3 class="font-size-20 text-black">SILVER</h3>
                <p class="mb-0"> Level 1 : <span style="color:#c69b5f;font-size: 20px;">9%</span> </p>
                <p class="mb-0"> Level 2 : <span style="color:#c69b5f;font-size: 20px;">3%</span></p>
                <p class="mb-0"> Level 3 : <span style="color:#c69b5f;font-size: 20px;">2%</span> </p>
                <p class="mb-0"> Level 4 : <span style="color:#c69b5f;font-size: 20px;">1%</span></p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="block-testimony-1 text-center">
              <blockquote class="mb-4">
                <h3 class="font-size-20 text-black">GOLD</h3>
                <p class="mb-0"> Level 1 : <span style="color:#c69b5f;font-size: 20px;">11%</span></p>
                <p class="mb-0"> Level 2 : <span style="color:#c69b5f;font-size: 20px;">4%</span></p>
                <p class="mb-0"> Level 3 : <span style="color:#c69b5f;font-size: 20px;">3%</span></p>
                <p class="mb-0"> Level 4 : <span style="color:#c69b5f;font-size: 20px;">2%</span></p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="block-testimony-1 text-center">
              <blockquote class="mb-4">
                <h3 class="font-size-20 text-black">PLATINUM</h3>
                <p class="mb-0"> Level 1 : <span style="color:#c69b5f;font-size: 20p;">13%</span></p>
                <p class="mb-0"> Level 2 : <span style="color:#c69b5f;font-size: 20px;">5%</span></p>
                <p class="mb-0"> Level 3 : <span style="color:#c69b5f;font-size: 20px;">4%</span></p>
                <p class="mb-0"> Level 4 : <span style="color:#c69b5f;font-size: 20px;">3%</span></p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="block-testimony-1 text-center">
              <blockquote class="mb-4">
                <h3 class="font-size-20 text-black">BLACK</h3>
                <p class="mb-0"> Level 1 : <span style="color:#c69b5f;font-size: 20px;">15%</span></p>
                <p class="mb-0"> Level 2 : <span style="color:#c69b5f;font-size: 20px;">6%</span></p>
                <p class="mb-0"> Level 3 : <span style="color:#c69b5f;font-size: 20px;">5%</span></p>
                <p class="mb-0"> Level 4 : <span style="color:#c69b5f;font-size: 20px;">4%</span></p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>






    <div class="site-section" id="press-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="block-heading-1">
              <span>Questions & Answers about</span>
              <h2>AtKinSons</h2>
            </div>
          </div>
          <div class="col-lg-8">
            <ul class="list-unstyled">
              <li class="mb-4">
                <h5 class="h5">1. What is the AtKinSons?</h5>
                <p>AtKinSons offers a compelling investment opportunity as a senior gold producer with an excellent operational track record, strong balance sheet and commitment to responsible mining.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">2. For how many years have you been functional?</h2>
                <p>Founded in 2006, AtKinSons is a senior gold mining company with a diverse portfolio of mines and bullion-investment projects in the British Region, Africa, and Australia. Headquartered in Hertfordshire, UK. AtKinSons employs approximately 39,000 people worldwide.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">3. Can you provide confirmation of your investment records and results?</h2>
                <p>It is regarded as a secret of the company, Data is not open to the public. In this way, bear the criminal risk to us, service, AtKinSons can be characterised as a contradiction investment counsellor with our point of view of business and Exchange Law, to publish this data. As much as we can, we share our achievements on a subjective scale.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">4. How do I sign up with you?</h2>
                <p>In order to sign up you need to register a account by clicking on the SignUp on the website. Then you will process the rest as you just need to investment funds to your account with your favourite payment method with simple www.atkinsonsbullion-invest.com.</p>
              </li>
              <li class="mb-4 hide_seemore">
                <h2 class="h6" style="cursor:pointer;text-align:right;font-size:12px;" onclick="faqExpand()">more Q&A</h2>
              </li>
            </ul>
            <ul class="list-unstyled hide_div">
              <li class="mb-4">
                <h2 class="h5">5. How do I invest funds into my account?</h2>
                <p>You need to use the payment system account to fund to www.atkinsonsbullion-invest.com. Currently, we are using Bitcoin payment system. If you have any questions, please contact us. Details will be replied within 24 hours.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">6. Why use payment systems?</h2>
                <p>Payment System done each transaction is instantaneous and the cost is minimal compared to bank transfer fee, it is a very advantageous approach when transferring funds via the online platform. Because they are very easy to exchange funds with our trading account, it fits our action plan very well.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">7. I would prefer to not create a payment system account, would I be able to invest via bank wire?</h2>
                <p>Bank transfers are expensive and currently accepted only in Bitcoin.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">8. Can I sign up using a credit card?</h2>
                <p>No, direct payment with credit card is not possible in www.atkinsonsbullion-invest.com platform.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">9. What are the requirements for opening an account?</h2>
                <p>You just need to fill out the form with your personal details and BTC wallet address by clicking on the "Register" button at the top of our homepage.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">10. I lost my password. What should I do?</h2>
                <p>Click the reset password link below the log in box, it complies with the provisions of the process. If for some reason it is not successful please contact our support team, we will reset it for you.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">11. Will my initial investment be returned at the expiration of the investment period?</h2>
                <p>Yes, the principal will be returned at the maturity of the investment period.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">12. Who can join AtKinSons investment?</h2>
                <p>Any individuals from all over the world, however, admit you should be no less than 18 years of age in order to create an account.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">13. What kind of invest is available?</h2>
                <p>We are using Bitcoin payment system only.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">14. What is the investment period?</h2>
                <p>The investment period will be 180 days or 365 days depending on the plan.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">15. What is the least investment total?</h2>
                <p>At least investment amount is 0.5BTC.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">16. Can I make more than one active invest?</h2>
                <p>Yes, all investments are taken care of independently and you can make multiple investments in Bitcoin.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">17. Can I cancel my active investment prior to its expiration date?</h2>
                <p>No. you can not cancel until maturity.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">18. At which time can I get back my profit?</h2>
                <p>Everything will be paid-back when you reach maturity.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">19.What is the minimum withdrawal amount?</h2>
                <p>After maturity of investment the minimum withdrawal amount is 0.01BTC</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">20. How can I start withdrawing?</h2>
                <p>You need to login to the member area and click on investment. Next, please select the plan & amount of money.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">21. What is the AtKinSons affiliate program?</h2>
                <p>Our affiliate program is an approach to gain additional money by referring new individuals to AtKinSons. It isn't compulsory to refer others to profit but rather it's an extraordinary approach to expand your earnings. We have a four level deep referral system which implies that you will gain commissions on investments made by people you refer and likewise on deposits made by their referrals.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">22. What amount would I be able to earn from referral commissions?</h2>
                <p>The referral commission earns of 15% in the first level, 6% in the second level, 5% in the third level, 4% in the fourth level.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">23. What is a representative?</h2>
                <p>Representatives are promoters with great promotional aptitudes eager to assist newcomers by means of email, telephone or instant messengers. At the point when another financial investor visits our website initially, they can reach out to a local representative in their native dialect to make inquiries concerning AtKinSons and its business.</p>
              </li>
              <li class="mb-4">
                <h2 class="h5">24. What is the upside of being a representative?</h2>
                <p>The representative earns a higher referral fee.</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>





    <!-- <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1">
              <span></span>
              <h2>Business Content</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/WhyInvest-bg.jpg" style="height:255px"  alt="Image"
                  class="img-fluid rounded"></a>
              <h2><a href="single.html" style="color: #c69b5f">How to Invest In Mining Industry</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2"></span><a
                  href="single.html" class="by"></a></p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat et suscipit iste libero neque. Vitae
                quidem ducimus voluptatibus nemo cum odio ab enim nisi, itaque, libero fuga veritatis culpa quis!</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/hero_3.jpg" alt="Image"
                  class="img-fluid rounded"></a>
              <h2><a href="single.html" style="color: #c69b5f">How to Invest In Mining Industry</a></h2>
              <p class="text-muted mb-3 text-uppercase small"><span class="mr-2"></span><a
                  href="single.html" class="by"></a></p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat et suscipit iste libero neque. Vitae
                quidem ducimus voluptatibus nemo cum odio ab enim nisi, itaque, libero fuga veritatis culpa quis!</p>
            </div>
          </div>

        </div>
      </div>
    </div> -->





    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1">
              <span>Get In Touch</span>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5"></p>
            <p class="msgcontact" style="color: red;"></p> 
            <p  class="success_message_contact" style="display:none" ></p> 
            <form action="" method="post" id="contact">

              <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name" name="name" id="name" required>
                  <?php //if($_SESSION['empty_name']) { echo $_SESSION['empty_name'];  $_SESSION['empty_name']=''; } ?>
                </div>
                <!-- <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="First name">
                </div> -->
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email address" id="emailcontact" name="member_email" required>
                  <?php //if($_SESSION['empty_mail_id']) { echo $_SESSION['empty_mail_id'];  $_SESSION['empty_mail_id']=''; } ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea  class="form-control" placeholder="Write your message." id="message" name="message" cols="30" rows="10" required></textarea>
                  <?php //if($_SESSION['empty_message']) { echo $_SESSION['empty_message']; $_SESSION['empty_message']=''; } ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" id="buttonContactUs" style="background-color: #b59966;border-color: #b59966;" value="Send Message">
                </div>
              </div>

            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <h2 class="text-black">Corporate Office<a href="tel://13923929482"></a>
            </h2>
            <p> 156 Great Charles Street<br/> Birmingham B3 3HN, UK<br/><span style="color: #c69b5f;">info@atkinsonsbullion-invest.com<br/><a href="index.php#home-section" style="color: #c69b5f;">www.atkinsonsbullion-invest.com</a></p>
          </div>
        </div>
      </div>
    </div>  
    <?php 
      $parse =  explode("?", $_SERVER['REQUEST_URI']);
      $intro_name = count($parse) > 1 ? $parse[1] : ''; 
      //print_r($parse);
      $resetPass = split('=' , $intro_name);
      $resetPassCode = count($resetPass) > 1 ? $resetPass[0] : '';

      if(isset($intro_name)&& $intro_name != '')
      {
        if( $resetPassCode == 'code'){
          $_SESSION['introname'] = '';
        }
        // else{
        //   $_SESSION['introname'] = $intro_name;
        // }
        else{
          if(isset($_SESSION['userid'])){
            $refid=mysql_fetch_assoc(mysql_query("SELECT username FROM  members WHERE member_id='".$_SESSION['userid']."'"));
            unset($_SESSION['userid']);
            echo '<meta http-equiv="refresh" content="0;url=index.php?'. $refid['username'].'">'; 
            $_SESSION['introname'] = $intro_name;
          }else{
            $_SESSION['introname'] = $intro_name;
          }
          // echo '<meta http-equiv="refresh" content="0;url=index.php?'. $refid['username'].'">'; 
        }
      }
      // print_r($_SESSION);
    ?>
    <?php 
    // ==================== reset password ========================
    // print_r($_GET['code']);
      if (isset($_GET['code'])) {
        $uid = $_GET['code'];
        $sqlquery= "select * from password_reset where uid='$uid' order by id desc limit 1";
        $row = mysql_fetch_array(mysql_query($sqlquery));
        //print_r($row);
          if(mysql_num_rows(mysql_query($sqlquery)) > 0 ) {
            // valid code
        //  echo "valid code";
          $_SESSION['password_reset_email'] = $row['email'];
          $_SESSION['password_reset_uid'] = $row['uid'];
          $_SESSION['password_reset_status'] = $row['status'];
          echo '<meta http-equiv="refresh" content="0;url=index.php">';  

          }else {
            // invalid code
            unset($_SESSION['password_reset_email']);
            unset($_SESSION['password_reset_status']);
            //echo "invalid code";
          }
      }
    ?>
          


    <?php 
      $files = ['footer','login','registration','forgot_password','reset_password' ];
      foreach ($files as $obj => $value) {      
        require_once($value .".php");
      }
    ?>
</div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

  <!-- Custom scripts -->
  <script src="js/request.js"></script>  
  <script type="text/javascript">
      function goldPrice() {  
        jQuery.getJSON("https://data-asg.goldprice.org/dbXRates/GBP",function(data){
          // handle your JSON results
          var priceDiff = `${data.items[0].chgXau}`;
          if(priceDiff>0){
            var arrowShow = `<div class="bannerArrowUp" ></div>`
            var priceDiffShow = `<span style="color:green">${data.items[0].chgXau.toFixed(2)}</span>`;
            var priceDiffPercentageShow = `<span style="color:green">${data.items[0].pcXau.toFixed(2)} %</span>`;
          }else{
            var arrowShow = `<div class="bannerArrowDown" ></div>`
            var priceDiffShow = `<span style="color:red">${data.items[0].chgXau.toFixed(2)}</span>`;
            var priceDiffPercentageShow = `<span style="color:red">${data.items[0].pcXau.toFixed(2)} %</span>`;
          }
          var text = `${data.items[0].xauPrice.toFixed(2)}`;

          $(".mypanel").html(text);
          $(".arrow").html(arrowShow);
          $(".priceDiffShowClass").html(priceDiffShow);
          $(".priceDiffPercentageShowClass").html(priceDiffPercentageShow);
          setTimeout( goldPrice, 5000);
        });
      } 
      setTimeout( goldPrice, 1000);
  </script>
</body>

</html>