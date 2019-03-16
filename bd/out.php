<?php

class select{

    function compru_informe ($folio){
        include "ce/cer.php";

        $sql ="select id, patente from informe WHERE id = '$folio'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }

    function datos_informe($folio){
        include "ce/cer.php";
        $sql ="select * from informe WHERE id = '$folio'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }

    function compru_clinete($correo){
        include "ce/cer.php";

        $sql ="select correo from cliente WHERE correo = '$correo'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }

    function datos_cliente($correo){
        include "ce/cer.php";

        $sql ="select * from cliente WHERE correo = '$correo'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }

    function all_dato_cliente(){
        include "ce/cer.php";

        $sql ="select * from cliente";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }
    }

    function compru_auto($patente){
        include "ce/cer.php";

        $sql ="select patente from dato_auto WHERE patente = '$patente'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }


    }


    function datos_auto($patente){
        include "ce/cer.php";

        $sql ="select * from dato_auto WHERE patente = '$patente'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }


    }

    function all_data_auto(){
        include "ce/cer.php";

        $sql ="select * from dato_auto ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }
    }


    function busca_auto_correo($correo){
        include "ce/cer.php";

        $sql ="select * from dato_auto WHERE correo = '$correo'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }
    }

    function buscar_info_patente($patente){
        include "ce/cer.php";

        $sql ="select * from informe WHERE patente = '$patente'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }

    function login($correo){
        include "ce/cer.php";

        $sql ="select * from user WHERE correo = '$correo'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }
    }


    function compr_user($correo){
        include "ce/cer.php";

        $sql ="select correo from user WHERE correo = '$correo'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }
    function compru_informe_patente($patente){
        include "ce/cer.php";

        $sql ="select patente from informe WHERE patente = '$patente'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        if (empty($resultado)){
            return 0;

        }else {
            return $resultado;
        }

    }




}




?>