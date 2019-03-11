<?php
include "nav.php";
require_once "bd/out.php";


$out = new select();

$data = $out->all_data_auto();

if ($data != 0){



}else{


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
    <title></title>
</head>
<body>
<?php echo $menu; ?>

<div class="container">
    <div class="row">

        <?php foreach ($data as $key => $value):?>
        <div class="col-md-12">
            <div class="card-header text-center">
            <div>
            <?php $cliente=  $out->datos_cliente($value['correo']);
            echo ''.$cliente[0]['nombre'].' '.$cliente[0]['apellido'];
            ?>
                <div>
                <?php echo ''.$value['correo'];?>
            </div>
            </div>

        </div>
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo $value['marca'];?></h5>
            <p class="card-text"><?php echo 'Modelo: '.$value['modelo'].' Cilindrada: '.$value['CILIN'].' Patente: '.$value['patente'];?></p>
            <a href="#" class="btn btn-primary">Ver historia</a>
            <a href="mo_vehiculo.php?p=<?php echo $value['patente'];?>" class="btn btn-danger">Modificar</a>
        </div>
        </div>

        <?php endforeach;?>




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