<?php
class mail {

    function regis($correo,$nombre, $apellido){
        $asunto = "Este mensaje es de prueba";
        $cuerpo = ' 
<html> 
<head> 
   <title>registro</title> 
</head> 
<body> 
<h1>Hola '.$nombre.' '.$apellido.'</h1> 
<p> 
<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
</p> 
</body> 
</html> 
';

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: Sistema taller Registro <info@homeservicevregion.cl>\r\n";
        mail($correo,$asunto,$cuerpo,$headers);
    }
}
?>