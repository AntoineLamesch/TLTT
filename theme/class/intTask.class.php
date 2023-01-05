<?php


interface intTask{

           public function createTask($name, $detail, $state);//Pour crééer la tâche
           public function viewTaskFromState($State);//Voir toutes les tâches possédant l'état fournit en paramètre
           public function viewTaskFrom($State);//Voir toutes les tâches possédant l'état fournit en paramètre
           public function modTask($State, $idTask);//Modifier l'etat d'une tâche selon son Id
           public function delTask($idTask);//Supprimer une tâche selon son Id(Ne pas oublier d'activer le delete on cascade sur php my admin)
            



}