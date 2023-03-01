<?php


if (session_status() == PHP_SESSION_NONE) { session_start(); }

spl_autoload_register(function ($class_name) {
    include_once ('class/' . $class_name . '.class.php');
});

$h = new Horaire();
$res = $h->viewHoraire('Entraînements');
var_dump($res[0]['jour']);





?>

