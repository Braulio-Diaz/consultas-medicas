<?php

require 'config/database.php';
require 'functions.php';
require 'config/rutas.php';

$db = new Database();
$connect = $db->connection();

$ok = false;

if (isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['rol'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $clave = hash('sha512', $clave); //Encripta la contraseña en la base de datos
    $rol = $_POST['rol'];

    //Validación de los campos de texto
    if (empty($usuario) || empty($clave) || empty($rol)) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script language="javascript">Swal.fire("Por favor ingrese todos los campos");</script>
            <title>Registro</title>
        </head>
        <body Class="py-5">
        </body>
        </html>';
        echo '<script language="javascript">Swal.fire("Por favor ingrese todos los campos");</script>';
    } else {
        //Validación de que el usuario no exista
        $query = $connect->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $query->execute([
            ':usuario' => $usuario
        ]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result != false) {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <title>Registro</title>
            </head>       
            <body Class="py-5">
            </body>
            </html>';
            echo '<script language="javascript">Swal.fire("Este usuario ya existe");</script>';
        } else {
            //Guarda al nuevo usuario en la base de datos
            $consulta = $connect->prepare("INSERT INTO usuarios (usuario, clave, tipo_usuario) 
            VALUES (:usu, :cla, :tip)");

            $result = $consulta->execute([
                ':usu' => $usuario,
                ':cla' => $clave,
                ':tip' => $rol
            ]);

            if ($result) {
                $ok = true;
            }

            header('Location: login.php');
        }
    }
}

require 'views/registro.view.php';

?>