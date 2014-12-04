<?php
require("./template/header.php");
$titulo="Our services";
$contenido="<h1 align='center'>Epic feil</h1>";

$variables=array('titulo'=>$titulo, 'contenido'=>$contenido);
view('home', $variables);