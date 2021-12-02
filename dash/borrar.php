<?php

    $db = mysqli_connect('localhost', 'root', '', 'portal_inmob');

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $query = "DELETE FROM propiedades WHERE id=${id}";
            $result = mysqli_query($db, $query);
            
            $query = "SELECT imagen FROM propiedades WHERE id=${id}";
            $result = mysqli_query($db, $query);
            $propieda = mysqli_fetch_assoc($result);
            unlink('../imagenespropiedades/' . $propieda['imagen']);

            if($result){
                header ("Location: /dash/indexdash.php");
            }
        }
?>