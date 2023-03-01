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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  
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
                
             
                <?php if (isset($_SESSION['FirstName']) && isset($_SESSION['LastName'])) {
                    echo '                        
                    <div class="dropdown">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Panneau de configuration</a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="#" class="ti-user dropdown-item">  Page admin</a>
                      <a class="ti-write dropdown-item" href="#">  Zone entraîneur</a>
                      <a class="ti-calendar dropdown-item" href="./affiche_match.php">  Planning</a>
                    </div>
                  </div>';
                  } ?>
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






<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="event-schedule-area-two bg-color pad100">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title text-center">
<div class="title-text">
<h2>Liste des matchs</h2>
</div>
<p>
Voici la liste des matchs passés ainsi que nos prochains matchs, veuillez indiquer avec V si vous êtes présent ou bien avec X si vous ne pouvez pas venir.
</p>
</div>
</div>

</div>

<div class="row">
<div class="col-lg-12">
<ul class="nav custom-tab" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active show" id="home-taThursday" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Equipe D2 </a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Equipe D3</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade active show" id="home" role="tabpanel">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th class="text-center" scope="col">Date</th>
<th scope="col">Division</th>
<th scope="col">Rencontre</th>
<th scope="col">Lieu</th>
<th class="text-center" scope="col">Venue</th>
</tr>
</thead>
<tbody>

<?php

$var = new API_FFTT;
$var->initialisationAPI();
$club = $var->getClub('07620037');
$Synave = $var->getJoueursByName('Synave','Remi');
$Partie_Synave = $var->getJoueurParties('6232386');
$EquipeA = $var->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => '107513', 'cx_poule' => 'P6' , 'action' => ''));
$EquipeB = $var->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => '107514', 'cx_poule' => 'P6' , 'action' => ''));
$club_62 = $var->connexionAPI('xml_club_b', array('dep' => '62'));
$GLOBALS['equipe_62'] = $club_62;


/*function getNumClub($appellation){

$equipe_62 = $GLOBALS['club_62'];

    /*$appellation_cut_glob = explode(' ', $appellation);
    $appellation_cut_prec = explode('-', $appellation_cut_glob[1]);
    $appellation_cut_cut = str_split($appellation_cut_prec[0]);
    if ($appellation_cut_cut[strlen($appellation_cut_prec[1])-1] == '-'){
        $appellation_cut[1] = substr($appellation_cut[1], strlen($appellation_cut[1]));
    }

    if(strpos($appellation, '-') !== false){

        $appellation_cut_glob = explode(' ', $appellation);
        $appellation_cut_prec = explode('-', $appellation_cut_glob[1]);
        $appellation = $appellation_cut_prec[0];


    }



foreach ($equipe_62 as $val){

    foreach($val as $libelle){

         if (strpos($libelle['nom'], str_replace(' ', '', $appellation))  !== false ){

            return $libelle['numero'];
        }

    }



}

}*/


foreach($EquipeA as $name => $val){
    foreach($val as $chiffre => $libelle){

        if ($libelle['equa'] == 'ENT EPERLECQUES-STE MARIE KERQUES' || $libelle['equb'] == 'ENT EPERLECQUES-STE MARIE KERQUES') {

            
            

             $date  = explode("/", $libelle['datereelle']);
             

             if($libelle['equa'] == 'ENT EPERLECQUES-STE MARIE KERQUES'){

                $lieu = "DOMICILE";
             }else{
                $lieu = "EXTERIEUR";
             }

            //$dec_equa = explode("", $libelle['equa']);
            //var_dump($info_equb1, $libelle['equa']);
            

            echo "

                <tr class='inner-box'>
                <th scope='row'>
                <div class='event-date'>
                <span>".$date[0]."</span>
                <p>".$date[1]. "    ".$date[2]."</p>
                </div>
                </th>
                <td>
                <div class='event-img'>
                <img src='./images/D2.png' alt='' />
                </div>
                </td>
                <td>
                <div class='event-wrap'>
                    <h3><a href='#'>".$libelle['equa']."    VS    ".$libelle['equb']."</a></h3>
                </div>
                </td>
                <td>
                    <div class='r-no'>
                        <span>$lieu</span>
                    </div>
                </td>
                <td>
                    <div class='primary-btn'>
                    <a class='btn btn-primary' href='#'><i class='ti-check color-green text-md'></i></a>
                    <a class='btn btn-primary' href='#'><i class='ti-close color-red text-md'></i></a>
                    </div>
                </td>
                </tr> ";
        }
    }
}

