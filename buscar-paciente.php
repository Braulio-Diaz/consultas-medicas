<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Pacientes</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="javascript.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>
</head>

<body>
  <?php include('views/navbar.php') ?>

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
        <form action="buscar-paciente.php" method="get" class="row g-3">
          <div class="col-md-4"></div>
          <div class="col-md-4 py-3">
            <input type="search" name="paciente" id="paciente" class="form-control" autofocus required
              placeholder="Ingrese rut sin puntos y con guion">
          </div>
          <div class="col-md-4 py-3">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col py-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Rut</th>
              <th scope="col">Día de atención</th>
              <th scope="col">Hora</th>
              <th scope="col">Estado</th>
              <th scope="col">Diagnosticos</th>
              <th scope="col">otros</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>18948182-9</td>
              <td>15/05/2023</td>
              <td>7:45 hrs</td>
              <td>Confirmado</td>
              <td>Enfermo</td>
              <td>Médicina general</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>15948333-k</td>
              <td>15/05/2023</td>
              <td>8:00 hrs</td>
              <td>Reagendado</td>
              <td>Sano</td>
              <td>Médicina general</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>16954282-8</td>
              <td>15/05/2023</td>
              <td>8:30 hrs</td>
              <td>Anulado</td>
              <td>Enfermo</td>
              <td>Médicina general</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>