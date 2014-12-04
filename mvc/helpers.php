<?php

function controller($nombre){

    if(empty($nombre)){
        $nombre='home';
    }
    $archivo="controllers/$nombre.php";
    if(file_exists($archivo)){
        require("$archivo");
    }
    else{

        echo"La ruta del archivo es incorrecta $archivo";
    }
}

function view($plantilla, $variables=array()){

    extract($variables);
    require('views/'.$plantilla.'.tpl.php');

}
