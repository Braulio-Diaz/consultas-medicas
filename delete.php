<?php 
include('admin-sesion.php');
require 'config/database.php';

$db = new Database();
$connect = $db->connection();

$id = $_GET['id'];

$query = $connect -> prepare("DELETE FROM usuarios WHERE id=?");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer archivo</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php include('views/user-navbar.php');?>
<body class="py-3">
    <main class="container">
    <div class="row">
        <div class="col py-5">
            <?php if($query -> execute([$id])) { ?>
                <div class= 'col'>
                    <div class= 'alert alert-success d-flex align-items-center' role= 'alert'>
                    <svg class= 'bi flex-shrink-0 me-2' width= '24'  height= '24'  role= 'img' aria-label= 'Success:'>
                    <use xlink:href= '#check-circle-fill' />
                    </svg>
                    <div>
                    <h1>Usuario eliminado correctamente.</h1>
                    </div>
                    </div>
                    </div>
            <?php }else{ ?>
                <h3>Error al eliminar</h3>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
          <a href="administrar-usuarios.php" class="btn btn-secondary">Regresar</a>  
        </div>
    </div>
    </main>
</body>
</html>