<?php
class Usuario{
    private $name;

    public function  getUsuario(){
        echo" <br> Mostrar usuario: ".$this->name;
    }

    public function setUsuario(){
        $this->name="Alejandro";
        return $this->name;
    }

    public function consultausers(){
        $sql="select * from usuarios";
        $con=mysql_query($sql) or die ("error de $sql");
        $num= mysql_num_rows($con);

        echo"<table class=table-responsive align=center>";
        echo"<tr><td align='center'><b>Nombre completo</b></td></tr>";

        for ($y=0; $y<$num;$y++){

        $nombre=mysql_result($con, $y, 'nombre');
        $ap_pat=mysql_result($con, $y, 'ap_pat');
        $ap_mat=mysql_result($con, $y, 'ap_mat');
            echo"<tr><td align='center'>$nombre $ap_pat $ap_mat</td></tr>";
        }
        echo"</table>";
    }

}