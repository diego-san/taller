<?php
include "nav.php";
require_once "bd/out.php";
require_once "bd/update.php";


header("Content-Type: text/html;charset=utf-8");
if(isset($_GET['c'])){
    $correo=$_GET['c'];
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){

        $out = new select();
        $datos = $out->datos_cliente($correo);
        if ($out->datos_cliente($correo)== 0){
            header("Location:modifica.php?e=4");

        }

    }else{
        header("Location:inicio.php");

    }

}else{
    header("Location:modifica.php");
}


if (isset($_REQUEST['nombre'])) {

        $modi= new update();

        $nombre = trim($_REQUEST['nombre']);
        $apellido = trim($_REQUEST['ap']);
        $tele = trim($_REQUEST['tele']);
        $correo = trim(strtolower($_REQUEST['correo']));

        if ($datos[0]['correo']!= $correo){


            $modi->new_correo_info($correo,$datos[0]['correo']);
            $modi->new_correo_auto($correo,$datos[0]['correo']);
            $modi->mo_cliente_correo($nombre,$apellido,$tele,$correo,$datos[0]['correo']);
            header("Location:modifica.php?e=3");


        }else{
            $modi->mo_cliente($nombre,$apellido,$tele,$correo);
            header("Location:modifica.php?e=3");

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
    <title></title>
</head>
<body>
<?php echo $menu; ?>

<div class="container fondo">
    <h1 class="text-center text-dark">Modificar datos de  Cliente</h1>




    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <label >Nombre: </label>
                <input type="text" name="nombre" required  class="form-control" minlength="1"  value="<?php echo $datos[0]['nombre'];?>">

                <label >Apellido: </label>
                <input type="text" name="ap" required  class="form-control" minlength="1" value="<?php echo $datos[0]['apellido'];?>">

                <label >Telefono: </label>
                <input type="text" name="tele" required  class="form-control" minlength="9" maxlength="12" value="<?php echo $datos[0]['telefono'];?>">

                <label >Email:</label>
                <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $datos[0]['correo'];?>">

            </div>
            <div class="col-md-6">

            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-4"></div><div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                    Modificar
                </button>
            </div><div class="col-md-4"></div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esta seguro de modificcar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Modificar</button>
                    </div>
                </div>
            </div>
        </div>



    </form>



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