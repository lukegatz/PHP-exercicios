<?php 
$servidor="127.0.0.1";
$usuario="root";
$senha="";
$banco="Folha_Pagto";
$conecta_banco=mysqli_connect($servidor,$usuario,$senha) or die (mysqli_error());
mysqli_select_db($conecta_banco, $banco) or die ("Erro ao Conectar");
?>
