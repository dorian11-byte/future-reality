<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['numero'])) {
        $sql = "INSERT INTO users (email, nombre, apellido, password, numero) VALUES (:email, :nombre, :apellido, :password, :numero)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apellido',$_POST['apellido']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':numero',$_POST['numero']);

        if($stmt->execute()) {
          $message = '<div class="alert alert-success" role="alert">
                        registrado correctamente! <a href="login.php"> Ir a iniciar sesion </a>
                      </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
                          ha ocurrido un error en su regsitro.
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
            <h2 style="color: white">Registro</h2>
            <form class="d-flex" action=""> 
                <a class="nav-link" href="login.php" style="color: white;">Iniciar sesion  <i class=" fas fa-undo-alt"></i></a>
                <a class="nav-link" href="index.php" style="color: white;">Regresar al Inicio  <i class=" fas fa-home"></i></a>
            </form>
          </div>
        </div>
      </nav>
    </div>

    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <div class="container-login">
        <h1>SignUp</h1>
    
        <form id="registro" action="signup.php" method="POST">
            
            <input name="email" type="text" placeholder="Ingresa tu email">
            <input name="nombre" type="text" placeholder="Ingresa tu nombre">
            <input name="apellido" type="text" placeholder="Ingresa tu apellido">
            <input name="password" type="password" placeholder="Ingresa una Contraseña">
            <input name="confirm_password" type="password" placeholder="Confirma tu Contraseña">
            <input name="numero" type="text" placeholder="Ingresa tu numero de telefono">
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="https://kit.fontawesome.com/8d06b4574a.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>