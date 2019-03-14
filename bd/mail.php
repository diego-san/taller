<?php
class mail {

    function regis($correo,$nombre, $apellido,$pass){
        $asunto = "Este mensaje es de prueba";
        $cuerpo = ' 
<html> 
<head> 
   <title>registro</title> 
</head> 
<body> 
<h1>Hola '.$nombre.' '.$apellido.'</h1> 
<p>Correo:'.$correo.' </p> 
<p>Cotraseña:'.$pass.' </p> 
<p>Recuerda cambiar tu contraseña</p> 
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