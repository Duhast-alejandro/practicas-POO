<?php
require("helpers.php");
require("template/header.php");
require("class/Usuario.php");
require("base/conecta.php");

if(empty($_GET['url'])){
    $_GET['url']='home';
    controller($_GET['url']);
}else{
    controller($_GET['url']);
}
