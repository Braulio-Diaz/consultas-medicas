<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar.php') ?>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>

    <main class="container py-5">
        <div class="row">
            <div class="col">
                <?php
                if (isset($_FILES['archivo'])) {
                    $nombreArchivo = $_FILES['archivo']['name'];
                    $ubicacionTemporal = $_FILES['archivo']['tmp_name'];
                    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                    $nuevoNombre = uniqid() . '.' . $extension;
                    $ubicacionDestino = "" . $nuevoNombre;

                    // Mueve el archivo a la ubicación deseada con el nuevo nombre
                    move_uploaded_file($ubicacionTemporal, $ubicacionDestino);
                    

                    echo "<div class= 'col'>";
                    echo "<div class= 'alert alert-success d-flex align-items-center' role= 'alert'>";
                    echo "<svg class= 'bi flex-shrink-0 me-2' width= '24'  height= '24'  role= 'img' aria-label= 'Success:'>";
                    echo "<use xlink:href= '#check-circle-fill' />";
                    echo "</svg>";
                    echo "<div>";
                    echo "<h1>Archivo subido y renombrado correctamente. $nuevoNombre </h1>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="row py-3">
                <div class="col-md-6">
                    <a name="" id="" class="btn btn-secondary" href="agendar.php" role="button">Regresar</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>