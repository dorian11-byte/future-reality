<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['nombre'] && !empty($_POST['telefono']))) {
        $sql = "INSERT INTO contacto (nombre, email, telefono, mensaje, opcasa, precio, maneracontacto, fecha, hora) VALUES (:nombre, :email, :telefono, :mensaje, :opcasa, :precio, :maneracontacto, :fecha, :hora)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->bindParam(':telefono',$_POST['telefono']);
        $stmt->bindParam(':mensaje',$_POST['mensaje']);
        $stmt->bindParam(':opcasa',$_POST['opcasa']);
        $stmt->bindParam(':precio',$_POST['precio']);
        $stmt->bindParam(':maneracontacto',$_POST['maneracontacto']);
        $stmt->bindParam(':fecha',$_POST['fecha']);
        $stmt->bindParam(':hora',$_POST['hora']);
        

        if($stmt->execute()) {
          $message = '<div class="alert alert-success" role="alert">
                        Enviado correctamente! <a href="index.php"> Ir al inicio </a>
                      </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
                          ha ocurrido un error en el envio :(
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
    <title>Nosotros</title>
    <meta name="viewport" content="width=device-width, initial-scale=no">
    <link rel="stylesheet" href="styles.css">
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="propiedades.php" style="color: white;">
                      Comprar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="propiedades_r.php" style="color: white;">
                      Rentar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contacto.php" style="color: white;">
                      Contacto
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="nosotros.html" style="color: white;">Acerca de Nosotros</a>
                  </li>
              </div>
              <h2 style="color: white"> Contacto </h2>
              <form class="d-flex" action=""> 
                  <a class="nav-link" href="index.php" style="color: white;">Regresar al Inicio <i class="fas fa-undo-alt"></i></a>
              </form>
            </div>
          </div>
        </nav>
    </div>

    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <div class="container-seccion">
        <img class="img-princ" src="/img/contacto.jpg" alt="Imagen Contacto">

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" method="POST" action="contacto.php">
            <fieldset>

              <legend>Informacion Personal</legend>
              
              <label for="nombre">Nombre</label>
              <input type="text" placeholder="Tu nombre" id="nombre" name="nombre">

              <label for="email">E-mail</label>
              <input type="email" placeholder="Tu e-mail" id="email" name="email">
              
              <label for="telefono">Telefono</label>
              <input type="tel" placeholder="Tu telefono" id="telefono" name="telefono">

              <label for="mensaje">Mensaje:</label>
              <textarea name="mensaje" id="mensaje"></textarea>
            
            </fieldset>

            <fieldset>

              <legend>Informacion del Propietario</legend>

              <label for="opciones">Vende, Compra o Renta:</label>
              <select id="opciones" name="opcasa">
                <option value="" disable selected>--Seleccione una opcion--</option>
                <option value="Vende">Vende</option>
                <option value="Compra">Compra</option>
                <option value="Renta">Renta</option>
              </select>

              <label for="presupuesto">Precio o Presupuesto</label>
              <input type="number" name="precio" placeholder="Tu precio o presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>
              <legend>Contacto</legend>
                
              <p>Como desea ser Contactado</p>

              <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="maneracontacto" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input name="maneracontacto" type="radio" value="email" id="contactar-email">
              </div>

              <p>Si eligio telefono, elija la fecha y la hora</p>

              <label for="fecha">fecha</label>
              <input type="date" id="fecha" name="fecha">

              <label for="hora">Hora</label>
              <input type="time" id="hora" min="09:00" max="20:00" name="hora">

            </fieldset>

            <input class="boton btn btn-outline-secondary" type="submit" style="color: #03A9D4;" value="Enviar" >
        </form>
    </div>


  <script src="https://kit.fontawesome.com/8d06b4574a.js" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <footer class="pie-pagina">
    
        <div class="grupo2">
            <small>&copy; 2021 <b>Future Reality </b> - Todos los derechos reservados </small>
        </div>
    </footer>     
</body>
</html>