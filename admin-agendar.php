<?php 

include('admin-sesion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php include('views/admin-navbar.php') ?>

    <main class="container py-3">
        <div class="row">
            <div class="col">
                <center>
                    <h1>Agendar</h1>
                </center>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4 py-5">
                <div class="btn d-grid gap-2">
                    <button class="btn-a btn-secondary btn-lg btn-block" type="button" data-bs-toggle="collapse"
                        data-bs-target="#despliegue" aria-expanded="false" aria-controls="collapseExample">
                        <h4>Agenda masiva <br> archivo txt, csv, excel</h4>
                    </button>
                </div>
                <div class="collapse" id="despliegue">
                    <div class="card card-body">
                        <form action="admin-leer-archivo.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="archivo" id="archivo" onclick="validarArchivoExcel()" class="form-control" required>
                            <div class="col py-3 d-grid gap-2">
                                <button type="submit" onclick="cargarExcel()" class="btn btn-outline-primary btn-lg btn-block">Agendar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-5">
                <div class="btn d-grid gap-2">
                    <button class="btn-a btn-secondary btn-lg btn-block" type="button" data-bs-toggle="collapse"
                        data-bs-target="#despliegue2" aria-expanded="false" aria-controls="collapseExample">
                        <h4>Agendar individual</h4>
                    </button>
                </div>
                <div class="collapse" id="despliegue2">
                    <div class="card card-body">
                        <form action="inicio.php" method="post">
                            <div class="col py-3">
                                <label for="usuario" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" autofocus required
                                    placeholder="Ingrese su nombre">
                            </div>
                            <div class="col py-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" id="contraseña" class="form-control" required
                                    placeholder="Ingrese su apellido">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Rut</label>
                                <input type="text" name="rut" id="rut" class="form-control" required
                                    placeholder="Ingrese su rut sin puntos y con guion">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required
                                    value="+56">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Correo electrónico</label>
                                <input type="text" name="correo" id="correo" class="form-control" required
                                    placeholder="Ingrese su correo electrónico">
                            </div>
                            <div class="col py-3">
                                <label for="hora" class="form-label">Hora de atención</label>
                                <input type="datetime-local" name="hora" id="hora" class="form-control" required>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="doctor" id="doctor" required>
                                    <option selected>Selecione un doctor</option>
                                    <option value="doctor1">doctor1</option>
                                    <option value="doctor2">doctor2</option>
                                    <option value="doctor3">doctor3</option>
                                </select>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="especialidad" id="especialidad" required>
                                    <option selected>Selecione una especialidad</option>
                                    <option value="especialidad1">especialidad1</option>
                                    <option value="especialidad2">especialidad2</option>
                                    <option value="especialidad3">especialidad3</option>
                                </select>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="hospital" id="hospital" required>
                                    <option selected>Selecione un hospital</option>
                                    <option value="hospital1">hospital1</option>
                                    <option value="hospital2">hospital2</option>
                                    <option value="hospital3">hospital3</option>
                                </select>
                            </div>
                            <div class="col py-3 d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Agendar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-5">
                <div class="btn d-grid gap-2">
                    <button class="btn-a btn-secondary btn-lg btn-block" type="button" data-bs-toggle="collapse"
                        data-bs-target="#despliegue3" aria-expanded="false" aria-controls="collapseExample">
                        <h4>Agendar hora</h4>
                    </button>
                </div>
                <div class="collapse" id="despliegue3">
                    <div class="card card-body">
                        <form action="inicio.php" method="post">
                            <div class="col py-3">
                                <label for="usuario" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" autofocus required
                                    placeholder="Ingrese su nombre">
                            </div>
                            <div class="col py-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" id="contraseña" class="form-control" required
                                    placeholder="Ingrese su apellido">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Rut</label>
                                <input type="text" name="rut" id="rut" class="form-control" required
                                    placeholder="Ingrese su rut sin puntos y con guion">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required
                                    value="+56">
                            </div>
                            <div class="col py-3">
                                <label for="rut" class="form-label">Correo electrónico</label>
                                <input type="text" name="correo" id="correo" class="form-control" required
                                    placeholder="Ingrese su correo electrónico">
                            </div>
                            <div class="col py-3">
                                <label for="hora" class="form-label">Hora de atención</label>
                                <input type="datetime-local" name="hora" id="hora" class="form-control" required>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="doctor" id="doctor">
                                    <option selected>Selecione un doctor</option>
                                    <option value="doctor1">doctor1</option>
                                    <option value="doctor2">doctor2</option>
                                    <option value="doctor3">doctor3</option>
                                </select>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="especialidad" id="especialidad">
                                    <option selected>Selecione una especialidad</option>
                                    <option value="especialidad1">especialidad1</option>
                                    <option value="especialidad2">especialidad2</option>
                                    <option value="especialidad3">especialidad3</option>
                                </select>
                            </div>
                            <div class="col py-3">
                                <select class="form-select" name="hospital" id="hospital">
                                    <option selected>Selecione un hospital</option>
                                    <option value="hospital1">hospital1</option>
                                    <option value="hospital2">hospital2</option>
                                    <option value="hospital3">hospital3</option>
                                </select>
                            </div>
                            <div class="col py-3 d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Agendar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

