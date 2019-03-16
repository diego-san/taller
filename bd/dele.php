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


}


?>