<?php

$menu = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Sistema taller</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="inicio.php">Inicio</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ingresar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="in_informe.php">Ingresar Informe </a>
                    <a class="dropdown-item" href="in_vehiculo.php">Ingresar datos de vehiculo</a>
                    <a class="dropdown-item" href="in_cliente.php">Ingresar datos de cliente</a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link active" href="modifica.php">Modificar</a>
            </li>
           
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Buscar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="list_vehiculo.php">Ver lista de vehiculos</a>
                    <a class="dropdown-item" href="list_cliente.php">Ver lista de clientes</a>
                    <a class="dropdown-item" href="list_informe.php">Ver Informe</a>
                </div>
            </li>
        </ul>
    </div>
</nav>';

$footer = "<div class=\"footer\">
        <h5 class='text-center text-white p-4'>sistema de taller version 0.2.3</h5>
</div>";
 ?>