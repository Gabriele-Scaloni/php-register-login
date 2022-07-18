<?php
if (!isset($_SESSION)) { session_start(); }
include('php/config.php');

if (isset($_POST['Accedi'])) {
  $partitaiva = $_POST['partitaiva'];
  $password = $_POST['password'];
  $query = $db->prepare("SELECT * FROM azienda WHERE partitaiva=:partitaiva");
  $query->bindParam("partitaiva", $partitaiva, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if ($result == null) {
    header('Location: http://localhost/php-esercizio-login-register/errorpage.php');
  } else {
    if ($password == $result['password']) {
      $_SESSION['session_id'] = session_id();
      $_SESSION['azienda_id'] = $result['partitaiva'];
      var_dump($result['partitaiva']);
      header('Location: http://localhost/php-esercizio-login-register/welcome.php');
      exit;
    } else {
      header('Location: http://localhost/php-esercizio-login-register/errorpage.php');
    }
  }
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
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>

<body>
  <h2 class="my-3 text-center">Accedi</h2>

  <form class="d-flex flex-column text-center mx-auto" action="" method="POST">

    <label for="partitaiva">Partita IVA</label>
    <input type="text" name="partitaiva" placeholder="Inserisci la tua Partita IVA" required>

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Inserisci la tua password" required>

    <input class="btn btn-success my-2" type="submit" value="Accedi" name="Accedi">
    <p>Non hai un account? <a href="index.php">Registrati</a></p>
  </form>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h4>Registrazione effettuata con successo</h4>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="js/loginview_script.js"></script>
</body>
</html>