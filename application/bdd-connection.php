<?php
include 'application/bdd-login.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
$pdo = new PDO(
	'mysql:host = ' . $host . ';port = ' . $port . ';dbname = ' . $dbname . ';charset = utf8',
	$user, //identifiant
	$pass //mot de passe
);

$pdo->query('SET NAMES \'utf8mb4\'');
$pdo->query('SET CHARACTER SET utf8mb4');
$pdo->query('SET COLLATION_CONNECTION = \'utf8mb4_general_ci\'');
