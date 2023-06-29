<?php session_start();

//COMPROBAR SESION
if (!isset($_SESSION['rol'])) {
    header('Location: login.php');
} else {
    if ($_SESSION['rol'] != 'user') {
        header('Location: login.php');
    };
}
?>