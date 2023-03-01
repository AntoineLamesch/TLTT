<?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }

spl_autoload_register(function ($class_name) {
    include_once ('class/' . $class_name . '.class.php');
});


/*if(isset($_SESSION['mail'])){
    header('Location: ./acceuil.php');
}else{*/



if(isset($_POST['email']) && isset($_POST['pass'])){ //On vérifie si l'utilisateur à bien fourni un mail et un mot de passe pour se connecter

    

    //$GLOBALS['tableau_ini']= parse_ini_file('./ini/info.ini');
    //$GLOBALS['bdd'] =new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
    //$res = $GLOBALS['bdd']->selectQuery("Select count(*) as nb from users where Email like ? and Password like ?;", [$_POST['mail'], hash("gost", $_POST['password'])]);
    //var_dump($res);
    
    $usr = new User();
    $res = $usr->connectUser($_POST['email'], $_POST['pass']);
    var_dump($res);
    $usr->destruct__();

    
    

    if(intval($res[0]['nb']) ===  1){ // Si le résultat de la requête est bien 1, donc si il y a bien un et un seul  utilisateur à qui appartient ce mot de passe

        var_dump($_POST['email']);
        
        $usr2 = new User();
        $info = ($usr2->getUserInfos(null ,$_POST['email']));
        var_dump($info);
        $usr2->destruct__();
        



        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['FirstName'] = $info[0]['nom_u'];
        $_SESSION['LastName'] = $info[0]['prenom_u'];
        $_SESSION['Id'] = $info[0]['id'];

        
        
        header('Location: ./index.php');


    }
    else{
    

        Log::directlyWriteLog("./logs/LogConnexion.txt", $_POST['mail'],"Mot de passe éroné pour ",$_POST['password']);//Sinon met un log pour voir si quelqu'un s'est trompé/ à essayé de brutforcer la connexion
        header('Location: ./index.php');


    


    }


}else{

    var_dump($_POST);
}









?>