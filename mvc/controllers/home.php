<?php
require("./template/header.php");
$titulo="Welcome home";
$contenido="Hi!!!";


$variables=array('titulo'=>$titulo, 'contenido'=>$contenido);
view('home', $variables);