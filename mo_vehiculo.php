<?php
include "nav.php";
require_once "bd/out.php";
require_once "bd/update.php";


if(isset($_GET['p'])){
    $patente=$_GET['p'];

    if(strlen($patente )>6){
        header("Location:inicio.php");
    }
    $out = new select();
    $dato = $out->datos_auto($patente);
    if ($out->datos_auto($patente)== 0){
        header("Location:modifica.php?e=2");

    }

}else{
    header("Location:modifica.php");
}

if(isset($_REQUEST['patente'])) {

        $patente = $_REQUEST['patente'];

    if ($dato[0]['patente']  == $out->compru_auto($dato[0]['patente'] )[0][0]) {

        $correo = strtolower($_REQUEST['correo']);
        if ($correo==$out->compru_clinete($correo)[0][0]) {
            $marca = strtolower($_REQUEST['marca']);
            $modelo = strtolower($_REQUEST['modelo']);
            $cili = strtolower($_REQUEST['cili']);
            $ano = strtolower($_REQUEST['ano']);

            $modi = new update();

            if ($dato[0]['patente'] == $patente) {

            $modi->mo_auto($patente, $correo, $marca, $modelo, $cili, $ano);
            header("Location:modifica.php?e=3");
            }else{

                $modi->new_patente_info($patente,$dato[0]['patente']);
                $modi->mo_auto_new($patente, $correo, $marca, $modelo, $cili, $ano,$dato[0]['patente']);
                header("Location:modifica.php?e=3");

            }
        }else{
            header("Location:modifica.php?e=4");
        }
    }else{

        header("Location:modifica.php?e=2");
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
    <title></title>
</head>
<body>
<?php echo $menu; ?>
<div class="container fondo">
    <h1 class="text-center text-dark">Modificar  datos de vehiculo</h1>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <label >Patente: </label>
                <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6" value="<?php echo $dato[0]['patente'];?>" >

                <label >Marca: </label>
                <input type="text" name="marca" required  class="form-control" minlength="1" value="<?php echo $dato[0]['marca'];?>" >

                <label >Modelo: </label>
                <input type="text" name="modelo" required  class="form-control" minlength="1" value="<?php echo $dato[0]['modelo'];?>"  >

                <label >Cilindrada: </label>
                <input type="text" name="cili" required  class="form-control" minlength="1" value="<?php echo $dato[0]['CILIN'];?>" >

                <label >Año: </label>
                <input type="text" name="ano" required  class="form-control" minlength="4"  maxlength="4"  value="<?php echo $dato[0]['ano'];?>">

                <label >Email de Dueño de vehiculo:</label>
                <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value="<?php echo $dato[0]['correo'];?>">
            </div>
            <div class="col-md-6">

            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-4"></div><div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar</button>
            </div><div class="col-md-4"></div>
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