<?php
require("Bd.php");
require("Materia.php");
$id_materia=$_REQUEST['materia'];
$id_usuario=$_REQUEST['id_maestro'];

$agregar = new Materia();
$agregar->AgregarMateria($id_materia, $id_usuario );
?>