<?php

interface intUserTeamTask{ 

    public function getInfosFromTask($IdTask); //Fonction qui verifie que l'utilisateur à rentrer le bon couple mail et mdp pour se connecter, retourne True si c'est bon et False le cas échéant
    public function getLastIdFromTask(); //fonction qui retourne le dernier ID attribué à une tâche en regardant la derniere auto-incrementation fournie
    public function createLink($IdUser, $IdTeam); //fonction qui crée le lien entre une tâche, son equipe, et son créateur
   
}

?>