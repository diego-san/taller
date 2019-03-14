<?php
require_once "bd/out.php";
$error = 0;
if (isset($_REQUEST['correo']) and isset($_REQUEST['pass'])){


$correo= $_REQUEST['correo'];
$pass = $_REQUEST['pass'];

$out = new select();

$dato = $out->login($correo);

if ($dato != 0){
    if ($correo == $dato[0]['correo'] and password_verify($pass,$dato[0]['password'])){
        session_start();
        $_SESSION['user'] = $dato[0]['correo'];
        $_SESSION['tipo'] = $dato[0]['tipo'];
        echo $_SESSIONS['user'];
        header("Location:inicio.php");
    }else{
        echo "no";

    }


}else{



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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Sistema taller</title>
</head>
<body class="text-center">
<form class="form-signin">
    <img class="mb-4" src="img/logo.png" alt="" width="250" height="175">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass" >
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Recordar
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y');
                                ?></p>
</form>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>