<?php
require("Bd.php");
require("header.php");
class Materia {
    public $id;
    private $nombre;
    private $materia;
    private  $avatar;
    private  $orden;
    private $estatus;

    public function  CreateMateriaG(){
        echo"<br> Create materiaG";
    }

    public function  ReadMateriaS(){
        echo"<br> Read materiaS";
    }

    public function  ReadMateria(){
        echo"<br> Create materia";
    }

    public function DatosMaestro($idmaestro){
        echo"<table align='center'><tr><td><h2><b>Informacion del maestro(a):</h2></b></h2></td><td> <h3>$idmaestro</h3></td></tr>";
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
    }
    public function Combomaestro(){
    $sql="select * from usuarios where nivel = 'Maestro'";
    $con=mysql_query($sql) or die ("Error de combo maestro");
    $num=mysql_num_rows($con);
        echo "<div class='table-responsive'>";

        echo"<form action='Testmateria.php' method='post'>";

        echo "<table class='table table-stiped'>";

        echo"<tr><td>Maestro:</td><td><select name='id_maestro'>";
        for($y=0;$y<$num;$y++){
            $this->nombre=mysql_result($con, $y, 'nombre');
            $this->ap_pat=mysql_result($con, $y, 'ap_pat');
            $this->ap_mat=mysql_result($con, $y, 'ap_mat');

       echo" <option>$this->nombre $this->ap_pat $this->ap_mat</option>";
        }
        echo"</select></td></tr>";
        echo"<tr><td colspan='2'><input type='submit' value='Seleccionar'></td></tr>";

        echo"</table></form></div>";

    }
    public function AsignarMaterias($idmaestro){

        echo "<div class='table-responsive'>";
        echo"<form action4='Testmateria.php' method='post'>";
        echo"<table align='center' border='1' width='30%'>";
        echo"<tr><td colspan='2' align='center'><b>Materias impartidas:</b></td></tr>";
        $sqlq="SELECT * FROM usuarios WHERE concat(nombre, ' ', ap_pat, ' ', ap_mat) = '$idmaestro'
        or usuario='$idmaestro'";
        $conq=mysql_query($sqlq) or die ('error de información de maestro2');
        $folio=mysql_result($conq, 0, 'id_usuario');

        $sql1="select * from maestro_materia where id_usuario = $folio";
        $con1=mysql_query($sql1) or die ('error de asignar materias');
        $num=mysql_num_rows($con1);
        for($y=0;$y<$num;$y++){
            $foliomateria=mysql_result($con1,$y, 'id_materia');

            $sql2="select * from materia where id_materia = $foliomateria";
            $con2=mysql_query($sql2) or die ('error de mostrar materias');
            $num2=mysql_num_rows($con2);

            for($z=0;$z<$num2;$z++){

                $nombremateria=mysql_result($con2, $z, 'materia');
                echo"<tr><td align='center'>$nombremateria </td>
                <td align='center'>
                <form action='eliminar_materia.php' method='post'>
                <input type='submit' value='Eliminar'>
                <input type='hidden' name='id_usuario' value='$folio'>
                <input type='hidden' name='id_materia' value='$foliomateria'>
                </form></td></tr>";

            }
        }

        echo"</table></form></div> <br><br><br>";
    }
    public function MateriasAsignadas($idmaestro){

        $sqlq="SELECT * FROM usuarios WHERE concat(nombre, ' ', ap_pat, ' ', ap_mat) = '$idmaestro'";
        $conq=mysql_query($sqlq) or die ('error de información de maestro2');
        $folio=mysql_result($conq, 0, 'id_usuario');

        $sql2="SELECT * from materia";
        $con2=mysql_query($sql2) or die ("error de materia");
        $num2=mysql_num_rows($con2);

        echo"<form action='agregar_materia.php' method='post'>";
        echo"<table align='center'><tr><td><b>Materias por asignar:</b></td><td><select name='materia'>";
        for($y=0;$y<$num2;$y++){
            $id_mat=mysql_result($con2, $y, 'id_materia');
            $mate=mysql_result($con2, $y, 'materia');

            $sql3=" select * from maestro_materia where id_usuario = $folio and id_materia = $id_mat";
            $con3=mysql_query($sql3) or die ("error 3");
            $num3=mysql_num_rows($con3);
            if ($num3 > 0){
                echo"<option>$mate No disponible</option>";
            }else{
            echo"<option>$mate</option>";
                }
        }
        echo"</select></td></tr>

        <tr><td colspan='2' align=center><input type='submit' value='Agregar'></td></tr></table>";
             echo"<input type='hidden' name='id_maestro' value='$folio'>";

        echo"</form>";

    }

    public function Eliminar_materia($id_u, $id_m){
        $sql="delete from maestro_materia where id_usuario=$id_u
        and id_materia = $id_m";

        $con=mysql_query($sql) or die ("error de eliminar materia asignada");
        echo"La materia ha sido sustituida del profesor";
    }

    public function AgregarMateria($id_materia, $id_usuario){

        $sq="select * from materia where materia = '$id_materia'";
        $co=mysql_query($sq) or die ("error de materia nombre");
        $id_m=mysql_result($co, 0, 'id_materia');

        $sql="insert into maestro_materia (id_materia, id_usuario)
value ($id_m, $id_usuario)";
        $con=mysql_query($sql) or die ("error de insertar materia".mysql_error());
        echo"La materia ha sido asignada al profesor";
    }

}