?>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Division</th>
<th scope="col">Rencontre</th>
<th scope="col">Lieu</th>
<th scope="col">Venue</th>
</tr>
</thead>
<tbody>

<?php

$var = new API_FFTT;
$var->initialisationAPI();
$club = $var->getClub('07620037');
$Synave = $var->getJoueursByName('Synave','Remi');
$Partie_Synave = $var->getJoueurParties('6232386');
$EquipeB = $var->connexionAPI('xml_result_equ', array ('auto' => '1', 'D1' => '107514', 'cx_poule' => 'P6' , 'action' => ''));


foreach ($EquipeB as $name => $val) {
    foreach ($val as $chiffre => $libelle) {

        if ($libelle['equa'] == 'EPERLECQUES TLT 2' || $libelle['equb'] == 'EPERLECQUES TLT 2') {


            $date = explode("/", $libelle['datereelle']);


            if ($libelle['equa'] == 'EPERLECQUES TLT 2') {

                $lieu = "DOMICILE";
            } else {
                $lieu = "EXTERIEUR";
            }


            $equa = $libelle['equa'];
            $equb = $libelle['equb'];

            if(empty($equa)){
                $equa = "exempt";
            }else if(empty($equb)){
                $equb = "exempt";
            }
            echo "


<tr class='inner-box'>
<th scope='row'>
<div class='event-date'>
<span>".$date[0]."</span>
<p>".$date[1]. "    ".$date[2]."</p>
</div>
</th>
<td>
<div class='event-img'>
<img src='./images/D3.png' alt='' />
</div>
</td>
<td>
<div class='event-wrap'>
<h3><a href='#'>".$equa."    VS    ".$equb."</a></h3>
<div class='meta'>
</div>
</div>
</td>
<td>
<div class='r-no'>
<span>$lieu</span>
</div>
</td>
<td>
<div class='primary-btn'>
<a class='btn btn-primary' href='#'><i class='ti-check color-green text-md'></i></a>
<a class='btn btn-primary' href='#'><i class='ti-close color-red text-md'></i></a>
</div>
</td>
</tr>";
        }
    }
}
?>
</tbody>
</table>
</div>
</div>
</tbody>
</table>
</div>
</div>
</div>
<div class="primary-btn text-center">
 </div>
</div>

</div>

</div>
</div>
<style type="text/css">
body{margin-top:20px;}
.event-schedule-area .section-title .title-text {
    margin-bottom: 50px;
}

.event-schedule-area .tab-area .nav-tabs {
    border-bottom: inherit;
}

.event-schedule-area .tab-area .nav {
    border-bottom: inherit;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: 80px;
}

.event-schedule-area .tab-area .nav-item {
    margin-bottom: 75px;
}
.event-schedule-area .tab-area .nav-item .nav-link {
    text-align: center;
    font-size: 22px;
    color: #333;
    font-weight: 600;
    border-radius: inherit;
    border: inherit;
    padding: 0px;
    text-transform: capitalize !important;
}
.event-schedule-area .tab-area .nav-item .nav-link.active {
    color: #4125dd;
    background-color: transparent;
}

