<?php

    // Validador de Id 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id){
        header('Location: /dash/indexdash.php');
    }

    $db = mysqli_connect('localhost', 'root', '', 'portal_inmob');

    //obtener los datos de las propiedades
    $consulta = "SELECT * FROM propiedades WHERE id = ${id} ";
    $resultado = mysqli_query($db, $consulta);
    $propieda = mysqli_fetch_assoc($resultado);


    $titulo = $propieda['titulo'];
    $precio = $propieda['precio'];
    $estado = $propieda['estado'];
    $amenidades = $propieda['amenidades'];
    $descripcion = $propieda['descripcion'];
    $habitaciones = $propieda['habitaciones'];
    $wc = $propieda['wc'];
    $estacionamiento = $propieda['estacionamiento'];
    $area = $propieda['area'];
    $ciudad = $propieda['ciudad'];


    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";

        //echo "<pre>";
        //var_dump($_FILES);
        //echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $amenidades = $_POST['amenidades'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $area = $_POST['area'];
        $ciudad = $_POST['ciudad'];


        //validar las img

        $imagen = $_FILES['img'];
        

        $medida = 1000 * 1000;

        //insertar en la base de datos

        //crear carpeta
        $carpetaImagenes = "../imagenespropiedades/";

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        //subida de archivos
        if($imagen['name'])
        {
            unlink($carpetaImagenes . $propieda['imagen']);
        }
        

        //generar nombre unico

        $nombreImg = md5( uniqid( rand(), true ) ) . ".jpg";

        //subir img

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImg );

        $query = "UPDATE propiedades SET titulo='${titulo}', precio=${precio}, imagen=${nombreImg}, estado='${estado}', amenidades='${amenidades}', descripcion='${descripcion}', habitaciones=${habitaciones}, wc=${wc}, estacionamiento=${estacionamiento}, area=${area}, ciudad='${ciudad}' 
        WHERE id = ${id}";

        echo $query;

        exit;

        $resultado = mysqli_query($db, $query);


        if($resultado){
            header('Location: /dash/indexdash.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propiedad</title>
    <meta name="viewport" content="width=device-width, initial-scale=no">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    
    <div class="conten">
        <h1>Actualizar Propiedad</h1>
    </div>
    
    <div class="container-seccion">
        <form class="formulario" method="POST" enctype="multipart/form-data">                    
            <label for="titulo" >TITULO</label>
            <input type="text" placeholder="Titulo" id="titulo" name="titulo" >

            <label for="precio" >PRECIO</label>
            <input type="number" placeholder="Precio" id="precio" name="precio" >

            <label for="opcciones" >VENDE O RENTA</label>
                <select id="opciones" placeholder="Vende o renta" name="estado" >
                    <option value="" disable selected>--Seleccione una opcion--</option>
                    <option value="Vende">VENDE</option>
                    <option value="Renta">RENTA</option>
                </select>

            <label for="opcciones" >AMENIDADES</label>
                <select id="opciones" placeholder="Amenidades" name="amenidades" >
                    <option value="" disable selected>--Seleccione una opcion--</option>
                    <option value="alberca">ALBERCA</option>
                    <option value="patio">PATIO</option>
                    <option value="terraza">TERRAZA</option>
                    <option value="salon">SALON DE FIESTA</option>
                </select>

            <label for="img" >IMAGEN</label>
            <input type="file" placeholder="img" id="img" name="img" >

            <label for="descripcion" >DESCRIPCIÓN:</label>
            <textarea placeholder="Descripcion" id="descripcion" name="descripcion" ></textarea>

            <label for="habitaciones" >HABITACIONES</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:3" min="1" max="9" >

            <label for="wc" >BAÑOS</label>
            <input type="number" id="wc" name="wc" placeholder="Ej:3" min="1" max="9" >

            <label for="estacionamiento" >ESTACIONAMIENTO</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" min="1" max="9" >

            <label for="area" >AREA</label>
            <input type="number" id="area" name="area" placeholder="Ej:345.76 m2" >

            <label for="opcciones" >CIUDAD</label>
                <select id="opciones" placeholder="Ciudad" name="ciudad" >
                    <option value="" disable selected>--Seleccione una opcion--</option>
                    <option value="Manzanillo">MANZANILLO</option>
                    <option value="Colima">COLIMA</option>
                    <option value="Jalisco">JALISCO</option>
                </select>
                <br>
            <input class="btn btn-primary" type="submit" value="Agregar Propiedad" ></input>
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