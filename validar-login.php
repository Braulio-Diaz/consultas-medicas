<?php session_start();

require 'functions.php';
require 'config/database.php';
$db = new Database();
$connect = $db->connection();


//COMPRUEBA QUE EL USUARIO EXISTA
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}


//VALIDAR LOS DATOS POR PRIVILEGIO

/*if ($usuario['tipo_usuario'] == 'admin') {
    header('Location: admin.php');
} elseif ($usuario['tipo_usuario'] == 'user') {
    header('Location: usuario.php');
} else {
    header('Location: login.php');
}

?>*/