.event-schedule-area .tab-area .tab-content .table {
    margin-bottom: 0;
    width: 80%;
}
.event-schedule-area .tab-area .tab-content .table thead td,
.event-schedule-area .tab-area .tab-content .table thead th {
    border-bottom-width: 1px;
    font-size: 20px;
    font-weight: 600;
    color: #252525;
}
.event-schedule-area .tab-area .tab-content .table td,
.event-schedule-area .tab-area .tab-content .table th {
    border: 1px solid #b7b7b7;
    padding-left: 30px;
}
.event-schedule-area .tab-area .tab-content .table tbody th .heading,
.event-schedule-area .tab-area .tab-content .table tbody td .heading {
    font-size: 16px;
    text-transform: capitalize;
    margin-bottom: 16px;
    font-weight: 500;
    color: #252525;
    margin-bottom: 6px;
}
.event-schedule-area .tab-area .tab-content .table tbody th span,
.event-schedule-area .tab-area .tab-content .table tbody td span {
    color: #4125dd;
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}
.event-schedule-area .tab-area .tab-content .table tbody th span.date,
.event-schedule-area .tab-area .tab-content .table tbody td span.date {
    color: #656565;
    font-size: 14px;
    font-weight: 500;
    margin-top: 15px;
}
.event-schedule-area .tab-area .tab-content .table tbody th p {
    font-size: 14px;
    margin: 0;
    font-weight: normal;
}

.event-schedule-area-two .section-title .title-text h2 {
    margin: 0px 0 15px;
}

.event-schedule-area-two ul.custom-tab {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 30px;
}
.event-schedule-area-two ul.custom-tab li {
    margin-right: 70px;
    position: relative;
}
.event-schedule-area-two ul.custom-tab li a {
    color: #252525;
    font-size: 25px;
    line-height: 25px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 35px 0;
    position: relative;
}
.event-schedule-area-two ul.custom-tab li a:hover:before {
    width: 100%;
}
.event-schedule-area-two ul.custom-tab li a:before {
    position: absolute;
    left: 0;
    bottom: 0;
    content: "";
    background: #4125dd;
    width: 0;
    height: 2px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.event-schedule-area-two ul.custom-tab li a.active {
    color: #4125dd;
}

.event-schedule-area-two .primary-btn {
    margin-top: 40px;
}

.event-schedule-area-two .tab-content .table {
    -webkit-box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 0;
}
.event-schedule-area-two .tab-content .table thead {
    background-color: #007bff;
    color: #fff;
    font-size: 20px;
}
.event-schedule-area-two .tab-content .table thead tr th {
    padding: 20px;
    border: 0;
}
.event-schedule-area-two .tab-content .table tbody {
    background: #fff;
}
.event-schedule-area-two .tab-content .table tbody tr.inner-box {
    border-bottom: 1px solid #dee2e6;
}
.event-schedule-area-two .tab-content .table tbody tr th {
    border: 0;
    padding: 30px 20px;
    vertical-align: middle;
}
.event-schedule-area-two .tab-content .table tbody tr th .event-date {
    color: #252525;
    text-align: center;
}
.event-schedule-area-two .tab-content .table tbody tr th .event-date span {
    font-size: 50px;
    line-height: 50px;
    font-weight: normal;
}
.event-schedule-area-two .tab-content .table tbody tr td {
    padding: 30px 20px;
    vertical-align: middle;
}
.event-schedule-area-two .tab-content .table tbody tr td .r-no span {
    color: #156893;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a {
    font-size: 20px;
    line-height: 20px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a:hover {
    color: #4125dd;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a {
    color: #252525;
    font-size: 16px;
    margin-left: 10px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a:before {
    content: "\f07b";
    font-family: fontawesome;
    padding-right: 5px;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .time span {
    color: #252525;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin: 10px 0;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a {
    color: #4125dd;
    font-size: 16px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:hover {
    color: #4125dd;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:before {
    content: "\f007";
    font-family: fontawesome;
    padding-right: 5px;
}
.event-schedule-area-two .tab-content .table tbody tr td .primary-btn {
    margin-top: 0;
    text-align: center;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-img img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}

</style>
<script type="text/javascript">

</script>

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