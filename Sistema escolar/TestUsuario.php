<?php

    require ('Usuario.php');
    require ('BD.php');
    require('header.php');
    $usuario = new Usuario();

    if(isset($_POST['submit']))
    {
        switch($_POST['submit'])
        {
            case "Alta":
                echo"<div class='alert alert-danger' role=alert>";
                echo"<br> Bot&oacute;n:".$_POST['submit'];
                echo"</div>";
                $usuario->createUsuario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]");
            break;
            case "Borrar":
                echo"<div class='alert alert-danger' role=alert>";
                echo"<br> Bot&oacute;n:".$_POST['submit'];
                echo"</div>";
                $usuario->deleteUsuario($_POST['idb']);
            break;
            case "Modificar":
                echo"<div class='alert alert-danger' role=alert>";
                echo"<br> Bot&oacute;n:".$_POST['submit'];
                echo"</div>";
                $usuario->updateUsuario("$_POST[idm]","$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]");
            break;
            case "Buscar":
                echo"<div class='alert alert-danger' role=alert>";
                echo"<br> Bot&oacute;n:".$_POST['submit'];
                echo"</div>";
                $usuario->readUsuarioS("$_POST[idbuscar]");
            break;
        }
    }
$usuario->readUsuarioG();
?>
<div class="table-responsive">
    <form name="alumno" action="TestUsuario.php" method="Post">
        <table class="table table-bordered">
            <tr>
                <td>
                    Nombre(s):
                </td>
                <td>
                    <input type="text" name="nombre">
                </td>
            </tr>
            <tr>
                <td>
                    Apellido Paterno:
                </td>
                <td>
                    <input type="text" name="apellidop">
                </td>
            </tr>
            <tr>
                <td>
                    Apellido Materno:
                </td>
                <td>
                    <input type="text" name="apellidom">
                </td>
            </tr>
            <tr>
                <td>
                    Nivel:
                </td>
                <td>
                    <select name="nivel">
                        <option value="Administrador">Administrador</option>
                        <option value="Maestro">Maestro</option>
                        <option value="Alumno">Alumno</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Alta"> </input>
                </td>
            </tr>
            <tr>
                <td>
                    ID: <input type="text" name="idm">
                </td>
                <td>
                    <input type="submit" name="submit" value="Modificar"> </input>
                </td>
            </tr>
            <tr>
                <td>
                    ID: <input type="text" name="idb">
                </td>
                <td>
                    <input type="submit" name="submit" value="Borrar"> </input>
                </td>
            </tr>
            <tr>
                <td>
                    ID: <input type="text" name="idbuscar">
                </td>
                <td>
                    <input type="submit" name="submit" value="Buscar"> </input>
                </td>
            </tr>
        </table>
    </form>
</div>
