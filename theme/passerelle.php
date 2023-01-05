<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

unset($_SESSION['FirstName']);
unset($_SESSION['LastName']);//Met toutes les variables de session à null et donc oblige une reconnexion 
header('Location:./index.php');

?>