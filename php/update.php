<?php
include 'config.php';

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['azienda_id'])) {
    $query = $db->prepare("SELECT * FROM azienda WHERE partitaiva=:partitaiva");
    $query->bindParam("partitaiva", $_SESSION['azienda_id'], PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: http://localhost/php-esercizio-citynet/loginview.php');
}

$nome = $_POST['nome'];
$indirizzo = $_POST['indirizzo'];
$ragionesociale = $_POST['ragionesociale'];
$pec = $_POST['pec'];
$password = $_POST['password'];
$partitaiva = $_POST['partitaiva'];

$update= " UPDATE azienda SET
`nome`= :nome,
`indirizzo`= :indirizzo,
`ragionesociale`= :ragionesociale,
`pec`= :pec,
`password`= :password
WHERE partitaiva = :partitaiva";

$stmt = $db->prepare($update);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
$stmt->bindParam(':ragionesociale', $ragionesociale, PDO::PARAM_STR);
$stmt->bindParam(':pec', $pec, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':partitaiva', $partitaiva, PDO::PARAM_STR);

try  {
    $stmt->execute();
    header("Location: http://localhost/php-esercizio-citynet/welcome.php?updated=true");
    exit(); 
} catch (Exception $e) {
    header("Location: http://localhost/php-esercizio-citynet/errorpage.php");
    exit();
}