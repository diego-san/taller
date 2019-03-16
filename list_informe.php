<?php
include "nav.php";
require_once "bd/out.php";

$error = 0;

if (isset($_GET['e'])){
    $error = $_GET['e'];

}

$valida= [];
if (isset($_REQUEST['buscar'])){

    $out = new select();

    $buscar = trim(mb_strtolower($_REQUEST['buscar']));

    if (strlen($buscar)==6){
        $pa = mb_strtoupper($buscar);
        $valida = $out->compru_informe_patente($pa);

        if ($valida != 0){
            $link = "historial.php?p=".$pa;
            echo "<script> location.href='".$link."';</script>";
            die();
        }else{
            $error = 1;
        }

    }elseif (strlen($buscar) >= 7 and strlen($buscar) <= 10){

        $valida = $out->compru_informe($buscar);

        if ($valida == 0){
            $error = 2;
        }else{
            $link = "historial.php?p=".$valida[0]['patente'];
            echo "<script> location.href='".$link."';</script>";
            die();
        }




    }elseif (filter_var($buscar, FILTER_VALIDATE_EMAIL)){

        $valida = $out->busca_auto_correo($buscar);
        echo 'antes co';
        if ($valida == 0){
            $error = 3;

        }


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
    <title>sistema taller</title>
</head>
<body>
<?php echo $menu; ?>

    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4">
                <h1 class="text-center bg-dark text-white mb-3 card-header">Buscar Informe</h1>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
          <div class="col-md-6">
              <?php if($error == 3) : ?>
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                          <div class="alert alert-danger" role="alert">
                              Vehiculo No registrado con email
                          </div>
                      </div>
                      <div class="col-md-3"></div>
                  </div>
              <?php endif; ?>

              <?php if($error == 1) : ?>
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                          <div class="alert alert-danger" role="alert">
                              Patente No registra Informe
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
                              Informe No registrado
                          </div>
                      </div>
                      <div class="col-md-3"></div>
                  </div>
              <?php endif; ?>




              <form action="">
                  <div class="form-group">
                      <label >Buscar por Email, Patente o folio:</label>
                      <input  type="text" class="form-control" required  name="buscar" minlength="6">
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>
              </form>
          </div>
            <div class="col-md-3"></div>
            <?php if ($error == 0):?>
                <div class="col-md-12 p-2">
            <?php if (!empty($valida)):?>

                <h3 class="text-center bg-info text-white mb-3 card-header mt-4">Lista de vehiculos</h3>
                <?php endif;?>
            <?php foreach ($valida as $key => $value):?>
                <div class="card text-center">
                    <h5 class="card-header bg-secondary text-white ">
                        <?php echo $value['marca'];?>
                    </h5>
                    <div class="card-body">
                        <p class="card-text"><?php echo 'Modelo: '.$value['modelo'].' Patente: '.$value['patente'];?></p>
                        <a href="historial.php?p=<?php echo $value['patente'];?>" class="btn btn-primary">Ver historial</a>
                    </div>
                </div>


            <?php endforeach;?>
            </div>
            <?php endif;?>
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