<?php

include 'php/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Registrazione</title>
</head>

<body>
    <h2 class="my-3 text-center">Registrata la tua azienda</h2>

    <form class="d-flex flex-column text-center mx-auto" action="php/register.php" method="POST">

        <label for="partitaiva">Partita IVA</label>
        <input class="form-control form-text" type="text" name="partitaiva" id="partitaiva" placeholder="Inserisci la tua Partita IVA" required>

        <label for="nome">Nome attività</label>
        <input class="form-control form-text" type="text" name="nome" id="nome" placeholder="Inserisci il nome dell'attività" required>

        <label for="indirizzo">Indirizzo</label>
        <input class="form-control form-text" type="text" name="indirizzo" id="indirizzo" placeholder="Inserisci l'indirizzo" required>

        <label for="ragionesociale">Ragione sociale</label>
        <input class="form-control form-text" type="text" name="ragionesociale" id="ragionesociale" placeholder="Inserisci la tua ragione sociale" required>

        <label for="pec">Pec</label>
        <input class="form-control form-text" type="email" name="pec" id="pec" placeholder="Inserisci la tua Pec" required>

        <label for="password">Crea password</label>
        <input class="form-control form-text" type="password" name="password" id="password" placeholder="Crea la tua password" required minlength="8">

        <input class="btn btn-success my-2" type="submit" value="Registrati">

        <p>Sei già registrato? <a href="loginview.php">Accedi</a></p>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>