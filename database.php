<?php
    $server = 'localhost';
    $username = 'root';
    $pass = '';
    $database = 'portal_inmob';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$pass);

    }catch(PDOException $e){
        die('Conexion Fallida: '.$e->getMessage());
    }

?>