<?php
include('user-sesion.php');
require 'config/database.php';

$db = new Database();
$connect = $db->connection();
$query = $connect->query("SELECT id, nombres, primer_apellido, segundo_apellido, rut, correo, telefono,
cita_fecha, cita_hora, estado, fecha_agregado FROM CONSULTAS_MEDICAS ORDER BY id ASC");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

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
  <?php include('views/user-navbar.php') ?>

  <main class="container">
    <div class="row">
      <div class="col py-3">
        <h1>
          <center>Lista de pacientes para hoy</center>
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="col py-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombres</th>
              <th scope="col">Primer apellido</th>
              <th scope="col">Segundo apellido</th>
              <th scope="col">Rut</th>
              <th scope="col">Correo</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Fecha de cita</th>
              <th scope="col">Hora de cita</th>
              <th scope="col">Estado</th>
              <th scope="col">Última fecha envío de mensaje</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $res) { ?>
            <tr>
              <th scope="row"><?php echo $res['id'] ?></th>
              <td><?php echo $res['nombres'] ?></td>
              <td><?php echo $res['primer_apellido'] ?></td>
              <td><?php echo $res['segundo_apellido'] ?></td>
              <td><?php echo $res['rut'] ?></td>
              <td><?php echo $res['correo'] ?></td>
              <td><?php echo $res['telefono'] ?></td>
              <td><?php echo $res['cita_fecha'] ?></td>
              <td><?php echo $res['cita_hora'] ?></td>
              <td><?php echo $res['estado'] ?></td>
              <td><?php echo $res['fecha_agregado'] ?></td>
            </tr>
            <?php } ?>
            <tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>