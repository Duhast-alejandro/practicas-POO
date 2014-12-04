<?php
$usuario = new Usuario();
?>
<html>
<head>
</head>
<body>
<h1 align=center>
    <?php
    echo"$titulo";
    ?></h1>

<p align=center>
    <?php
    echo"$contenido";
    ?></p>

<p align=center>
    <?php
    echo"$nombre";
    ?></p>
<?php
$usuario ->setUsuario();
$usuario ->getUsuario();
$usuario ->consultausers();

?>
</body>
</html>