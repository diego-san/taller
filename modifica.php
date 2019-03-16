<?php
include "nav.php";
$error = 0;
if(isset($_GET['e'])){

    $error = $_GET['e'];
}

if (isset($_REQUEST['id'])){
    $link = "mo_informe.php?f=".trim(mb_strtoupper($_REQUEST['id']));
    echo "<script> location.href='".$link."';</script>";
    die();
}

if (isset($_REQUEST['patente'])){
    $link = "mo_vehiculo.php?p=".trim(mb_strtoupper($_REQUEST['patente']));
    echo "<script> location.href='".$link."';</script>";
    die();
}

if (isset($_REQUEST['correo'])){
    $link = "mo_cliente.php?c=".trim(mb_strtolower($_REQUEST['correo']));
    echo "<script> location.href='".$link."';</script>";
    die();
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
    <title>Modificar datos</title>
</head>
<body>
<?php echo $menu; ?>
    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center bg-dark text-white mb-3 card-header ">Modificarr datos</h1>
            </div>
        </div>



            <?php if($error == 1) : ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            Informe no existe
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            <?php endif; ?>


                <?php if($error == 2) : ?>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="alert alert-danger" role="alert">
                                Vehiculo  no existe
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                <?php endif; ?>

        <?php if($error == 3) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Datos modificados
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>

        <?php if($error == 4) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Correo de cliente no registrado
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>

        <div class="row ">
            <div class="col-md-4 mt-4">
                <h3 class="text-center  text-white mb-3 bg-secondary p-2">Modificar Informe</h3>
                <form action="">
                    <div class="form-group">
                    <label >Ingresar folio: </label>
                    <input type="text" name="id" required  class="form-control" minlength="8">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>

                </form>

            </div>
            <div class="col-md-4 mt-4"> <h3 class="text-center  text-white mb-3 bg-secondary p-2">Modificar Vehiculo</h3>
                <form action="">
                    <div class="form-group">
                        <label >Ingresar Patente: </label>
                        <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Buscar</button>

                </form></div>
            <div class="col-md-4 mt-4 mb-4">
                <h3 class="text-center  text-white mb-3 bg-secondary p-2">Modificar Cliente</h3>
                <form action="">
                    <div class="form-group">
                        <label >Ingresar Email:</label>
                        <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <button type="submit" class="btn btn-warning text-white btn-lg btn-block">Buscar</button>

                </form>
            </div>
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
</body>
</html>