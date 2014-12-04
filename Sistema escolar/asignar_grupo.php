<?php
require('Bd.php');
require('header.php');
require('asignar_grupo2.php');

$alumno=new asignar_grupo2();

if(isset($_REQUEST['submit']))
{
    switch($_REQUEST['submit'])
    {
        case "Asignar":
            echo"<div class='alert alert-danger' role=alert>";
            echo"<br> Bot&oacute;n:".$_REQUEST['submit'];
            echo"</div>";
            $alum=$_REQUEST['alumno'];
            $grupo=$_REQUEST['grupo'];
            $alumno->asignar_alumno_grupo($alum,$grupo);
            break;

        case "Quitar de grupo":
            echo"<div class='alert alert-danger' role=alert>";
            echo"<br> Bot&oacute;n:".$_POST['submit'];
            $alum=$_REQUEST['alumno'];
            $alumno->desasignar("$_POST[alumno]");
            echo"</div>";
            break;

    }
}

$sql="select * from usuarios where nivel = 'Alumno'";
$con=mysql_query($sql) or die ("error de $sql");
$num=mysql_num_rows($con);
echo"<h1 align='center'>Alumnos para asignar</h1>";
echo"<div class=table-responsive>";
    echo"<form action='asignar_grupo.php' method='post'>";
echo"<table align='center' width='35%' class=table table-striped>";
echo"<tr>";

while($field = mysql_fetch_array($con)){
    $clave = $field['id_usuario'];
    $nombre=$field['nombre'];
    $ap_pat=$field['ap_pat'];
    $ap_mat=$field['ap_mat'];


    $sql3="select * from alumnos_asignados where id_usuario = $clave";
    $con3=mysql_query($sql3) or die ("error 3 $sql3");
    $num3=mysql_num_rows($con3);

    $sql4="select * from grupo";
    $con4=mysql_query($sql4) or die ("error de 4 $sql4");
    $esult07 = mysql_fetch_array($con4);
    $grupo = $esult07['grupo'];


    if ($num3 != 0){


        echo"<td><input type='checkbox' name='alumno' value='$clave'> $nombre $ap_pat $ap_mat</td><td>$grupo
        <input type='submit' name='submit' value='Quitar de grupo'>
        </td></tr>";
    }
    else{
    echo"<td><input type='checkbox' name='alumno[]' value='$clave'> $nombre $ap_pat $ap_mat </td><td><b>No esta asignado</b></td></tr>";

    }
}

$sql2="select * from grupo";
$con2=mysql_query($sql2) or die ("error de $sql2");
$num2=mysql_num_rows($con2);

echo"<tr><td>Grupos: </td><td><select name='grupo'>";

for($z=0;$z<$num2;$z++){

    $grupo=mysql_result($con2, $z, 'grupo');
    echo"<option> $grupo</option>";
}
echo"</td></tr>";
echo"<tr><td colspan='2' align='center'><input type='submit' name='submit' value='Asignar'></td></tr>";
echo"</table></form></div>";
?>


