<?php
header("Content-Type: text/html;charset=utf-8");
class insertar{

    function informe($folio,$patente,$email,$FECHA_RECEPCIoN,$HORA_RECEPCIoN,$KILOMETRAJE,$PRoXIMA_MANTENCIoN,$FECHA_ENTREGA,$HORA_ENTREGA,$DIAGNoSTICO,$DETALLE,$nota){
        include "ce/cer.php";
        $sql= "INSERT INTO informe(patente, email, FECHA_RECEPCIoN, HORA_RECEPCIoN, KILOMETRAJE, PRoXIMA_MANTENCIoN,  FECHA_ENTREGA, HORA_ENTREGA, DIAGNoSTICO, DETALLE, NOTA, id ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$patente);
        $smt->bindparam(2,$email);
        $smt->bindparam(3,$FECHA_RECEPCIoN);
        $smt->bindparam(4,$HORA_RECEPCIoN);
        $smt->bindparam(5,$KILOMETRAJE);
        $smt->bindparam(6,$PRoXIMA_MANTENCIoN);
        $smt->bindparam(7,$FECHA_ENTREGA);
        $smt->bindparam(8,$HORA_ENTREGA);
        $smt->bindparam(9,$DIAGNoSTICO);
        $smt->bindparam(10,$DETALLE);
        $smt->bindparam(11,$nota);
        $smt->bindparam(12,$folio);
        $smt->execute();
        $conn=null;


    }


    function in_clinete($nombre,$apellido,$tele,$correo ){
        include "ce/cer.php";

        $sql ="INSERT INTO cliente(nombre, apellido, telefono, correo) VALUES (?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$nombre);
        $smt->bindparam(2,$apellido);
        $smt->bindparam(3,$tele);
        $smt->bindparam(4,$correo);
        $smt->execute();
        $conn=null;

    }

    function in_auto($patente,$marca,$modelo,$cili,$ano,$correo){
        include "ce/cer.php";

        $sql ="INSERT INTO dato_auto(patente, marca, modelo, CILIN, ano, correo) VALUES (?,?,?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$patente);
        $smt->bindparam(2,$marca);
        $smt->bindparam(3,$modelo);
        $smt->bindparam(4,$cili);
        $smt->bindparam(5,$ano);
        $smt->bindparam(6,$correo);
        $smt->execute();
        $conn=null;

    }


}