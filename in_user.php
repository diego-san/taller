<?php
include "nav.php";
require_once "bd/in.php";
require_once "bd/out.php";
require_once "bd/mail.php";
$error = 0;
if($_SESSION['tipo'] == 'admin'){

    if (isset($_REQUEST['nombre'])){
        $email =  trim(mb_strtolower($_REQUEST['correo']));
        $out = new select();
        if ($out->compr_user($email)==0) {
            $nombre = trim($_REQUEST['nombre']);
            $apellido = trim($_REQUEST['apellido']);
            $pass = trim($_REQUEST['pass']);
            $tipo = trim(mb_strtolower($_REQUEST['tipo']));

            $in = new insertar();
            $in->in_user($nombre, $apellido, $email, $pass, $tipo);
            $mail = new mail();
            $mail->regis($email,$nombre,$apellido);
            $error = 2;
        }else{
            $error = 1;
        }


    }

}else{
    header("Location:inicio.php");
}



?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--boo-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Sistema taller</title>
</head>
<body>
<?php echo $menu; ?>
<div class="container-fluid fondo">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-4 mb-4">
            <h1 class="text-center bg-dark text-white mb-3 card-header">Ingresar nuevo usuario</h1>
            <?php if($error == 1) : ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            Email ya registrado
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            <?php endif; ?>
            <?php if($error == 2) : ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            Registrado, revisar email
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            <?php endif; ?>
            <form action="" onsubmit="return validar()">
                <div class="form-group">
                    <label >Nombre:</label>
                    <input  type="text" class="form-control" required  name="nombre" minlength="1">
                    <label >Apellido:</label>
                    <input  type="text" class="form-control" required  name="apellido" minlength="1">
                    <label >Email:</label>
                    <input  type="email" class="form-control" required  name="correo" minlength="6" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tipo">
                            <option>normal</option>
                            <option>admin</option>
                        </select>
                    </div>
                    <label >Contraseña:</label>
                    <input  type="password" class="form-control" required  name="pass" id="pass1" minlength="4">
                    <label >Repetir contraseña:</label>
                    <input  type="password" class="form-control" required  name="pass2" id="pass2" minlength="4">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php echo $footer; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="js/validar.js"></script>
</body>
</html>