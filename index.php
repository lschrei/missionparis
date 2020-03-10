<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$address = 'http://localhost:8888/site/'; //pour les liens qui menent à une autre page
$homeDirectory = 'http://localhost:8888/site/'; //pour les fichiers qu'on chargent depuis cette page
$params = (isset($_GET['location'])) ? explode('/', $_GET["location"]) : array(); //découpe en array l'url pour le slug

require_once 'application/bdd-connection.php';

if (!isset($params[0]) || !$params[0]) {
    $params[0] = "index";
}                  //si le premier paramètre de mon array est nul, il est remplacé par index

require_once("./controllers/" . $params[0] . ".php");   // MVC : récupére le .php dans controllers

require_once 'header.php';

require_once("./views/" . $view . ".phtml");  // MVC : récupére le .phtml dans dossier views

require_once 'footer.php';
