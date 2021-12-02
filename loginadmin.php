<?php
  session_start();

  require 'database.php';

  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, nombre, apellido, password FROM users WHERE email=:email');
    $records->bindParam(':email',$_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('Location: /dashadmin/indexdash.php'); 
    } else {
      $message = '<div class="alert alert-danger" role="alert">
                    LOS DATOS NO COINCIDEN!
                  </div>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future reality</title>
    <meta name="viewport" content="width=device-width, initial-scale=no">
    <link rel="stylesheet" href="styleslogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid navbar navbar-light" style="background-color: #0a1a2a;">
      <nav class="navbar navbar-expand-lg container">
        <div class="container-fluid">
          <a class="navbar-brand" href="/index.php">
            <img src="/img/logobc.png" alt="Future Reality" width="150">
          </a>
            <h2 style="color: white">VENTANA ADMINISTRADOR</h2>
            <form class="d-flex" action=""> 
                <a class="nav-link" href="index.php" style="color: white;">Regresar al Inicio <i class="fas fa-undo-alt"></i></a>
            </form>
          </div>
        </div>
      </nav>
  </div>

    <div class="container-login">
        <h1>Login</h1>

        <?php if(!empty($message)): ?>
          <p><?= $message ?></p>
        <?php endif; ?>

        <form id="inicio" action="../dashadmin/indexdash.php" method="post">
            <input type="text" name="email" placeholder="Ingresa tu Email">
            <input type="password" name="password" placeholder="Ingresa tu contraseña">
            <input type="submit" value="INGRESAR">
        </form>
    </div>

    <script src="https://kit.fontawesome.com/8d06b4574a.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>