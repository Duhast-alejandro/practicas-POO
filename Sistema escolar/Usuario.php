<?php
require ("Bd.php");
class Usuario{

    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $telefono;
    private $calle;
    private $numeroExterior;
    private $numeroInterior;
    private $colonia;
    private $municipio;
    private $estado;
    private $cp;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $estatus;

    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){

       // echo "createUsuario<br>";
        $sql="INSERT INTO usuarios (Nombre,ap_pat,ap_mat,Nivel,Estatus)
            values ('$nombre','$apellidop','$apellidom','$nivel',1)";
        $consulta= mysql_query($sql) or die ("Error en $sql");
    }

    public function readUsuarioG(){

        $sql01 = "SELECT * FROM usuarios WHERE estatus = 1 ORDER BY ap_pat ASC;";
        $result01 = mysql_query($sql01) or die ("Error consulta sql01");

        echo "<div class='table-responsive'>";

            echo "<table class='table table-stiped'>";

                echo "<tr><td><strong>Usuarios</strong></td></tr>";

                echo "<tr><td>Clave</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nivel</td></tr>";

        while ($field = mysql_fetch_array($result01)){

            $this->id = $field['id_usuario'];
            $this->nombre = utf8_decode($field['nombre']);
            $this->apellidoPaterno = utf8_decode($field['ap_pat']);
            $this->apellidoMaterno = utf8_decode($field['ap_mat']);
            $this->nivel = $field['nivel'];
            switch($this->nivel){

                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
                default;

            }

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td>
            <td>$this->apellidoMaterno</td><td>$this->nivel</td></tr>";

        }

        echo "</table>";

        echo "</div>";

    }

    public function readUsuarioS($id){

        //echo "readUusarioS<br>";
        $sql01 = "SELECT * FROM usuarios WHERE Estatus =1 and id_usuario=$id ORDER BY ap_pat ASC;";
        $result01 = mysql_query($sql01) or die ("Error consulta sql01= ".mysql_error());

        echo "<div class='table-responsive'>";

        echo "<table class='table table-stiped'>";

        echo "<h2 align='center'>Usuarios</h2>";

        echo "<tr><td>Clave</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nivel</td></tr>";

        while ($field = mysql_fetch_array($result01)){

            $this->id = $field['id_usuario'];
            $this->nombre = utf8_decode($field['nombre']);
            $this->apellidoPaterno = utf8_decode($field['ap_pat']);
            $this->apellidoMaterno = utf8_decode($field['ap_mat']);
            $this->nivel = $field['nivel'];
            switch($this->nivel){

                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
                default;

            }

            echo "<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$this->nivel</td></tr>";

        }

        echo "</table>";

        echo "</div>";

    }

    public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){

        //echo "updateUsuario<br>";
        $sql="UPDATE usuarios SET nombre='$nombre',ap_pat='$apellidop',ap_mat='$apellidom',nivel='$nivel'
        WHERE id_usuario=$id";
        $consulta= mysql_query($sql) or die ("Error en $sql");
    }

    public function deleteUsuario($id){

        //echo "deleteUsuario<br>";
        $sql="delete from usuarios where Id_usuario=$id";
        $consulta= mysql_query($sql) or die ("Error en $sql");
    }

}

?>