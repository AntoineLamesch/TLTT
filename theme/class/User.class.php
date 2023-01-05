<?php

class User implements intUser{


    public function set__(){


    }

    public function get__(){

        
    }

    public function destruct__(){


    }

    public function connectUser($email, $password){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
    $res = $bdd->selectQuery("Select count(*) as nb from users where email like ? and mdp like ?;", [$email, /*hash("gost", */ $password/*)*/]);

        return $res;
    }

    public function createUser($userName, $userLastName, $userMail, $userPass ,$userType){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("Insert into users (FirstName, LastName, Email, Password, Type) values (?, ?, ?, ?, ?);",[$userName, $userLastName, $userMail, $userPass, $userType]);

        return $res;

    }

    public function deleteUser($userId){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("Delete from users where Id = ?", [$userId]);

        return $res;


    }

    public function setUserInfos($userId, $title, $content){


        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("UPDATE `users` set `?`= `?` where Id = ? ", [$title, $content, $userId]);

        return $res;


    }


    public function getUserInfos($InfoVoulue = null , $userMail){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from users where Email like ?;", [$userMail]);
        //Log::directlyWriteLog("./logs/LogResultatsRequetes.txt", $res[0], "Résulatat de la requête ", "haha");
        return $res;
    }
    

    public function disconnectUser($userId){

        unset($_SESSION['mail']);
    }




}





?>