<?php

class update{

    function mo_informe($folio, $patente, $email, $FECHA_RECEPCIoN, $HORA_RECEPCIoN, $KILOMETRAJE, $PRoXIMA_MANTENCIoN,  $FECHA_ENTREGA, $HORA_ENTREGA, $DIAGNoSTICO, $DETALLE, $nota){
        include "ce/cer.php";

        $sql ="UPDATE informe SET patente = :pa, email = :ema, FECHA_RECEPCIoN = :f_r, HORA_RECEPCIoN = :h_r, KILOMETRAJE = :ki, PRoXIMA_MANTENCIoN = :pr_m, FECHA_ENTREGA = :f_e, HORA_ENTREGA = :h_e, DIAGNoSTICO = :dia, DETALLE = :det, NOTA = :nota, id = :folio   WHERE id = :folio";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":pa", $patente);
        $smt->bindValue(":ema", $email);
        $smt->bindValue(":f_r", $FECHA_RECEPCIoN);
        $smt->bindValue(":h_r", $HORA_RECEPCIoN);
        $smt->bindValue(":ki", $KILOMETRAJE);
        $smt->bindValue(":pr_m", $PRoXIMA_MANTENCIoN);
        $smt->bindValue(":f_e", $FECHA_ENTREGA);
        $smt->bindValue(":h_e", $HORA_ENTREGA);
        $smt->bindValue(":dia", $DIAGNoSTICO);
        $smt->bindValue(":det", $DETALLE);
        $smt->bindValue(":nota", $nota);
        $smt->bindValue(":folio", $folio);
        $smt->execute();
        $conn=null;



    }

    function mo_auto($patente,$correo,$marca,$modelo,$cili,$ano){
        include "ce/cer.php";
        $sql ="UPDATE dato_auto set patente = :pa, marca = :marca, modelo = :mode, CILIN = :cli, ano = :ano, correo = :correo WHERE patente = :pa";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":pa", $patente);
        $smt->bindValue(":marca", $marca);
        $smt->bindValue(":mode", $modelo);
        $smt->bindValue(":cli", $cili);
        $smt->bindValue(":correo", $correo);
        $smt->bindValue(":ano", $ano);
        $smt->execute();
        $conn=null;

    }

    function mo_cliente($nombre,$apellido,$tele,$correo){
        include "ce/cer.php";

        $sql ="UPDATE cliente set nombre = :nom , apellido = :ap , telefono = :tele , correo = :cor   WHERE  correo = :cor";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":nom", $nombre);
        $smt->bindValue(":ap", $apellido);
        $smt->bindValue(":tele", $tele);
        $smt->bindValue(":cor", $correo);
        $smt->execute();
        $conn=null;
    }

    function mo_cliente_correo($nombre,$apellido,$tele,$correo,$correo_old){
        include "ce/cer.php";

        $sql ="UPDATE cliente set nombre = :nom , apellido = :ap , telefono = :tele , correo = :cor   WHERE  correo = :cor_old";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":nom", $nombre);
        $smt->bindValue(":ap", $apellido);
        $smt->bindValue(":tele", $tele);
        $smt->bindValue(":cor", $correo);
        $smt->bindValue(":cor_old", $correo_old);
        $smt->execute();
        $conn=null;
    }


    function new_correo_auto($correo,$correo_old){

        include "ce/cer.php";

        $sql ="UPDATE dato_auto set correo = :corr WHERE  correo = :old";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":corr", $correo);
        $smt->bindValue(":old", $correo_old);
        $smt->execute();
        $conn=null;

    }

    function new_correo_info($correo,$correo_old){
        include "ce/cer.php";
        $sql ="UPDATE informe set email = :corr WHERE  email = :old";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":corr", $correo);
        $smt->bindValue(":old", $correo_old);
        $smt->execute();
        $conn=null;

    }

    function new_patente_info($patente,$patente_old){
        include "ce/cer.php";
        $sql ="UPDATE informe set patente = :pa WHERE  patente = :old";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":pa", $patente);
        $smt->bindValue(":old", $patente_old);
        $smt->execute();
        $conn=null;

    }

    function mo_auto_new($patente,$correo,$marca,$modelo,$cili,$ano,$patente_old){
        include "ce/cer.php";
        $sql ="UPDATE dato_auto set patente = :pa, marca = :marca, modelo = :mode, CILIN = :cli, ano = :ano, correo = :correo WHERE patente = :old";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":pa", $patente);
        $smt->bindValue(":marca", $marca);
        $smt->bindValue(":mode", $modelo);
        $smt->bindValue(":cli", $cili);
        $smt->bindValue(":correo", $correo);
        $smt->bindValue(":ano", $ano);
        $smt->bindValue(":old", $patente_old);
        $smt->execute();
        $conn=null;

    }

    function cambiar_pass($user,$pass){
        include "ce/cer.php";
        $esperado   =  password_hash($pass, PASSWORD_BCRYPT, array("cost" => 10));
        $sql ="UPDATE user set password = :pass WHERE  correo = :correo";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":pass", $esperado);
        $smt->bindValue(":correo", $user);
        $smt->execute();
        $conn=null;
    }



}




?>