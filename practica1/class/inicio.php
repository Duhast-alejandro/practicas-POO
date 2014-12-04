<?php
class pregunta{

    public function mostrar_preguntas(){



$sql="select * from preguntas";
        $con=mysql_query($sql) or die ("error de $sql");

        echo"<form action=inicio.php method='post'>";
        echo"<table align=center border=1 class=table table-stiped>";

        for ($i=1;$i<=13;$i++)
            $a[$i]=0;

        $y = 1;
        $s=0;
        while($y<=5){
            $numero=rand(1, 13);
            $sql1="select * from preguntas where id_pregunta = $numero ";
            $con1=mysql_query($sql1) or die ("error de $sql1");
            $pregunta=mysql_result($con1, 0, 'pregunta');
            $id=mysql_result($con1, 0, 'id_pregunta');

            if($a[$id]!= 1){
                $a[$id]=1;
                $s++;
                echo"<tr><td>$s .- $pregunta</td><td><input type='text' name='id' value='$id'></td></tr>";
                $y++;
            }

    }
        echo"<tr><td align=center><input type='submit' value='Guardar' name='guardar' id='guardar'></td></tr>";
        echo"</table></form>";
    }

    public function guardar($a){

       for($i=0;$i<count($a);$i++){
echo"$a";
    }

}
}