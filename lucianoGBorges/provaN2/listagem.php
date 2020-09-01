<?php

include 'conexao_banco.php';

// armazenar SESSÃO
$_SESSION['mysql_conn'] = $conecta_banco;


if(isset($_POST['busca_nome']) != '') {
	$sql = mysqli_query($conecta_banco, "select * from tb_funcionarios where nome_funcionario like '{$_POST['busca_nome']}%' order by n_registro asc");
} else {
	$sql = mysqli_query($conecta_banco, "select * from tb_funcionarios order by n_registro asc");
}


if(isset($_GET['apagar'])){
	// extra
	$string = $_GET['apagar'];

	$sql = "delete from tb_funcionarios where nome_funcionario=". $string."'";
	$busca = query($sql);
	 echo "<br>";
	 echo "<center>";
	 echo "<hr>";
	 echo "FUCIONÁRIO EXCLUÍDO COM SUCESSO!!!";
	 echo "<br>";
	 echo "<br>";
	 // echo " $sql ";
	 echo "<a href=\"listagem.php\">VOLTAR</a>"; 
	 echo "<hr>";
	return false;
	
}

// função OO para referenciarmos se há erro na conexão
function query($sql){
  return mysqli_query($_SESSION['mysql_conn'], $sql)or die(mysqli_error($_SESSION['mysql_conn']));  
}

?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>	
<h2 align="center" font="Verdana, Arial">CADASTRO DE FUNCIONÁRIOS &ndash; ADSVA4 &ndash; LUCIANO GAUBATZ BORGES</h2>
<hr>  
<center>
<form name="form1" method="POST" action="listagem.php">
<br/><br/>DIGITE O NOME DO FUNCIONÁRIO: <input type="text" name="busca_nome">&nbsp;&nbsp;
<input type="submit" value="FILTRAR">&nbsp;&nbsp;
<a href=home_funcionarios.html><input type="button" value="VOLTAR" onClick="#"></a>
</form>

<table border="1" align="center">
		    <tr>
			<th colspan="10" bgcolor="orange">LISTAGEM DE FUNCIONÁRIOS</th>
			</tr>
			<tr>
			<th bgcolor="yellow">N° REGISTRO</th>
			<th bgcolor="yellow">NOME FUNCIONÁRIO</th>
			<th bgcolor="yellow">DATA DE ADMISSÃO</th>
			<th bgcolor="yellow">CARGO</th>
			<th bgcolor="yellow">SALÁRIO BRUTO</th>
			<th bgcolor="yellow">INSS</th>
			<th bgcolor="yellow">SALÁRIO LÍQUIDO</th>
			<th colspan="3" bgcolor="yellow">APAGAR</th>
			</tr>
			<tr>
			
			<?php
				while($linha = $sql->fetch_assoc()) {
			?>
			<td align="center"><?php echo $linha['n_registro']; ?></td>
			<td align="center"><?php echo ucwords($linha['nome_funcionario']); ?></td>
			<td align="center"><?php echo ($linha['data_admissao']); ?></td>
			<td align="center"><?php echo ucwords($linha['cargo']); ?></td>
			<td align="center"><?php echo ($linha['salario_bruto']); ?></td>
			<td align="center"><?php echo $linha['inss']; ?></td>
			<td align="center"><?php echo $linha['salario_liquido']; ?></td>
	        <th>
	       		<a href="listagem.php?apagar='<?php echo $linha['nome_funcionario']; ?>">
	       			<img src='imagens/lixeira.png'>
	       		</a>
	       	</th>
		    <tr>
            			
			<?php  } 
			  
			  echo "<br>";
			  echo "<center>";
			  echo "<hr>";
			?>
</table>
</body>
</html>





