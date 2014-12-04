<?php
require("Bd.php");
require("Materia.php");
if (@$idmaestro=$_REQUEST['id_maestro'])
{
    $materia = new Materia();
    $materia->Combomaestro();
    $materia->DatosMaestro($idmaestro);
    $materia->AsignarMaterias($idmaestro);
    $materia->MateriasAsignadas($idmaestro);

}else{
    $materia = new Materia();
    $materia->Combomaestro();
}



