<?php
$idu=$_COOKIE['idu'];
$accesos=$_COOKIE['acceso'];
if($idu=="" or $accesos=="")
{
    print "<meta http-equiv='refresh' content='0; url=login.php?msg='>";
    exit;
}
@session_start();
$idu2=$_SESSION['idu'];
$acceso2=$_SESSION['acceso'];
if ($idu2=="" or $acceso2=="")
{
    print "<meta http-equiv='refresh' content='0; url=login.php?msg='>";
    exit;
}

require ("base/Bd.php");
require("class/inicio.php");
require ("header.php");
require ("helpers.php");

if(empty($_GET['url'])){
    $_GET['url']='inicio';
    controller($_GET['url']);
}else{
    controller($_GET['url']);
}
