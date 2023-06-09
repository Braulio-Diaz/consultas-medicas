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
    <title>Registro</title>
</head>

<body Class="py-5">
    <main class="container">
        <div class="row">
            <div class="col">
                <center>
                    <h1>Crear usuario</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-md-4"></div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row g-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="input-group py-4">
                            <i class='bx bxs-user-plus bx-md'></i>
                            <input type="text" name="usuario" id="usuario" class="form-control" autofocus
                                placeholder="Usuario">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock bx-md'></i>
                            <input type="password" name="clave" id="clave" class="form-control"
                                placeholder="Contraseña">
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
                                <?php if (!empty($errores)): ?>
                                    <ul>
                                        <?php echo $errores; ?>
                                    </ul>
                                <?php endif; ?>
                                <button type="submit" onclick="alerta()" class="btn btn-outline-primary btn-lg btn-block">Crear</button>
                            </center>
                            <br>
                            <center><a class="login-link" href="#">¿No tienes cuenta?</a></center>
                        </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>