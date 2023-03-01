<?php

class Joueur /*implements intJoueur*/{


    public function set__(){


    }

    public function get__(){

        
    }

    public function destruct__(){


    }


    public function createJoueur($nomJoueur, $prenomJoueur, $ageJoueur, $photoJoueur ,$rangHierarchie, $checkPhoto){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("Insert into Joueur (nom_joueur, prenom_joueur, age_joueur, photo_joueur, rang_hierarchie, check_photo) values (?, ?, ?, ?, ?, ?);",[$nomJoueur, $prenomJoueur, $ageJoueur, $photoJoueur, $rangHierarchie, $checkPhoto]);

        return $res;

    }

    public function deleteJoueur($JoueurId){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("Delete from Joueur where Id = ?", [$JoueurId]);

        return $res;


    }

    public function setJoueurInfos($userId, $title, $content){


        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("UPDATE `Joueur` set `?`= `?` where Id = ? ", [$title, $content, $userId]);

        return $res;


    }

    public function getJoueurInfos(){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from Joueur", [null]);
        //Log::directlyWriteLog("./logs/LogResultatsRequetes.txt", $res[0], "Résulatat de la requête ", "haha");
        return $res;
    }


    public function getUserJoueurPrec($InfoVoulue = null , $idJoueur){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from Joueur where id_joueur = ?;", [$idJoueur]);
        //Log::directlyWriteLog("./logs/LogResultatsRequetes.txt", $res[0], "Résulatat de la requête ", "haha");
        return $res;
    }
    

    public function disconnectUser($userId){

        unset($_SESSION['mail']);
    }




}





?>