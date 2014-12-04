<?php
$pass=$_REQUEST['pass'];
$idmaestro=$_REQUEST['usuario'];

require("Bd.php");
$sql="select * from usuarios where usuario = '$idmaestro' and pass = '$pass'";
$con=mysql_query($sql) or die ("error de $sql");
$nivel=mysql_result($con, 0, 'nivel');

if ($nivel=='Administrador'){

    print"<meta http-equiv='refresh' content='0; url=inicio.php?'>";

}
if($nivel=='Maestro'){
    echo"
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content=IE=edge>
    <meta name=viewport content=width=device-width, initial-scale=1>
    <meta name=description content=''>
    <meta name=author content=''>

    <title>Escuela</title>

    <!-- Bootstrap core CSS -->
    <link href=dist/css/bootstrap.min.css rel=stylesheet>
    <!-- Bootstrap theme -->
    <link href=dist/css/bootstrap-theme.min.css rel=stylesheet>

    <!-- Custom styles for this template -->
    <link href=dist/css/theme.css rel=stylesheet>

    ";
    require("Bd.php");

    $sql="select * from usuarios where usuario = '$idmaestro' and pass = '$pass'";
    $con=mysql_query($sql) or die ("error $sql");
    $id=mysql_result($con, 0, 'id_usuario');
    $nombre=mysql_result($con, 0, 'nombre');
    $ap_pat=mysql_result($con, 0, 'ap_pat');
    $ap_mat=mysql_result($con, 0, 'ap_mat');

include("menu_maestro.php");
    echo"<table align='center'><tr><td><h2><b>Informacion del maestro(a): </h2></b></h2></td><td> <h3>$nombre $ap_pat $ap_mat</h3></td></tr>";
    $sql="SELECT * FROM maestro_materia WHERE id_usuario = id";
    $con=mysql_query($sql) or die ('error de información de maestro');
    $num=mysql_num_rows($con);
    for($y=0;$y<$num; $y++){

        $sql="SELECT * FROM maestro_materia WHERE id_usuario = id";
        $con=mysql_query($sql) or die ('error de información de maestro_materia');
        $num=mysql_num_rows($con);
        $id=mysql_result($con, $y, 'id_usuario');

    }
    echo"</table>";

    $sqlq="SELECT * FROM usuarios WHERE concat(nombre, ' ', ap_pat, ' ', ap_mat) = '$idmaestro'
        or usuario='$idmaestro'";
    $conq=mysql_query($sqlq) or die ('error de información de maestro2');
    $folio=mysql_result($conq, 0, 'id_usuario');

    $sql1="select * from maestro_materia where id_usuario = $folio";
    $con1=mysql_query($sql1) or die ('error de asignar materias');
    $num=mysql_num_rows($con1);
    if($num==0){
        echo"<h1 align=center>El profesor no tiene ninguna materia asignada</h1>";
    }else{
        for($y=0;$y<$num;$y++){
            echo "<div class='table-responsive'>";
            echo"<table align='center' border='1' width='30%'>";
            echo"<tr><td colspan='2' align='center'><b>Materias impartidas:</b></td></tr>";

            $foliomateria=mysql_result($con1,$y, 'id_materia');

            $sql2="select * from materia where id_materia = $foliomateria";
            $con2=mysql_query($sql2) or die ('error de mostrar materias');
            $num2=mysql_num_rows($con2);

            for($z=0;$z<$num2;$z++){

                $nombremateria=mysql_result($con2, $z, 'materia');
                echo"<tr><td align='center'>$nombremateria </td></tr>";

            }
        }
    }


    echo"</table></div>";
}
?>