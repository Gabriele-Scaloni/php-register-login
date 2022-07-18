<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = 'root';
$password = 'root';
$db = 'es-citynet';
$host = 'localhost';
$port = 3306;
password_hash($password, PASSWORD_BCRYPT);

$db = new PDO ("mysql:host=$host;dbname=$db", $user, $password);

if (!$db) {
   echo 'errore'; die;
}
?>