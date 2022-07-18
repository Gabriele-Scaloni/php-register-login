<?php
session_start();
include 'config.php';

$nome = $_POST['nome'];
$indirizzo = $_POST['indirizzo'];
$ragionesociale = $_POST['ragionesociale'];
$pec = $_POST['pec'];
$password = $_POST['password'];
$partitaiva = $_POST['partitaiva'];

$sql = "INSERT INTO azienda (`nome`, `indirizzo`, `ragionesociale`, `pec`, `password`, `partitaiva`) VALUES (:nome, :indirizzo, :ragionesociale, :pec, :password, :partitaiva)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
$stmt->bindParam(':ragionesociale', $ragionesociale, PDO::PARAM_STR);
$stmt->bindParam(':pec', $pec, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':partitaiva', $partitaiva, PDO::PARAM_STR);

try  {
    $stmt->execute();
    header("Location: http://localhost/php-esercizio-login-register/loginview.php?registration=true");
    exit();
} catch (Exception $e) {
    header("Location: http://localhost/php-esercizio-login-register/errorpage.php");
    exit();}
?> 