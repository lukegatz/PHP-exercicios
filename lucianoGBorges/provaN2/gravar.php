<?php
include 'conexao_banco.php';
include 'calcular_inss.php';

$nome = $_POST["nome_func"];
$data = $_POST["data_admissao"];
$cargo = $_POST["cargo"];
$qtde_salarios = $_POST["qtde_salarios"];

// valores que dependem de cálculo (calcular_inss)
$inss = $inss_calc;
$bruto = $salario_bruto;
$liquido = $salario_liquido;


// armazenar SESSÃO
$_SESSION['mysql_conn'] = $conecta_banco;

// provavelmente, no mundo real, a comparação seria por meio do CPF...
$sql = mysqli_query($conecta_banco, "select * from tb_funcionarios where nome_funcionario='$nome';");

// se resultado > 1, funcionário já existe
if (mysqli_num_rows($sql) > 0) {
   echo "<center>";
   echo "<hr>";
   echo "ATENÇÃO!! Esse funcionário já está cadastrado na base de dados!!!";
   echo "<hr>";
   echo "<a href=\"home_funcionarios.html\">Retornar ao cadastro de funcionários... </a>";
}
else {
  $sql = "insert into tb_funcionarios(nome_funcionario, data_admissao, cargo, qtde_salarios, salario_bruto, inss, salario_liquido) values ( '$nome', '$data', '$cargo', $qtde_salarios, $bruto, $inss, $liquido);";
	$busca = query($sql);

  // se aconteceu erro na inserção >>
  if($busca==false) {
    echo "ERRO FATAL!! Erro de inserção!! Bsod!!! Esse computador irá se autodestruir em 10 segundos!!!";
  }

    echo "<center>";
    echo "<hr>";
    echo "Funcionário cadastrado!!!";
    echo "<hr>";
    echo "<a href=\"home_funcionarios.html\">Retornar ao cadastro de funcionários... </a>";
}

// função OO para referenciarmos se há erro na conexão
function query($sql){
  return mysqli_query($_SESSION['mysql_conn'], $sql)or die(mysqli_error($_SESSION['mysql_conn']));  
}
?>