<?php
require("./template/header.php");
$titulo="<h1 align=center>Contáctanos</h1>";
$contenido="<p align=center>Esta pagina esta en mantenimiento</p>";

$variables=array('titulo'=> $titulo, 'contenido'=>$contenido);
view('contactanos', $variables);
?>
