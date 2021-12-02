<?php require_once "vistas/partesuperior.php" ?>

<!--inicio del contenido principal-->
<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'portal_inmob');
?>

<div class="container">
    <h1>Todas los mensajes de contacto</h1><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opccion Casa</th>
                <th scope="col">Precio</th>
                <th scope="col">Forma Contactar</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col"><i class="fas fa-sliders-h"></i></th> 
            </tr>
        </thead>
            <?php
                $sql = "SELECT * FROM contacto";
                $result = mysqli_query($conexion,$sql);
                
                while($mostrar=mysqli_fetch_array($result)){
            ?>
        <tbody>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['email'] ?></td>
                <td><?php echo $mostrar['telefono'] ?></td>
                <td><?php echo $mostrar['opcasa'] ?></td>
                <td><?php echo $mostrar['precio'] ?></td>
                <td><?php echo $mostrar['maneracontacto'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['hora'] ?></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>        
    
</div>
    
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