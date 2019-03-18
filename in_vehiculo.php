<?php
include "nav.php";
include "bd/in.php";
include "bd/out.php";

$error = 0;

if (isset($_REQUEST['patente'])) {
    $correo = trim(mb_strtolower($_REQUEST['correo']));
    $out = new select();

    if($correo== $out->compru_clinete($correo)[0][0]) {
        $patente = trim(mb_strtoupper($_REQUEST['patente']));
        if ($patente!= $out->compru_auto($patente)[0][0]) {
            $marca = trim($_REQUEST['marca']);
            $modelo = trim($_REQUEST['modelo']);
            $cili = trim(mb_strtolower($_REQUEST['cili']));
            $ano = trim(mb_strtolower($_REQUEST['ano']));

            $in = new insertar();
            $in->in_auto($patente, $marca, $modelo, $cili, $ano, $correo);
            if ($patente != $out->compru_auto($patente)[0][0]){

                $error = 2;

            }else{
                $error = 3;
            }


        }else{
            $error = 1;
        }


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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="css/estilo.css">

    <title>sistema taller</title>
</head>
<body>
<?php  echo $menu;?>

<div class="container-fluid fondo">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center bg-dark text-white mb-3 card-header ">datos vehiculo</h1>
        </div>
    </div>


    <?php if($error == 1) : ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                    Vehiculo ya esta registrado
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
                    Vehiculo ingresado correctamente
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
                    Error al ingresar Vehiculo
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
                    Debe ingresar "Cliente" antes de ingresar vehiculo
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label >Patente: </label>
                <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6" >

                <label >Marca: </label>
                <input type="text" name="marca" required  class="form-control" minlength="1" >

                <label >Modelo: </label>
                <input type="text" name="modelo" required  class="form-control" minlength="1" >

                <label >Cilindrada: </label>
                <input type="text" name="cili" required  class="form-control" minlength="1" >

                <label >Año: </label>
                <input type="text" name="ano" required  class="form-control" minlength="4"  maxlength="4">

                <label >Email de Dueño de vehiculo:</label>
                <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row " style="margin-top: 20px;">
            <div class="col-md-4"></div><div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
            </div><div class="col-md-4"></div>
            <div class="col-md-12 mb-4"></div>
        </div>
    </form>

</div>

<?php  echo $footer;?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="js/moment.js"></script>

<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
</body>
</html>