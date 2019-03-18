<?php
include "nav.php";
require_once "bd/out.php";
require_once "bd/dele.php";

if($_SESSION['tipo'] == 'admin'){

    $out = new select();
    $datos = $out->all_dato_user();

    if (isset($_REQUEST['correo'])){
        $dele = new delete();
        $dele->eliminar_user(trim(mb_strtolower($_REQUEST['correo'])));
        $link = "inicio.php?e=3";
        echo "<script> location.href='".$link."';</script>";
        die();

    }

}else{
    $link = "inicio.php";
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
    <title>Sistema taller</title>
</head>
<body>
<?php echo $menu; ?>
    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-4 mb-4">
                <h1 class="text-center bg-dark text-white card-header">Lista de Usuarios</h1>
            </div>
            <div class="col-md-2"></div>
            <?php foreach($datos as $key => $value):?>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header bg-secondary text-white">
                        <?php echo $value['correo'];?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['nombre'].' '.$value['apellido'];?></h5>
                        <p class="card-text">Tipo: <?php echo $value['tipo'];?></p>

                        <a type="button" class="btn btn-danger" data-toggle="modal" href="#<?php echo str_replace( ['@','.'], 'H',$value['correo']);?>" >
                            Eliminar
                        </a>
                    </div>
                </div>
            </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="<?php echo str_replace( ['@','.'], 'H',$value['correo']);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Seguro de eliminar</h5>
                            </div>
                            <form action="">
                            <div class="modal-body">

                                    <input type="text" name="correo" value="<?php echo $value['correo'];?>">

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-md-2"></div>

            <?php endforeach;?>
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