<html>
<body>
<?php
$pregunta=new pregunta();

$arreglo=array();
if(isset($_POST['a']))
{
    array_push($arreglo, $_POST['a']);

switch($_POST['a'])
{
case "a":
echo"<div class='alert alert-danger' role=alert>";
    echo"<br> Bot&oacute;n:".$_POST['a'];
    echo"</div>";
    $pregunta->guardar("$_POST[a]");

break;
}
}
?>

<p align=center>
    <?php
    echo"$contenido";
    ?></p>

</body>
</html>