<?php
include "nav.php";
include "bd/in.php";
include "bd/out.php";

$error= 0;

if (isset($_REQUEST['nombre'])) {
    $correo = trim(strtolower($_REQUEST['correo']));
    $out =   new select();

    if ($correo != $out->compru_clinete($correo)[0][0]) {

        $nombre = trim(strtolower($_REQUEST['nombre']));
        $apellido = trim(strtolower($_REQUEST['ap']));
        $tele = trim($_REQUEST['tele']);


        $in = new insertar();
        $in->in_clinete($nombre, $apellido, $tele, $correo);

        if ($correo != $out->compru_clinete($correo)[0][0]){

            $error = 2;

        }else{

            $error = 3;

        }


    }else{
            $error = 1;

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

    <title>Document</title>
</head>
<body>
<?php  echo $menu;?>

    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center bg-dark text-white mb-3 card-header ">Ingreso de datos Cliente</h1>
            </div>
        </div>


        <?php if($error == 1) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Cliente ya esta registrado
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
                        Cliente ingresado corectamente
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

                    </div>Error al ingresar Cliente
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>


       <form action="" method="post">
           <div class="row">
               <div class="col-md-3">

               </div>
               <div class="col-md-6 ">
                   <label >Nombre: </label>
                   <input type="text" name="nombre" required  class="form-control" minlength="1" >

                   <label >Apellido: </label>
                   <input type="text" name="ap" required  class="form-control" minlength="1" >

                   <label >Telefono: </label>
                   <input type="text" name="tele" required  class="form-control" minlength="9" maxlength="12" >

                   <label >Email:</label>
                   <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

               </div>
               <div class="col-md-3">

               </div>
           </div>

           <div class="row" style="margin-top: 20px;">
               <div class="col-md-4"></div><div class="col-md-4">
                   <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
               </div><div class="col-md-4 mb-4"></div>
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