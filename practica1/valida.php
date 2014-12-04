<?php
$pass=$_REQUEST['pass'];
$idmaestro=$_REQUEST['usuario'];

require("base/BD.php");
$sql="select * from usuarios where nombre = '$idmaestro' and pass = '$pass'";
$con=mysql_query($sql) or die ("error de $sql");
$num=mysql_num_rows($con);
if($num=0){
    echo"insertar los datos correctos";
}
else{
$idu=mysql_result($con,0,'id_usuario');
    print"<meta http-equiv='refresh' content='0; url=acceso.php?usuario=$idu'>";
}