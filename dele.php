<?php
include "nav.php";
require_once "bd/out.php";
require_once "bd/dele.php";
$error = 0;


if (isset($_REQUEST['id'])){
    $folio = trim(mb_strtoupper($_REQUEST['id']));
    $out = new select();
    if ($folio == $out->compru_informe($folio)[0]['id']){
        $dele = new delete();
        $dele->eliminar_informe($folio);
        $error = 3;

    }else{
        $error = 1;
    }


}

if (isset($_REQUEST['patente'])){
    $patente = trim(mb_strtoupper($_REQUEST['patente']));
    $out = new select();
    if ($patente == $out->compru_auto($patente)[0]['patente']){
        $dele = new delete();
        $dele->eliminar_vehivulo($patente);
        $error = 3;


    }else{
        $error = 2;
    }

}

if (isset($_REQUEST['correo'])){
    $correo = trim(mb_strtolower($_REQUEST['correo']));
    $out = new select();
    if($correo == $out->compru_clinete($correo)[0]['correo']){
        $dele = new delete();
        $dele->eliminar_cliente($correo);
        $error = 3;

    }else{
        $error = 4;
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
    <title>Modificar datos</title>
</head>
<body>
<?php echo $menu; ?>
<div class="container-fluid fondo">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center bg-dark text-white mb-3 card-header ">Eliminar datos</h1>
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
                    Datos Eliminados
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
            <h3 class="text-center  text-white mb-3 bg-secondary p-2">Eliminar Informe</h3>
            <form action="">
                <div class="form-group">
                    <label >Ingresar folio: </label>
                    <input type="text" name="id" required  class="form-control" minlength="8">
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#info-d">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="info-d" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Esta seguro de Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Si elimna el informe no podra ser recuperado
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
        <div class="col-md-4 mt-4"> <h3 class="text-center  text-white mb-3 bg-secondary p-2">Eliminar Vehiculo</h3>
            <form action="">
                <div class="form-group">
                    <label >Ingresar Patente: </label>
                    <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6">
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#patente-d">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="patente-d" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Esta seguro de Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Si elimina vehiculo todos sus informes seran tambien eliminados
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form></div>
        <div class="col-md-4 mt-4 mb-4">
            <h3 class="text-center  text-white mb-3 bg-secondary p-2">Eliminar Cliente</h3>
            <form action="">
                <div class="form-group">
                    <label >Ingresar Email:</label>
                    <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#correo-d">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="correo-d" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Esta seguro de Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Si elimina cliente todos sus vehiculos y informes seran eliminados
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

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