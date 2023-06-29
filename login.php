<?php session_start();

require 'config/database.php';
require 'functions.php';
require 'config/rutas.php';

$db = new Database();
$connect = $db->connection();


if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('Location: admin.php');
            break;
        case 2:
            header('Location: usuario.php');
            break;
        default:
    }
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = seguridadDeIngreso($_POST['usuario']);
    $clave = seguridadDeIngreso($_POST['clave']);
    $clave = hash('sha512', $clave); //Encripta la contraseña en la base de datos

    //Validación de los campos de texto
    if (empty($usuario) || empty($clave)) {
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
            <body>
            </body>
            </html>';
        echo '<script language="javascript">Swal.fire("Por favor ingrese todos los campos");</script>';
    } else {
        $query = $connect->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave");
        $query->execute([
            ':usuario' => $usuario,
            ':clave' => $clave
        ]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result == true) {
            foreach ($result as $resultado) {
                $rol = $resultado['tipo_usuario'];
                $_SESSION['rol'] = $rol;
                switch ($_SESSION['rol']) {
                    case 'admin':
                        header('Location: admin.php');
                        break;
                    case 'user':
                        header('Location: usuario.php');
                        break;
                    default:
                }

            }
        } else {
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <title>Registro</title>
            </head>       
            <body>
            </body>
            </html>';
            echo '<script language="javascript">Swal.fire("Usuario y/o contraseña incorrectos");</script>';
        }
    }
}

require 'views/login.view.php';

?>