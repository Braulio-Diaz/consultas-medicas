<?php

require 'vendor/autoload.php';
require 'config/database.php';



$db = new Database();
$connect = $db->connection();

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{

    public function readCell($columnAddress, $row, $worksheetName = '')
    {
        // Se le designa un parametro de cuales filas debe leer
        if ($row > 7 && $row < 19) {
            return true;
        }
        return false;
    }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
if (isset($_FILES['archivo'])) {
    $inputFileName = $_FILES['archivo']['tmp_name'];
} else {
    $inputFileName = 'archivo.xlsx';
}

/**  Identify the type of $inputFileName  **/
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/**  Create a new Reader of the type that has been identified  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

//lee la funcion readCell y muestra la fila mayor a la posición 1
$reader->setReadFilter(new MyReadFilter());
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
$datos = $spreadsheet->getActiveSheet()->toArray();

foreach ($datos as $row) {
    if ($row[0] != '') {
        $consulta = "INSERT INTO CONSULTAS_MEDICAS(nombres, primer_apellido, segundo_apellido,
        rut, correo, telefono, cita_fecha, cita_hora, estado) VALUES 
        ('$row[7]', '$row[5]', '$row[6]', '$row[0]', '$row[11]', '$row[15]', '$row[21]', 
        '$row[22]', '$row[23]')";
        $result = $connect->query($consulta);
    }
}
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
    <?php include('views/navbar.php');
    echo count($datos);
    ?>

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

                    //Le designamos una carpeta-ruta de destino al archivo excel
                    $ubicacionDestino = dirname(__FILE__)."/archivosExcel";
                    $url_target = str_replace('\\', '/', $ubicacionDestino).'/'.$nuevoNombre;

                    // Mueve el archivo a la ubicación deseada con el nuevo nombre
                    move_uploaded_file($ubicacionTemporal, $url_target);

                    

                    // Inserta el nombre del archivo a la bd
                    $insertar_nombre_archivo = "INSERT INTO IMPORTACIONES(archivo_nombre) VALUES 
                    ('$nuevoNombre')";
                    $result = $connect->query($insertar_nombre_archivo);


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

                <?php ?>
                <table id="table">
                    <tbody>
                        <?php foreach ($datos as $fila):

                            $cont = -1;
                            ?>
                            <tr>
                                <?php foreach ($fila as $valor): ?>
                                    <td id="td">

                                        <?php echo $valor;

                                        $arr[$cont++] = $valor;
                                        $cont;
                                        echo "<b> $cont </b>"
                                            ?>
                                    </td>
                                <?php endforeach; ?>
                                <?php foreach ($fila as $valor): ?>
                                    <td id="td">

                                        <?php echo $valor; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>