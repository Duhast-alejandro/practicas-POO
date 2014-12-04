<?php
require("Bd.php");

class asignar_grupo2{

    public function asignar_alumno_grupo($alumno, $grupo){

        for($i=0;$i<count($alumno);$i++){
        $sql1="select id_grupo from grupo where grupo= '$grupo'";
$con1=mysql_query($sql1) or die ("error 1");
$id_grupo=mysql_result($con1, 0, 'id_grupo');

$sql="insert into alumnos_asignados(id_usuario, id_grupo)
value ($alumno[$i], $id_grupo)";
$con=mysql_query($sql) or die ("error de asigncion de alumnos ");
    }
    }


    public function desasignar($alumno){


        $sql4="delete from alumnos_asignados where id_usuario = $alumno";
        $con4=mysql_query($sql4) or die ("error 4 $sql4");
        }




}