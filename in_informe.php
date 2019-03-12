<?php
include  "nav.php";
include  "bd/in.php";
include  "bd/out.php";

$error = 0;

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

if (isset($_REQUEST['id'])) {
    $patente = trim(mb_strtolower($_REQUEST['patente']));
    $out = new select();

    if($patente == $out->compru_auto($patente)[0][0]){



    $folio = $_REQUEST['id'];
    $idv = $out->compru_informe($folio);


    if ($folio != $idv[0]['id']) {


        $email = trim(mb_strtolower($_REQUEST['correo'],'UTF-8'));
        $FECHA_RECEPCIoN = $_REQUEST['FECHA_RECEPCIoN'];
        $HORA_RECEPCIoN = $_REQUEST['HORA_RECEPCIoN'];
        $KILOMETRAJE = $_REQUEST['KILOMETRAJE'];
        $PRoXIMA_MANTENCIoN = $_REQUEST['PRoXIMA_MANTENCIoN'];
        $FECHA_ENTREGA = $_REQUEST['FECHA_ENTREGA'];
        $HORA_ENTREGA = $_REQUEST['HORA_ENTREGA'];
        $DIAGNoSTICO = trim(mb_strtolower($_REQUEST['DIAGNoSTICO'],'UTF-8'));
        $DETALLE = trim(mb_strtolower($_REQUEST['DETALLE'],'UTF-8'));
        $nota = trim(mb_strtolower($_REQUEST['nota'],'UTF-8'));

        $in = new insertar();
        $in->informe($folio, $patente, $email, $FECHA_RECEPCIoN, $HORA_RECEPCIoN, $KILOMETRAJE, $PRoXIMA_MANTENCIoN,  $FECHA_ENTREGA, $HORA_ENTREGA, $DIAGNoSTICO, $DETALLE, $nota);
        $idv_in = $out->compru_informe($folio);

        if ($folio==$idv_in[0][0]){
            $error = 4;
        }else{
            $error = 5;
        }


    }else{
        $error = 1;
    }
}else{
        $error = 7;
    }}

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

    <title>Document</title>
</head>
<body>
    <?php  echo $menu;?>
    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center bg-dark text-white mb-3 card-header ">Ingreso de Informe de vehiculo</h1>
            </div>
        </div>

        <?php if($error == 1) : ?>
           <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   <div class="alert alert-danger" role="alert">
                       Infomer ya esta ingresado
                   </div>
               </div>
               <div class="col-md-3"></div>
           </div>
        <?php endif; ?>

        <?php if($error == 4) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Informe ingresado corectamente
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>

        <?php if($error == 5) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Error al ingresar informe
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>

        <?php if($error == 7) : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Debe ingresar "Vehiculo" antes de ingresar informe
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php endif; ?>


           <form action="" id="usrform" >
               <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <label >Folio: </label>
                       <input type="text" name="id" required  class="form-control" minlength="8"  >
                       <label >Patente: </label>
                       <input type="text" name="patente" required  class="form-control" minlength="6" maxlength="6" >
                       <label >Email:</label>
                       <input type="email" class="form-control" required  name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

                       <label  class=" control-label">Fecha de recepcion:</label>
                       <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                           <input class="form-control" size="16" type="text" value="" readonly name="FECHA_RECEPCIoN" required>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                       </div>



                       <label >Hora de recepcion: </label>
                       <input type="time" name="HORA_RECEPCIoN" required  class="form-control"  >
                       <label >Kilometraje: </label>
                       <input type="number" name="KILOMETRAJE" required  class="form-control"  pattern="[0-9]"{2000000000} >



                   </div>
               </div>
               <div class="col-md-6">

                   <label >Proxima mantencion: </label>
                   <input type="number" name="PRoXIMA_MANTENCIoN" required  class="form-control"  pattern="[0-9]"{2000000000} >



                   <label  class=" control-label">Fecha de entrega:</label>
                   <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                       <input class="form-control" size="16" type="text" value="" readonly required name="FECHA_ENTREGA">
                       <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                       <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                   </div>

                   <label >Hora de entrega: </label>
                   <input type="time" name="HORA_ENTREGA" required  class="form-control"  >

                   <label >Diagnostico: </label>
                   <input type="text" name="DIAGNoSTICO" required  class="form-control"  >

                   <label >Detalle: </label>
                   <textarea name="DETALLE" id="usrform" cols="30" rows="10" class="form-control" required></textarea>

                   <label >Notas : </label>
                   <textarea name="nota" id="usrform" cols="30" rows="10" class="form-control" ></textarea>

               </div>
               </div>

              <div class="row" style="margin-top: 20px;">
                  <div class="col-md-4"></div><div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                  </div><div class="col-md-4"></div>
                  <div class="col-md-12 mb-4"></div>
              </div>
           </form>

    </div>


       <?php echo $footer;?>






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