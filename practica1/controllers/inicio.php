<?php
$pregunta=new pregunta();

$contenido = $pregunta->mostrar_preguntas();
$variables = array ('contenido'=>$contenido);

view('inicio', $variables);
?>