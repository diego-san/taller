<?php
include "nav.php";
require_once "bd/update.php";

if (isset($_REQUEST['pass'])){


    if (trim($_REQUEST['pass']) == trim($_REQUEST['pass2'])){
        $up = new update();
        $up->cambiar_pass($varsesion,trim($_REQUEST['pass']));

        $link = "inicio.php?e=1";
        echo "<script> location.href='".$link."';</script>";
        die();


    }else{
        $link = "inicio.php?e=2";
        echo "<script> location.href='".$link."';</script>";
        die();

    }
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
            <h1 class="text-center bg-dark text-white mb-3 card-header">Cambiar Contraseña</h1>
            <form action="" onsubmit="return validar()">
                <div class="form-group">
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