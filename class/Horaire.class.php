<?php


class Horaire{



    public function updateHoraire($jour, $heure, $type){

        $idTask = 1;
        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->nonSelectQuery("UPDATE `horaires` SET `jour`= ? , `heure` = ? , `type` = ? WHERE type = ?;",[$jour, $heure, $type,  $type]);

        return $res;


    }

    public function viewHoraire($type){

        $tableau_ini= parse_ini_file('./ini/info.ini');
        $bdd=new BDD($tableau_ini['Server'],$tableau_ini['DBName'],$tableau_ini['User'],$tableau_ini['Mdp']);
        $res = $bdd->selectQuery("Select * from horaires where type like ?;",[$type]);

        return $res;
    }
}


?>