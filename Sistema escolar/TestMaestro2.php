<?php

require ('Bd.php');
require('header.php');
require ('Maestro.php');

    $maestro = new Maestro();

    $maestro->readUsuarioG();

?>