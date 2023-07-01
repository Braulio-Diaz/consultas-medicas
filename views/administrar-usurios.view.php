<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script href="js/javascript.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Administrar usuarios</title>
</head>

<body>
    <?php include('admin-navbar.php'); ?>
    <main class="container py-5">
        <div class="row g-2">
            <div class="col-md-6">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                        <div class="col">
                            <center>
                                <h1>Crear usuario</h1>
                            </center>
                        </div>
                    </div>
                    <div class="input-group py-4">
                        <i class='bx bxs-user-plus bx-md'></i>
                        <input type="text" name="usuario" id="usuario" class="form-control" autofocus
                            placeholder="Usuario">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock bx-md'></i>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="input-group py-4">
                        <i class='bx bxs-check-circle bx-md'></i>
                        <select class="form-control" name="rol" id="rol">
                            <option value="">Seleccionar un privilegio</option>
                            <option value="admin">Administrador</option>
                            <option value="user">Usuario</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <center>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Crear</button>
                        </center>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <center>
                            <h1>Listado de usuarios</h1>
                        </center>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $res['id'] ?>
                                </th>
                                <td>
                                    <?php echo $res['usuario'] ?>
                                </td>
                                <td>
                                    <?php echo $res['tipo_usuario'] ?>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $res['id'] ?>" class="btn btn-danger">Eliminar</a>
                                </td>
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