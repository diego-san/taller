<?php
include "nav.php";
require_once "bd/out.php";
require_once "bd/update.php";


$error = 0;
header("Content-Type: text/html;charset=utf-8");
if(isset($_GET['f'])){
    $folio=$_GET['f'];
    if(strlen($folio) >= 10){
    header("Location:modifica.php?e=1");
    }
    $out = new select();
    $datos = $out->datos_informe($folio);
    if (isset($_GET['e'])){
        $error = $_GET['e'];

    }
}else{
    header("Location:modifica.php");
}





$error = 0;
if (isset($_REQUEST['patente'])) {
    $folio = trim(mb_strtoupper($_REQUEST['id']));
    if ($folio == $out->compru_informe($folio)[0][0]) {
        $patente = trim(mb_strtoupper($_REQUEST['patente']));

        if ($patente == $out->compru_auto($patente)[0][0]) {


        $email = trim(mb_strtolower($_REQUEST['correo'], 'UTF-8'));
        $FECHA_RECEPCIoN = $_REQUEST['FECHA_RECEPCIoN'];
        $HORA_RECEPCIoN = $_REQUEST['HORA_RECEPCIoN'];
        $KILOMETRAJE = $_REQUEST['KILOMETRAJE'];
        $PRoXIMA_MANTENCIoN = $_REQUEST['PRoXIMA_MANTENCIoN'];
        $FECHA_ENTREGA = $_REQUEST['FECHA_ENTREGA'];
        $HORA_ENTREGA = $_REQUEST['HORA_ENTREGA'];
        $DIAGNoSTICO = trim($_REQUEST['DIAGNoSTICO'], 'UTF-8');
        $DETALLE = trim($_REQUEST['DETALLE'], 'UTF-8');
        $nota = trim($_REQUEST['nota'], 'UTF-8');

        $up = new update();
        $up->mo_informe($folio, $patente, $email, $FECHA_RECEPCIoN, $HORA_RECEPCIoN, $KILOMETRAJE, $PRoXIMA_MANTENCIoN, $FECHA_ENTREGA, $HORA_ENTREGA, $DIAGNoSTICO, $DETALLE, $nota);
            header("Location:modifica.php?e=3");
    }else{
            header("Location:modifica.php?e=2");

        }

    } else {

        header("Location:modifica.php?e=1");


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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--boo-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title></title>
</head>
<body>
<?php echo$menu; ?>

<div class="container-fluid fondo">

    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center bg-dark text-white mb-3 card-header ">Modificar Informe de vehiculo </h1>
        </div>
    </div>
    <?php if($error == 9) : ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-warning" role="alert">
                    Verifica los datos
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    <?php endif; ?>

    <form  id="usrform" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label >Folio: </label>
                    <input type="text" name="id" required  class="form-control" minlength="8"  value="<?php echo $datos[0]['id'];?>">
                    <label >Patente: </label>
                    <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6" value="<?php echo $datos[0]['patente'];?>">
                    <label >Email:</label>
                    <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $datos[0]['email'];?>">

                    <label  class=" control-label">Fecha de recepcion:</label>
                    <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text"  readonly name="FECHA_RECEPCIoN" required value="<?php echo $datos[0]['FECHA_RECEPCIoN'];?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>



                    <label >Hora de recepcion: </label>
                    <input type="time" name="HORA_RECEPCIoN" required  class="form-control"  value="<?php echo $datos[0]['HORA_RECEPCIoN'];?>" >
                    <label >Kilometraje: </label>
                    <input type="number" name="KILOMETRAJE" required  class="form-control"  pattern="[0-9]"{20000000000}  value="<?php echo $datos[0]['KILOMETRAJE'];?>">

                </div>
            </div>
            <div class="col-md-6">

                <label >Proxima mantencion: </label>
                <input type="number" name="PRoXIMA_MANTENCIoN"  class="form-control"  pattern="[0-9]{2000000000}"  value="<?php echo $datos[0]['PRoXIMA_MANTENCIoN'];?>" >



                <label  class=" control-label">Fecha de entrega:</label>
                <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" readonly required name="FECHA_ENTREGA" value="<?php echo $datos[0]['FECHA_ENTREGA'];?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>

                <label >Hora de entrega: </label>
                <input type="time" name="HORA_ENTREGA" required  class="form-control" value="<?php echo $datos[0]['HORA_ENTREGA'];?>" >

                <label >Diagnostico: </label>
                <input type="text" name="DIAGNoSTICO" required  class="form-control" value="<?php echo $datos[0]['DIAGNoSTICO'];?>"  >

                <label >Detalle: </label>
                <textarea name="DETALLE" id="usrform" cols="30" rows="10" class="form-control" required ><?php echo $datos[0]['DETALLE'];?></textarea>

                <label >Notas : </label>
                <textarea name="nota" id="usrform" cols="30" rows="10" class="form-control"  ><?php echo $datos[0]['NOTA'];?></textarea>

            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-4"></div><div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                    Modificar
                </button>
            </div><div class="col-md-4"></div>
            <div class="col-md-12 mb-4"></div>
        </div>

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