<?php
require("conecta.php");
class expediente{

public function alta_expediente(){
include("conecta.php");
$s="select FolioPaciente, Nombre, appat, apmat from paciente where FolioPaciente = $folio";
$c=mysql_query($s) or die ("error");
@$nombre= mysql_result($c, 0, 'Nombre');
@$appat= mysql_result($c, 0, 'appat');
@$apmat= mysql_result($c, 0, 'apmat');

$sqlc="select FolioPaciente from antecedentes where FolioPaciente = $folio";
$con=mysql_query($sqlc) or die ("error de consulta");
@$clave= mysql_result($con, 0, 'FolioPaciente');

include("codificar.php");
$id=encode_this("folio=$folio");
if ($folio==$clave){
echo "<h4>El expediente ya existe</h4>";
}
else{
$sql="INSERT INTO antecedentes (FolioPaciente, hipertension, diabetes, cancer,cerebro,asma,deslipidemias,trastorno,genetica, otros, heredo, infancia, cronicas, 
sangre, accidentes,alergias, alcohol,cant_al,drogas,can_dro, tabaco, can_taba, recibe, cual, personal, bucal, vivienda, comida,
dieta, tipo,servicio, material,cuartos, personas, animal,libre, cafe, cant_cafe, monto, instrumento , caida, sueno, orina, caca, vida, cual2, protesis, cual3)
value ($folio, '$hiper','$diabetes','$cancer','$cerebro','$asma','$desli','$trast','$genetica', '$otros', '$heredo', '$infancia', '$cronica', '$quirur', '$accidente', '$alimento',
'$alcohol', '$cant1','$droga', '$cant2','$taba', '$cant3', '$recibe', '$cual', '$aseo', '$bucal', '$vivienda', '$comida', '$dieta', '$tipo'
, '$servicio', '$material', '$cuartos', '$person', '$animal', '$libre', '$cafe', '$cant4', '$monto', '$instrumento', '$caida', '$sueno'
, '$orina', '$caca', '$vida', '$cual2', '$protesis', '$cual3')";
$consu=mysql_query($sql) or die ("error de consulta1");
}
}
}
?>