<?php
$conexión=mysql_connect("localhost","root","") or die ("error de hosting");
$base= mysql_select_db ("5to") or die ("error de base");
mysql_query("SET NAMES 'UTF8'");
