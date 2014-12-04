<?php
require("./template/header.php");
$titulo="<h1 align=center>Nosostros somos....</h1>";
$contenido="<p align=center>mmmmmmmmmm</p>";

$variables=array('titulo'=> $titulo, 'contenido'=>$contenido);
view('about', $variables);
?>
