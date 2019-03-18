<?php
include "nav.php";
require_once "bd/out.php";
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

if (isset($_GET['p'])){
    $patente = $_GET['p'];

    if (strlen($patente )!=6){
        header("Location:list_informe.php?e=1");
    }

    $out = new  select();
    $dato_a= $out->datos_auto($patente);
    if ($dato_a== 0){
        header("Location:list_informe.php?e=1");
    }
    $dato_c = $out->datos_cliente($dato_a[0]['correo']);

    $dato_info = $out->buscar_info_patente($patente);

    if ($dato_info == 0){
        header("Location:list_informe.php?e=1");
    }

    $dato_info =  array_reverse($dato_info);






}else{
    header("Location:list_informe.php?e=2");
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
    <title>Sistema taller</title>
</head>
<body>
<?php echo $menu; ?>
    <div class="container-fluid fondo" >
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card  mb-3">
                    <div class="card-header text-white bg-dark">Datos de cliente</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nombre: <?php echo $dato_c[0]['nombre'].' '.$dato_c[0]['apellido'];?></li>
                                    <li class="list-group-item">Telefono: <?php echo $dato_c[0]['telefono'];?></li>
                                    <li class="list-group-item">Email:  <?php echo $dato_c[0]['correo'];?> </li>
                                    <li class="list-group-item">Año:  <?php echo $dato_a[0]['ano'];?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-danger">Patente:  <?php echo $dato_a[0]['patente'];?></li>
                                    <li class="list-group-item">Marca:  <?php echo $dato_a[0]['marca'];?></li>
                                    <li class="list-group-item">Modelo:  <?php echo $dato_a[0]['modelo'];?></li>
                                    <li class="list-group-item">Cilindrada:  <?php echo $dato_a[0]['CILIN'];?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($dato_info as $key => $value):?>

            <div class="col-md-12">
                <div class="card  mb-3">
                    <div class="card-header text-white bg-dark">Informe N° <?php echo $value['id'];?></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Fecha de recepción: <?php echo $value['FECHA_RECEPCIoN'];?></li>
                                    <li class="list-group-item">Hora de recepcion: <?php echo $value['HORA_RECEPCIoN'];?></li>
                                    <li class="list-group-item">Kilometraje: <?php echo $value['KILOMETRAJE'];?></li>
                                    <li class="list-group-item">Proxima mantencion: <?php echo $value['PRoXIMA_MANTENCIoN'];?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Fecha de entrega: <?php echo $value['FECHA_ENTREGA'];?></li>
                                    <li class="list-group-item">Hora de entrega: <?php echo $value['HORA_ENTREGA'];?></li>
                                    <li class="list-group-item">Diagnóstico: <?php echo $value['DIAGNoSTICO'];?></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <h5 class="card-header text-white bg-secondary">Detalle</h5>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                        <?php $detalle = $value['DETALLE'];
                                        $rest = substr($detalle, 2);
                                        $porciones = multiexplode(array("1)","2)","3)","4)","5)","6)","7)","8)","9)","10)","11)","12)","13)","14)","15)"),$rest);
                                        for ($i=0; $i < count($porciones);$i++){
                                            $no = $i +1;
                                            echo "<li class=\"list-group-item\">".$no.') '.$porciones[$i]."</li>";

                                        }

                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <h5 class="card-header text-white bg-secondary">Notas</h5>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $value['NOTA'];?></p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
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