<?php

$dato= '1) hola 2) mundo 3)nada';

$e =   substr_count($dato, ')');
$conttador = strlen($dato);



for ($i = 0; $i < $e; $i ++ ) {

    if ($i == 0) {
        $position = strpos($dato, ')');
        $rest = substr($dato ,$position+1);

    }

    $position = strpos($rest, ')');
    echo substr($rest ,0,$position-1).'</br>';
    $rest =substr($rest ,$position);







}