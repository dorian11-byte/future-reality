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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
