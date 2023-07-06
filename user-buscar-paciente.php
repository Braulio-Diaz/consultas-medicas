<?php 

include('user-sesion.php');
require 'config/database.php';

$db = new Database();
$connect = $db->connection();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Pacientes</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php include('views/admin-navbar.php') ?>

  <main class="container py-3">
    <div class="row">
      <div class="col">
        <h1>
          <center>Buscar Paciente</center>
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3">
          <div class="col-md-4"></div>
          <div class="col-md-4 py-3">
            <input type="search" name="buscar" id="buscar" class="form-control" autofocus
              required placeholder="Ingrese rut sin puntos y con guion">
          </div>
          <div class="col-md-4 py-3">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </div>
        </form>
        <div id="search-results"></div>
      </div>
    </div>

    <div class="row">
      <div class="col py-3">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $buscar = $_POST["buscar"];

          $query = $connect->prepare("SELECT * FROM CONSULTAS_MEDICAS WHERE id = :id OR nombres = :nombres 
  OR primer_apellido = :primer_apellido OR segundo_apellido = :segundo_apellido OR rut = :rut
  OR correo = :correo OR telefono = :telefono OR cita_fecha = :cita_fecha OR cita_hora = :cita_hora 
  OR estado = :estado OR fecha_agregado = :fecha_agregado");
          $query->execute([
            ':id' => $buscar,
            ':nombres' => $buscar,
            ':primer_apellido' => $buscar,
            ':segundo_apellido' => $buscar,
            ':rut' => $buscar,
            ':correo' => $buscar,
            ':telefono' => $buscar,
            ':cita_fecha' => $buscar,
            ':cita_hora' => $buscar,
            ':estado' => $buscar,
            ':fecha_agregado' => $buscar
          ]);

          $result = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        if (!empty($result)) {
          echo "<h2>Resultados de búsqueda:</h2>";
          ?>
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
                  <th scope="row">
                    <?php echo $res['id'] ?>
                  </th>
                  <td>
                    <?php echo $res['nombres'] ?>
                  </td>
                  <td>
                    <?php echo $res['primer_apellido'] ?>
                  </td>
                  <td>
                    <?php echo $res['segundo_apellido'] ?>
                  </td>
                  <td>
                    <?php echo $res['rut'] ?>
                  </td>
                  <td>
                    <?php echo $res['correo'] ?>
                  </td>
                  <td>
                    <?php echo $res['telefono'] ?>
                  </td>
                  <td>
                    <?php echo $res['cita_fecha'] ?>
                  </td>
                  <td>
                    <?php echo $res['cita_hora'] ?>
                  </td>
                  <td>
                    <?php echo $res['estado'] ?>
                  </td>
                  <td>
                    <?php echo $res['fecha_agregado'] ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
        } else {
          echo "<p>No se encontraron resultados.</p>";
        }
        ?>
      </div>
    </div>
  </main>
</body>

</html>