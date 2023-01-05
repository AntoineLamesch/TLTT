<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>TLTTEperlecques</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Html5 Agency Template v1.0">

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="./css/style.css">
  
  <!--Favicon-->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<!-- Header Start -->
<header class="navigation">
  <div class="header-top ">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-2 col-md-4">
          <div class="header-top-socials text-center text-lg-left text-md-left">
           <a href="https://www.facebook.com/TLTTEPERLECQUES" aria-label="facebook"><i class="fab fa-facebook-f"></i></a>
          </div>
        </div>
        <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
          <div class="header-top-info mb-2 mb-md-0">
            <a href="tel:+23-345-67890">Appelez-nous : <span>0321950027</span></a>
            <a href="mailto:support@gmail.com"><i class="fas fa-envelope mr-2"></i><span>tltt.eperlecques@gmail.com</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="navbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg px-0 py-4">
            <a class="navbar-brand" href="index.php">
              TLTT<span>Eperlecques</span>
            </a>
      
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
              aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
            </button>
      
            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="membres_club.html">Membres du club</a>
                </li>
                <li class="nav-item @@service"><a class="nav-link" href="photo.html">Photos</a></li>
				<li class="nav-item">
					<a class="nav-link" href="infos.html">Infos</a>
                </li>
                <li class="nav-item @@contact"><a class="nav-link" href="contact.html">Contact</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
<!-- Header Close -->



<section class ="page-connexion">
<div class = "container">
    <div class="row">
        <div class ="col-md-12">
            <div class = "block text-center">
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="images/images/img-01.png" alt="IMG">
                            </div>
            
                            <form class="login100-form validate-form" action='./connect.php' method='post'>
                                <span class="login100-form-title">
                                    Connexion
                                </span>
            
                                <div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: ex@abc.xyz">
                                    <input class="input100" type="text" name="email" placeholder="Email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </div>
            
                                <div class="wrap-input100 validate-input" data-validate = "Le mot de passe est requis">
                                    <input class="input100" type="password" name="pass" placeholder="Mot de passe">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                
                                <div class="container-login100-form-btn">

                                <?php

                                    require_once './ReCaptcha/autoload.php';
                                    if(isset($_POST['submitpost'])){
                                    if(isset($_POST['g-recaptcharesponse'])){
                                    $recaptcha = new \ReCaptcha\ReCaptcha('6Lcu0UkjAAAAAB4iHnXdrvyDNSDm0xOqc11k9oLI');
                                    $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                                    ->verify($_POST['g-recaptcha-response']);
                                    if ($resp->isSuccess()) {
                                      //var_dump('Captcha Valide');
                                      } 

                                      
                                      else {
                                          $errors = $resp->getErrorCodes();
                                          //var_dump('Captcha Non Valide');
                                          //var_dump($errors);
                                      }
                                    }
                                    } else{
                                      //var_dump('Captcha non rempli');

                                    }

                                  ?>

                                  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                                  <div class="g-recaptcha" data-sitekey="6Lcu0UkjAAAAANqT3TTc6GOH3LEinvmhbY8AbFz1"></div>
                                  <br/>
                                  <input type="submit" value="Se Connecter">
    
                                </div>
            
                                <div class="text-center p-t-12">
                                    <span class="txt1">
                                        Nom d'utilisateur / Mot de passe
                                    </span>
                                    <a class="txt2" href="#">
                                        Perdu?
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                
            
                
            <!--===============================================================================================-->	
                <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
                <script src="vendor/bootstrap/js/popper.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
                <script src="vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
                <script src="vendor/tilt/tilt.jquery.min.js"></script>
                <script >
                    $('.js-tilt').tilt({
                        scale: 1.1
                    })
                </script>
            <!--===============================================================================================-->
                <script src="js/main.js"></script>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Section Testimonial End -->


<footer class="footer section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">CLUB</h4>

          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="../files/Mentions_légales.pdf" download="Mentions_légales.pdf">Mentions Légales</a></li>
            <li><a href="contact.html">Aide</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">LIENS RAPIDES</h4>

          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="membresduclub.php">Membres du club</a></li>
            <li><a href="photo.php">Photos</a></li>
            <li><a href="infos.php">Infos</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6">
        <div class="widget">
          <div class="logo mb-4">
            <h3>TTLT<span>Eperlecques</span></h3>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-btm pt-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            TLTT Eperlecques
          </div>
        </div>
        <div class="col-lg-6 text-left text-lg-right">
          <ul class="list-inline footer-socials">
            <li class="list-inline-item"><a href="https://www.facebook.com/TLTTEPERLECQUES"><i class="fab fa-facebook-f mr-2"></i>Facebook</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
  <span class="icon fa fa-angle-up"></span>
</div>


<!-- 
Essential Scripts
=====================================-->
<!-- Main jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4.3.1 -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!--  Magnific Popup-->
<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- Counterup -->
<script src="plugins/counterup/jquery.waypoints.min.js"></script>
<script src="plugins/counterup/jquery.counterup.min.js"></script>

<!-- Google Map ?key=AIzaSyChX6bpo9uHwVtr9EsCwVwD4vQhVvzDv2A"-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChX6bpo9uHwVtr9EsCwVwD4vQhVvzDv2A" defer></script> 
<script src="plugins/google-map/map.js" defer></script>

<!-- Captcha-->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>



<script src="js/script.js"></script>

</body>

</html>