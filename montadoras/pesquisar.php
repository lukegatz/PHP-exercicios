<?php
include 'conexao_banco.php';
// include 'calcular_ipva.php';

$renavam = $_POST ["entrada_renavam"];

$sql = "SHOW TABLES FROM $banco";
$tabelas = mysqli_query($conecta_banco, $sql);

echo " $renavam ";
//echo " $banco ";
echo " <br/> ";
//echo " $sql ";
echo " <br/> ";
echo "<hr/>";
while($row = $tabelas->fetch_assoc()) {
  // echo "<pre>", var_dump($row), "</pre>";
  pr($row);
}
echo "<hr/>";


function pr($data) {
  echo "<pre>";
  var_dump($data); // or print_r($data);
  echo "</pre>";
}

/*$sql = mysqli_query($conecta_banco, "select * from TB_VEICULOS where 'renavam'='$renavam';");

// se resultado > 1, renavam já existe
if (mysqli_num_rows($sql) > 0) {
   echo "<center>";
   echo "<hr>";
   echo "Olha o veículo aí!!!";
   echo "<hr>";
   echo "<a href=\"pesquisa.html\">Pesquisa... :/ </a>";
}
else {
  echo "<center>";
  echo "?????!";
}*/

?>