<?php


class Task implements intTask{


    public function set__(){


    }

    public function get__(){

        
    }

    public function destruct__(){


    }

    public function createTask($name, $detail, $state){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("Insert into tasks (Name, Detail, State) values (?, ?, ?);",[$name, $detail, $state]);

        return $res;
    }

    public function viewTaskFromState($State){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from tasks where state like ?;",[$State]);

        return $res;
    }

    public function viewTaskFrom($State){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from tasks where state like ?;",[$State]);

        return $res;
    }

    public function modTask($State, $idTask){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("UPDATE `tasks` SET `State`= ? WHERE Id = ?;",[$State, $idTask]);

        return $res;


    }

    public function delTask($idTask){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("DELETE from tasks WHERE Id = ?;",[$idTask]);

        return $res;


    }
}