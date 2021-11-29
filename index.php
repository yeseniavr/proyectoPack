<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cheques</title>
    <meta name="keywords" content="">
    <meta name="description" content="Gestión de Cheques">
    <meta name="author" content="Carolina Ayelen Calviño">
    <!--Css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href='css/style.css'>

</head>

<body>
    <div class="container-fluid fondo-mobile">
        <div class="row">
            <div class="col-md-6 desktop">
                <img src="img/fondo.svg" class='img-fluid fondo-img' alt="Imagen Fondo">
            </div>
            <div class="col-md-6 div-form">
                <h1>Log in</h1>
            <!--PHP Version 7.4.12
-->
                <div class="centrado">
                    <img src="img/logo.svg" alt="Logo G-Check" width="150px" style="text-align:'center';">
                </div>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='usuario' required>
                        <span id='usuario'></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name='password' required>
                        <span id='usuario'></span>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                        <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "Usuario y/o contraseña incorrecto";
                        }?></span>
                        <a href="#"><p>Para registrarse por favor comuniquese a hola@gmail.com</p></a>
                    </div>
                </form>
            </div>
        </div>  
    </div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8 " crossorigin="anonymous "></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
</body>