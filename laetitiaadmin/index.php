<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$address = './laetitiaadmin/?location=';
require_once 'connexion.php';

if (!isset($_GET["location"]) || !$_GET["location"])
    $_GET["location"] = "connexion";
?>