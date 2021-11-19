<?php
  session_start();

  require 'database.php';

  if(isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, nombre, apellido, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Future Reality</title>
  <meta name="viewport" content="width=device-width, initial-scale=no">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>  
  
  <div class="container-fluid navbar navbar-light" style="background-color: #ffffff;">
      <nav class="navbar navbar-expand-lg container">
        <div class="container-fluid">
          <a class="navbar-brand" href="/index.php">
            <img src="/img/logo.png" alt="Future Reality" width="150">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="propiedades.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Comprar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="propiedades_r.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Rentar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.php">
                  Contacto
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="nosotros.html">Acerca de Nosotros</a>
              </li>

              
              <div class="search-box">
                <input type="text" class="search-txt" placeholder="Buscar">
                  <a href="#" class="search-btn">
                    <i class="bi bi-search"></i>
                  </a>
                </input>
              </div>
            
            </ul>

            <?php if(!empty($user)) : ?>
                <div class="d-flexs">
                  Bienvenido  <?= $user['email'] ?>
                  
                  <form action="logout.php">
                    <button class="cerrar btn btn-outline-secondary" type="submit" style="color: #03A9D4;">Cerrar Sesion</button>
                  </form>
                  <form action="/dash/indexdash.php">
                        <button class="publicaciones btn btn-outline-secondary" href="../dash/index.php" style="color: #03A9D4;"> Ir a mis publicaciones</button>
                  </form>
                </div>
            <?php else: ?>
                <form class="d-flex" action="login.php"> 
                    <a class="nav-link" href="#" style="color: #2f3640;">Publicar Gratis <i class="fas fa-plus"></i></a>
                    <button class="btn btn-outline-secondary" type="submit" style="color: #03A9D4;">Iniciar Sesion</button>
                </form>

            <?php endif; ?>
          </div>
        </div>
      </nav>
  </div>

  <div class="content">
    <h1>Encuentra tu Casa Ideal</h1>
    <nav>
        <ul>
          <form class="filtros" id="form-filter" name="form-filter" method="POST" action="propiedades.php">
            <div class="forma-busquedad">
              <label for="buscar-venta">Venta</label>
              <input name="contacto" type="radio" value="venta" id="buscar-venta">

              <label for="buscar-renta">Renta</label>
              <input name="contacto" type="radio" value="renta" id="buscar-renta">
            </div> 
            <fieldset>
              <label for="opciones">Ubicacion:</label>
                <select id="opciones">
                  <option value="" disable selected>--Seleccione una opcion--</option>
                  <option value="Vende">Colima</option>
                  <option value="Compra">Manzanillo</option>
                  <option value="Renta">Jalisco</option>
                </select> 
            </fieldset>

            <fieldset>
              <br><label for="precio">Precio</label>
              <input type="number" placeholder="Precio" id="precio">

              <label for="cuartos">Cuartos</label>
              <input type="number" placeholder="Cuartos" id="cuartos">
                
              <label for="baños">Baños</label>
              <input type="number" placeholder="Baños" id="baños">
            </fieldset>

            <fieldset>
              <label for="tamaño">Tamaño en M2</label>
              <input type="number" placeholder="Tamaño" id="tamaño"><br>

              <label for="opciones1">Amenidades:</label>
                <select id="opciones1">
                  <option value="" disable selected>--Seleccione una opcion--</option>
                  <option value="Vende">Alberca</option>
                  <option value="Compra">Cancha de juegos</option>
                  <option value="Renta">Seguridad de entrada</option>
                </select>
            </fieldset>
            <a class="btn-filtro" type="submit" value="Enviar" style="color: white;">BUSCAR <i class="fas fa-arrow-right"></i></a>
          </form>
        </ul>
      </nav>          
    
  </div>

  <h2 class="tituloinmuebles">Inmuebles que te pudieran interesar</h2>
  <div class="container_card">

    <div class="card">
      <img src="/img/casa1.jpg">
      <h4>Casa en Venta en Mazatlan</h4>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium earum illum laudantium ea, doloribus deleniti enim, rerum sunt repellendus eaque eius consectetur, necessitatibus iure. Dolores vero sint delectus corporis enim!</p>
      <a href="contacto.php">Pedir Información</a>
    </div>

    <div class="card">
      <img src="/img/casa2.jpg">
      <h4>Casa en Venta en Manzanillo</h4>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium earum illum laudantium ea, doloribus deleniti enim, rerum sunt repellendus eaque eius consectetur, necessitatibus iure. Dolores vero sint delectus corporis enim!</p>
      <a href="contacto.php">Pedir Información</a>
    </div>

    <div class="card">
      <img src="/img/casa3.jpg">
      <h4>Casa en Venta en Guadalajara</h4>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium earum illum laudantium ea, doloribus deleniti enim, rerum sunt repellendus eaque eius consectetur, necessitatibus iure. Dolores vero sint delectus corporis enim!</p>
      <a href="contacto.php">Pedir Información</a>
    </div>

  </div>

  <script src="https://kit.fontawesome.com/8d06b4574a.js" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/sweetAlert.js"></script>
  <footer class="pie-pagina">
    <div class="grupo1">
      <div class="box">
        <figure>
          <a href="#">
              <img src="img/logobc.png" alt="Future Reality">
            </a>
          </figure>
        </div>
        <div class="box">
          <h2>
            SOBRE NOSOTROS
          </h2>
          <i class="fas fa-envelope">  draygoza@ucol.mx</i><br>
          <i class="fas fa-phone-alt">  314-197-23-59</i><br>
          <i class="fas fa-university">  Facultad de Ingenieria Electromecanica</i>
        </div>
        <div class="box">
          <h2>SIGUENOS</h2>
            <div class="red-social">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-instagram"></a>
              <a href="#" class="fa fa-youtube"></a>
              <a href="#" class="fa fa-twitter"></a>
            </div>
          </div>
      </div>
  
      <div class="grupo2">
        <small>&copy; 2021 <b>Future Reality </b> - Todos los derechos reservados </small>
      </div>
  </footer>  
</body>
</html>