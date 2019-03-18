<?php
include "nav.php";
require_once "bd/out.php";

$error = 0;

if (isset($_GET['e']) && is_numeric($_GET['e'])){

    $error = $_GET['e'];
}
$out = new select();
$dato_c = $out->all_dato_cliente();
$dato_c = array_reverse($dato_c);

$dato_v = array_reverse($out->all_data_auto());

$dato_i = array_reverse($out->all_infor());

$total_i = $out->total_informe_ano();



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
    <div class="container-fluid fondo">
        <?php if($error == 1) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-1">
                    <div class="alert alert-success" role="alert">
                        Clave Modificada
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>

        <?php if($error == 2) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-1">
                    <div class="alert alert-danger" role="alert">
                        Clave Distitas
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>
        <?php if($error == 3) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-1">
                    <div class="alert alert-success" role="alert">
                        Usuario eliminado
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-2">
        <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-dark mb-3" style="height: 200px" >
                <div class="card-header">Ultimo Cliente</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dato_c[0]['nombre'].' '.$dato_c[0]['apellido'];?></h5>
                    <p class="card-text"> <?php echo $dato_c[0]['correo'];?></p>
                    <a href="list_informe.php?buscar=<?php echo $dato_c[0]['correo'];?>" class="btn btn-primary">Ver informes</a>
                </div>
            </div>
        </div>
            <div class="col-md-6">
                <div class="card text-white bg-dark mb-3 " style="height: 200px">
                    <div class="card-header">Ultimo vehiculo Ingresado</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $dato_v[0]['marca'].' '.$dato_v[0]['modelo'];?></h5>
                        <p class="card-text"><?php echo $dato_v[0]['patente'];?></p>
                        <a href="list_informe.php?buscar=<?php echo $dato_v[0]['patente'];?>" class="btn btn-primary">Ver informes</a>
                    </div>
                </div>
            </div>

        </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3 " style="height: 200px" >
                        <div class="card-header">Ultimo Informe Ingresado</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dato_i[0]['id'];?></h5>
                            <p class="card-text"><?php echo $dato_i[0]['email'];?> <?php echo $dato_i[0]['patente'];?></p>
                            <a href="list_informe.php?buscar=<?php echo $dato_i[0]['patente'];?>" class="btn btn-primary">Ver informes</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3" style="height: 200px">
                        <div class="card-header">Cantidad de Informes en el año <?php echo date('Y');?></div>
                        <h1 class="card-title text-center mt-4" style="font-size:70px;"> <?php echo $total_i[0][0];?></h1>
                    </div>
                </div>

            </div>
        </div>
            <div class="col-md-1"></div>




        </div>
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
</body>
</html>