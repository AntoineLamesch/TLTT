<?php

interface intUser{ 

    public function createUser($userName, $userLastName, $userMail, $userPass, $userType); //Crée un User avec les informations nécessaire à la création de celui-ci
    public function deleteUser($userId);//Supprime un utilisateur de la base de donnée grace à son id 
    public function setUserInfos($userId, $title, $content);//Permet de modifier les infos de l'utilisateur, parametre : $userId  = 'id de l'user dans la base', $title = 'la valeur à changer ex: le nom', $content = 'valeur qu'on veut mettre à la place de l'autre ex : remplacer Toto par Tata'
    public function getUserInfos($InfoVoule = null , $userMail);//Permet de récuper une ou des infos d'un utilisateur, $userId = 'id de l'user dans la bdd', $tabInfoVoulue = 'un tableau contenant les valuers que l'on souhaite récupérer';
    public function connectUser($email, $password); //Fonction qui verifie que l'utilisateur à rentrer le bon couple mail et mdp pour se connecter, retourne True si c'est bon et False le cas échéant
    public function disconnectUser($userId);//Fonction qui déconnecte un Utilisateur en remetant à 0 la variable de session : '$_SESSION['mail']
}

?>