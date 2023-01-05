<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }

spl_autoload_register(function ($class_name) {
    include_once ('class/' . $class_name . '.class.php');
});


/*if(isset($_SESSION['mail'])){
    header('Location: ./acceuil.php');
}else{*/



if(isset($_POST['jour']) && isset($_POST['heure']) && isset(($_POST['type']))){ //On vérifie si l'utilisateur à bien fourni le jour l'heure et le type

    

    //$GLOBALS['tableau_ini']= parse_ini_file('./ini/info.ini');
    //$GLOBALS['bdd'] =new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
    //$res = $GLOBALS['bdd']->selectQuery("Select count(*) as nb from users where Email like ? and Password like ?;", [$_POST['mail'], hash("gost", $_POST['password'])]);
    //var_dump($res);
    
    $hor = new Horaire();
    
    
    

    
    

    if($res = $hor->updateHoraire($_POST['jour'], $_POST['heure'], $_POST['type'])){ // Si le résultat de la requête est bien 1, donc si il y a bien un et un seul  utilisateur à qui appartient ce mot de passe

        var_dump($res);
        $usr->destruct__();

        
        
        header('Location: ./index.php');


    }
    else{
    

        Log::directlyWriteLog("./logs/changementsHoraires.txt", $_POST['jour'],"Erreur lors de l'insertion de la date ",$_POST['heure']);//Sinon met un log pour voir si quelqu'un s'est trompé/ à essayé de brutforcer la connexion
        header('Location: ./index.php');


    


    }


}else{

    var_dump($_POST);
}









?>