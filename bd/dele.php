<?php
class delete{

    function eliminar_user($correo){
        require "ce/cer.php";
        $sql ="DELETE FROM user WHERE correo =:co ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':co',$correo);
        $smt->execute();
        $conn=null;
    }

    function eliminar_informe($folio){
        require "ce/cer.php";
        $sql ="DELETE FROM informe WHERE id =:co ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':co',$folio);
        $smt->execute();
        $conn=null;

    }

    function eliminar_vehivulo($patente){
        require "ce/cer.php";
        $sql ="DELETE FROM informe WHERE patente =:i ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':i',$patente);
        $smt->execute();
        $sql ="DELETE FROM dato_auto WHERE patente =:co ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':co',$patente);
        $smt->execute();
        $conn=null;



    }

    function eliminar_cliente($correo){
        require "ce/cer.php";
        $sql ="DELETE FROM informe WHERE email = :i  ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':i',$correo);
        $smt->execute();
        $sql ="DELETE FROM dato_auto WHERE correo = :co ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':co',$correo);
        $smt->execute();
        $sql ="DELETE FROM cliente WHERE correo = :cl ";
        $smt=$conn->prepare($sql);
        $smt->bindParam(':cl',$correo);
        $smt->execute();

        $conn=null;

    }


}


?>