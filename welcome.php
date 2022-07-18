<?php
include('php/config.php');

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Welcome</title>
</head>
<body>
    <section class="text-bg-light p-3 bg-grey">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Modifica effettuata con successo</h4>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="my-4">Benvenuto <?php echo $result['nome']; ?>, ecco il riepilogo dei dati della tua azienda:</h2>

        <form action="php/update.php" id="myForm" method="POST">

            <div class="my-3 mx-2">
                <label for="partitaiva">* Partita IVA: </label>
                <input type="text" id="partitaiva" name="partitaiva" value="<?php echo $result['partitaiva']; ?>" readonly>
            </div>

            <div class="my-3 mx-2">
                <label for="nome">Nome attività: </label>
                <input type="text" id="nome" name="nome" value="<?php echo $result['nome']; ?>" required>
            </div>

            <div class="my-3 mx-2">
                <label for="indirizzo">Indirizzo: </label>
                <input type="text" id="indirizzo" name="indirizzo" value="<?php echo $result['indirizzo']; ?>" required>
            </div>
            
            <div class="my-3 mx-2">
                <label for="ragionesociale">Ragione sociale: </label>
                <input type="text" id="ragionesociale" name="ragionesociale" value="<?php echo $result['ragionesociale']; ?>" required>
            </div>
            
            <div class="my-3 mx-2">
                <label for="pec">Pec: </label>
                <input type="email" id="pec" name="pec" value="<?php echo $result['pec']; ?>" required>
            </div>

            <div class="my-3 mx-2">
                <label for="password">Password: </label>
                <input type="text" id="password" name="password" value="<?php echo $result['password']; ?>" required> 
            </div>

            <div class="my-3 mx-2">
                <p class="text-sm-start" >* Questo campo non può essere modificato</p>
            </div>

            <input class="btn btn-success my-2 mx-2" type="submit" value="Salva" name="Salva">
            <a href="views/index.php" class="btn btn-secondary my-2 mx-2">Torna alla registrazione</a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="js/welcome_script.js"></script>
</body>

</html>