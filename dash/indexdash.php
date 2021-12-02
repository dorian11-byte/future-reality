<?php require_once "vistas/partesuperior.php" ?>

<!--inicio del contenido principal-->
<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'portal_inmob');
?>

<div class="container">
    <h1>Contenido Principal</h1><br>

    <form action="agregarpropiedad.php">
        <button class="btn btn-primary" type="submit" >Agregar una Propiedad</button>
    </form>
    <br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Estado</th>
                <th scope="col">Habitaciones</th>
                <th scope="col">Baños</th>
                <th scope="col">Area</th>
                <th scope="col">Ciudad</th>
                <th scope="col"><i class="fas fa-sliders-h"></i></th> 
            </tr>
        </thead>
            <?php
                $sql = "SELECT * FROM propiedades";
                $result = mysqli_query($conexion,$sql);
                
                while($mostrar=mysqli_fetch_array($result)){
            ?>
        <tbody>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td><?php echo $mostrar['precio'] ?></td>
                <td><img src="../imagenespropiedades/<? php echo $mostrar['img'];?>" class="imagen"> </td>
                <td><?php echo $mostrar['estado'] ?></td>
                <td><?php echo $mostrar['habitaciones'] ?></td>
                <td><?php echo $mostrar['wc'] ?></td>
                <td><?php echo $mostrar['area'] ?></td>
                <td><?php echo $mostrar['ciudad'] ?></td>
                <td><a href="#" style="color: red;"><i class="fas fa-times"></i></a>  <a href="actualizar.php?id=<?php echo $mostrar['id'] ?>"><i class="fas fa-edit" href="#"></i></a></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>        
    
</div>



<!--fin del contenido principal-->

<?php require_once "vistas/parteinferior.php" ?>    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

