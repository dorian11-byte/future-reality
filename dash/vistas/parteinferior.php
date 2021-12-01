            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <small>&copy; 2021 <b>Future Reality </b> - Todos los derechos reservados </small>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro de Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Salir" en la parte de abajo para cerrar sesion.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../login.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        require '../database.php';


        $message = '';

        if(!empty($_POST['titulo']) && !empty($_POST['precio'] && !empty($_POST['estado']))) {
            $sql = "INSERT INTO propiedades (titulo, precio, estado, amenidades, img, descripccion, habitaciones, wc, estacionamiento, area, ciudad) VALUES (:titulo, :precio, :estado, :amenidades, :img, :descripccion, :habitaciones, :wc, :estacionamiento, :area, :ciudad)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titulo',$_POST['titulo']);
            $stmt->bindParam(':precio',$_POST['precio']);
            $stmt->bindParam(':estado',$_POST['estado']);
            $stmt->bindParam(':amenidades',$_POST['amenidades']);
            $stmt->bindParam(':img',$_POST['img']);
            $stmt->bindParam(':descripccion',$_POST['descripccion']);
            $stmt->bindParam(':habitaciones',$_POST['habitaciones']);
            $stmt->bindParam(':wc',$_POST['wc']);
            $stmt->bindParam(':estacionamiento',$_POST['estacionamiento']);
            $stmt->bindParam(':area',$_POST['area']);
            $stmt->bindParam(':ciudad',$_POST['ciudad']);   
            

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

    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>
    <!-- Agregar Modal-->
    <div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar una Propiedad</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="propiedad" method="POST" action="indexdash.php">
                    <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="titulo" class="col-form-label">TITULO</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="col-form-label">PRECIO</label>
                            <input type="number" class="form-control" id="precio" name="precio">
                        </div>
                        <div class="mb-3">
                            <label for="opcciones" class="col-form-label">VENDE O RENTA</label>
                                <select id="opciones" class="form-control" name="estado">
                                    <option value="" disable selected>--Seleccione una opcion--</option>
                                    <option value="Vende">VENDE</option>
                                    <option value="Renta">RENTA</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="opcciones" class="col-form-label">AMENIDADES</label>
                                <select id="opciones" class="form-control" name="amenidades">
                                    <option value="" disable selected>--Seleccione una opcion--</option>
                                    <option value="Vende">ALBERCA</option>
                                    <option value="Renta">PATIO</option>
                                    <option value="Renta">TERRAZA</option>
                                    <option value="Renta">SALON DE FIESTA</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="col-form-label">IMAGEN</label>
                            <input type="file" class="form-control" id="img" name="img" accept="image/jpge, image/png">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">DESCRIPCIÓN:</label>
                            <textarea class="form-control" id="message-text" name="descripccion"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="habitaciones" class="col-form-label">HABITACIONES</label>
                            <input type="number" class="form-control" id="habitaciones" name="habitaciones" placeholder="Ej:3">
                        </div>
                        <div class="mb-3">
                            <label for="wc" class="col-form-label">BAÑOS</label>
                            <input type="number" class="form-control" id="wc" name="wc" placeholder="Ej:3">
                        </div>
                        <div class="mb-3">
                            <label for="estacionamiento" class="col-form-label">ESTACIONAMIENTO</label>
                            <input type="number" class="form-control" id="estacionamiento" name="estacionamiento" placeholder="Ej:3">
                        </div>
                        <div class="mb-3">
                            <label for="estacionamiento" class="col-form-label">AREA</label>
                            <input type="number" class="form-control" id="area" name="area" placeholder="Ej:3">
                        </div>
                        <div class="mb-3">
                            <label for="opcciones" class="col-form-label">CIUDAD</label>
                                <select id="opciones" class="form-control" name="ciudad">
                                    <option value="" disable selected>--Seleccione una opcion--</option>
                                    <option value="Vende">MANZANILLO</option>
                                    <option value="Renta">COLIMA</option>
                                    <option value="Renta">JALISCO</option>
                                </select>
                        </div>
                   
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <input class="btn btn-primary" type="submit" value="Agregar" ></input>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>