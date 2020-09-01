<?php
include 'conexao_banco.php';
include 'calcular_ipva.php';

$renavam = $_POST["entrada_renavam"];
$descricao = $_POST["entrada_descricao"];
$montadora = $_POST["entrada_montadora"];
$ano = $_POST["entrada_ano"];
$placa = $_POST["entrada_placa"];
$valor = $_POST["entrada_valor"];
$ipva = $ipva_calc;

// armazenar SESSÃO
$_SESSION['mysql_conn'] = $conecta_banco;

$sql = mysqli_query($conecta_banco, "select * from tb_veiculos where renavam=$renavam;");

// se resultado > 1, renavam já existe
if (mysqli_num_rows($sql) > 0) {
   echo "<center>";
   echo "<hr>";
   echo "ERRO!! Esse veículo já está cadastrado na base de dados!!!";
   echo "<hr>";
   echo "<a href=\"cadastro_veiculos.html\">Retornar ao cadastro de veículos... </a>";
}
else {
  $sql = "insert into tb_veiculos(renavam, descricaoVeiculo, montadora, anoFabricacao, placa, valorVeiculo, ipva) values ( $renavam, '$descricao', '$montadora', $ano, '$placa', $valor, $ipva);";
	$busca = query($sql);

  // se aconteceu erro na inserção >>
  if($busca==false) {
    echo "Putz! Deu tudo errado!!";
  }

    echo "<center>";
    echo "<hr>";
    echo "Veículo cadastrado!!!";
    echo "<hr>";
    echo "<a href=\"cadastro_veiculos.html\">Retornar ao cadastro de veículos... </a>";
}

// função OO para referenciarmos se há erro na conexão
function query($sql){
  return mysqli_query($_SESSION['mysql_conn'], $sql)or die(mysqli_error($_SESSION['mysql_conn']));  
}
?>