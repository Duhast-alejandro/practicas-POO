<?php
require('Bd.php');
require('Materia.php');
require('header.php');

$id_u=$_REQUEST['id_usuario'];
$id_m=$_REQUEST['id_materia'];

$eliminar = new Materia();
$eliminar->Eliminar_materia($id_u, $id_m );