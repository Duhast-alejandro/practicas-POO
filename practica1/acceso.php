<?php
$idu=$_REQUEST['usuario'];
setCOOKIE('idu',$idu);
setCOOKIE('acceso',1);
session_start();
$_SESSION['idu']=$idu;
$_SESSION['acceso']=1;

require("base/BD.php");
$sql="select * from usuarios where id_usuario=$idu";
$con=mysql_query($sql) or die ("error de $sql");
$u=mysql_result($con, 0, 'id_usuario');

if ($idu=$u)
{
    print"<meta http-equiv='refresh' content='0; url=inicio.php?idu=$idu'>";////**refresca la pagina y manda llamar al inicio.php
    exit;
}
else {
    print"<meta http-equiv='refresh' content='0; url=login.php'>";////**refresca la pagina y deja entrar al admyn,php
    exit;
}