<?php

class UserTeamTask implements intUserTeamTask{


    public function set__(){


    }

    public function get__(){

        
    }

    public function destruct__(){


    }

    public function getInfosFromTask($IdTask){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from usersteamstasks as utt inner join tasks as t on utt.IdTask = t.Id where t.Id = ?;", [$IdTask]);
        //Log::directlyWriteLog("./logs/LogResultatsRequetes.txt", $res[0], "Résulatat de la requête ", "haha");
        return $res;

    }

    public function getLastIdFromTask(){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("SHOW TABLE STATUS FROM mytodolist LIKE 'tasks' ;", null);
        //Log::directlyWriteLog("./logs/LogResultatsRequetes.txt", $res[0], "Résulatat de la requête ", "haha");
        return $res;



    }

    public function createLink($IdUser, $IdTeam){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        //$lastId = $bdd->selectQuery()
        $autoIncr = $this->getLastIdFromTask();
        $res = $bdd->nonSelectQuery("Insert into usersteamstasks (`IdUser`, `IdTeam`, `IdTask`) values (?,?,?);",[$IdUser, $IdTeam, intval($autoIncr[0]['Auto_increment'])-1]);

        return $res;

    }
    

    




}





?>