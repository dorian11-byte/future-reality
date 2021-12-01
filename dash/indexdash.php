<?php require_once "vistas/partesuperior.php" ?>

<!--inicio del contenido principal-->
<?php
    require '../database.php';
?>

<div class="container">
    <h1>Contenido Principal</h1><br>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AgregarModal">
        Agregar una Propiedad
    </button>
    <br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Precio</th>
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
            ?>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>

            <?php
                
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

