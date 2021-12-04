<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades</title>
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
              <h2 style="color: white"> Propiedades </h2>
              <form class="d-flex" action=""> 
                  <a class="nav-link" href="index.php" style="color: white;">Regresar al Inicio <i class="fas fa-undo-alt"></i></a>
              </form>
            </div>
          </div>
        </nav>
    </div>

    <?php
      require 'database.php';

      //consultar base de datos
      $db = mysqli_connect('localhost', 'root', '', 'portal_inmob');

      $query = "SELECT * FROM propiedades ";

      //obtener resultado 
      $result = mysqli_query($db, $query);
    ?>
    <?php //while($propiedad = mysqli_fetch_assoc($result)){?>
    <link rel="stylesheet" href="styles.css">

    <div class="container_card">
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/1.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title"> Casa En Venta En Manzanillo, Colima</h5>
            <p class="card-text">105 m² totales
                3 recámaras
                3 baños 
                Pedro Salazar 102, Salahua, Manzanillo, Colima</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/2.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title"> Casa En Venta, Manzanillo, Colima</h5>
            <p class="card-text">439000 dólaresU$S439,000
                  758 m² totales
                  4 recámaras
                  3 baños
                  Calle De La Cima, Península De Santiago, Manzanillo, Colima</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/3.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title">Casa En Condominio En Venta, Manzanillo, Colima</h5>
            <p class="card-text">7,955,000 pesos$7,955,000
                1200 m² totales
                3 recámaras
                4 baños
                Fracc. La Ceiba, Framboyant, Santiago, Manzanillo, Colima</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/4.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title">Casa En Venta, Manzanillo, Colima</h5>
            <p class="card-text">1390000 pesos$1,390,000
                  853 m² totales
                  4 recámaras
                  3 baños
                  Ejido Canoas Colindante Solar, Las Canoas, Manzanillo, Colima</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/5.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title">Casa En Venta, Manzanillo, Colima</h5>
            <p class="card-text">6500000 pesos$6,500,000
              3 recámaras
              400 m² totales
              Calle Mar Rojo, Del Mar, Manzanillo, Colima
              2 baños
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>
      <div class="card-group" >
        <div class="card"  style="display: block;">
          <img src="/img/6.png" class="card-img">
          <div class="card-body">
            <h5 class="card-title">Departamento En Renta, Manzanillo, Colima</h5>
            <p class="card-text">17000 pesos$17,000
                  3 recámaras
                  3 baños
                  Ponto Horizonte. Blvd Miguel De La Madrid Hurtado, Santiago, Manzanillo, 
                  Colima</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <a href="contacto.php">Pedir Información</a>
        </div>
      </div>

    </div>
    <?php
      //cerrar la conexion
      //}
    ?>

  <script src="https://kit.fontawesome.com/8d06b4574a.js" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/sweetAlert.js"></script>
    <footer class="pie-pagina">
      <div class="grupo2" style="position: fixed;
          left:0px;
          bottom:0px;
          height:50px;
          width:100%;">
        <small>&copy; 2021 <b>Future Reality </b> - Todos los derechos reservados </small>
      </div>
    </footer>
</body>
</html>

