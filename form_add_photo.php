<?php


if (session_status() == PHP_SESSION_NONE) { session_start(); }

spl_autoload_register(function ($class_name) {
    include_once ('class/' . $class_name . '.class.php');
});



?>





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
  <link href="css/horaires.css" rel="stylesheet" media="all">
  
  <!--Favicon-->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />  <style type="text/css">
      #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
          height:400px;
          width:80%;
          margin-top : 5em;
          margin : auto;
          display: block;
          
       
         
      }
      .map_container{

        border-width:1px;
        border-style : solid;
        border-color:black;


      }
  </style>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7834018884545942"
     crossorigin="anonymous"></script>

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
          <a href="tel:+33 3 21 95 00 27">Appelez-nous : <span>0321950027</span></a>
            <a href="mailto:tltt.eperlecques@gmail.com"><i class="fas fa-envelope mr-2"></i><span>tltt.eperlecques@gmail.com</span></a>          </div>         
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
					<a class="nav-link" href="membres_club.php">Membres du club</a>
                </li>
                <li class="nav-item @@service"><a class="nav-link" href="photo.php">Photos</a></li>
				<li class="nav-item">
					<a class="nav-link" href="infos.php">Infos</a>
                </li>
                <li class="nav-item @@contact"><a class="nav-link" href="contact.php">Contact</a></li>
                
             
            
            <?php if (isset($_SESSION['FirstName']) && isset($_SESSION['LastName'])) {echo "<div class = 'u_info_isCo'><div class='ele1'>".$_SESSION['FirstName']."   ".$_SESSION['LastName']."</div> <div class='ele2'><a href='./deconnexion.php'>Déconnexion</a></div></div><a href = 'https://www.google.com'><i class='ti-calendar color-one text-md'></i></a>";}else{echo "<span class='u_info_isDeco'><a href = './connexion.php'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-door-open' viewBox='0 0 16 16'>
                <path d='M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/>
                <path d='M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z'/>
                </svg>connexion</a></span>";}?>
            </div>

            </ul>
          </nav>

          
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Header Close -->


<div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Formulaire d'ajout de photos</h2>
                </div>
                <div class="card-body">
                    <form action='./i_photos.php' method="POST">

                    <div class="form-row">
                            <div class="name">Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Type">
                                            <option disabled="disabled" selected="selected">Choisir</option>
                                            <option>Membres</option>
                                            <option>Photos</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name">Nom</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Nom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Prenom</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Prenom">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Role</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Role">
                                    <label class="label--desc">Ex : Secrétaire</label>
                                </div>
                            </div>
                        </div>

                       
                        
                        <label for="file">Fichier</label>
                        <input type="file" name="file">
                        
                        
                        
                        <?php

                        /*

                        if(isset($_FILES['file'])){
                        $tmpName = $_FILES['file']['tmp_name'];
                        $name = $_FILES['file']['name'];
                        $size = $_FILES['file']['size'];
                        $error = $_FILES['file']['error'];
                        move_uploaded_file($tmpName, './upload/'.$name);
                        }
                        */
                        ?>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

<!-- Slider Start -->

<footer class="footer section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">CLUB</h4>

          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="../files/Mentions_légales.pdf" download="Mentions_légales.pdf">Mentions Légales</a></li>
            <li><a href="../Projet_pour_Guillaume.rar" download="../Projet_pour_Guillaume.rar">Aide</a></li>
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

<!-- Google Map -->
<script src="plugins/google-map/map.js" defer></script>

<script src="js/script.js"></script>
<script src="js/global.js"></script>

</body>

</html>