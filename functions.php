<?php 

function seguridadDeIngreso($datos){
    $datos = trim($datos); //Evita que ingresen un campo vacio al comienzo
    $datos = htmlspecialchars($datos); //Evita que ingresen caracteres especiales para sql inyection
    $datos = filter_var($datos, FILTER_SANITIZE_STRING); //Limpia los datos maliciosos
    return $datos;
}

?>