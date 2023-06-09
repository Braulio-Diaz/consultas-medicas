<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script href="javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body Class="py-5">
    <main class="container">
        <div class="row">
            <div class="col">
                <center>
                    <h1>Ingresar</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="inicio.php" method="post" class="row g-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 py-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" autofocus required
                            placeholder="correo electrónico">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 py-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña" class="form-control" required
                            placeholder="*********">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 py-3 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>