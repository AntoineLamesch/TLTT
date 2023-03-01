<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }

spl_autoload_register(function ($class_name) {
    include_once ('class/' . $class_name . '.class.php');
});


/*if(isset($_SESSION['mail'])){
    header('Location: ./acceuil.php');
}else{*/



if(isset($_POST['Nom']) && isset($_POST['Prenom']) ){ //On vérifie si l'utilisateur à bien fourni le jour l'heure et le type

    

    //$GLOBALS['tableau_ini']= parse_ini_file('./ini/info.ini');
    //$GLOBALS['bdd'] =new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
    //$res = $GLOBALS['bdd']->selectQuery("Select count(*) as nb from users where Email like ? and Password like ?;", [$_POST['mail'], hash("gost", $_POST['password'])]);
    //var_dump($res);
    

    if($_POST['Type'] == 'Photos'){

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    move_uploaded_file($tmpName, './images/joueur'.$_POST['Name'].'_'.$_POST['Prenom'].'.jpg');
    $joueur = new Joueur();




        $res = $joueur->createJoueur($_POST['Nom'], $_POST['Prenom'], '21', $_POST['Name'] . '_' . $_POST['Prenom'] . '.jpg', 1, 1);
    

    if($res = $joueur->createJoueur($_POST['Nom'], $_POST['Prenom'], '21', $_POST['Name'].'_'.$_POST['Prenom'].'.jpg', 1, 1)){ // Si le résultat de la requête est bien 1, donc si il y a bien un et un seul  utilisateur à qui appartient ce mot de passe

        var_dump($res);
        $usr->destruct__();

        
        
        header('Location: ./membres_club.php');


    }
    else{
    

        Log::directlyWriteLog("./logs/changementsHoraires.txt", $_POST['jour'],"Erreur lors de l'insertion de la date ",$_POST['heure']);//Sinon met un log pour voir si quelqu'un s'est trompé/ à essayé de brutforcer la connexion
        header('Location: ./index.php');


    


    }
    }

}else{

    var_dump($_POST);
}











?>