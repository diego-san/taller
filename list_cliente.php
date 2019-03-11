<?php
include "nav.php";
require_once "bd/out.php";


$out = new select();

$dato = $out->all_dato_cliente();

$dato = array_reverse($dato);

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
    <div class="container fondo">
        <div class="row">
            <?php foreach($dato as $key => $value):?>
            <div class="col-md-12">
                <div class="card text-center ">
                    <div class="card-header">
                        <?php echo $value['nombre'].' '.$value['apellido']; ?>
                    </div>

                    <div class="card-body">
                        <p class="card-text"><?php echo 'Correo: '.$value['correo'].' | Telefono: '.$value['telefono']; ?></p>
                        <a href="mo_cliente.php?c=<?php echo $value['correo']; ?>" class="btn btn-danger">Modificar</a>
                    </div>
                    <?php $dato_a = $out->busca_auto_correo($value['correo']);?>
                    <?php if($dato_a != 0) : ?>
                    <div class="card-footer text-muted">
                        lista de Vehiculo
                    </div>

                    <ul class="list-group list-group-flush">
                    <?php foreach($dato_a as $key_2 => $value_2):?>

                            <li class="list-group-item">
                                <div class="p-1"><?php echo $value_2['marca'].' | Patente: '.$value_2['patente']; ?></div>
                                <a href="mo_cliente.php?c=<?php echo $value['correo']; ?>" class="btn btn-primary text-right">Ver Historial</a>
                            </li>

                    <?php endforeach;?>
                    </ul>
                    <?php endif; ?>
                </div>



            </div>
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