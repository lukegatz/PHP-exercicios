<?php

include 'conexao_banco.php';

// armazenar SESSÃO
$_SESSION['mysql_conn'] = $conecta_banco;


if(isset($_POST['busca_nome']) != '') {
	$sql = mysqli_query($conecta_banco, "select * from tb_veiculos where descricaoVeiculo like '{$_POST['busca_nome']}%' order by renavam asc");
} else {
	$sql = mysqli_query($conecta_banco, "select * from tb_veiculos order by renavam asc");
}


if(isset($_GET['apagar'])){
	// extra
	$string = $_GET['apagar'];
	$array = explode(';',$string);
	$descricao = $array[0];
	$renav = $array[1];

	// essa versão aqui apagava todos os registros que atendiam à restrição
	// $sql = mysqli_query($conecta_banco, "delete from tb_veiculos where descricaoVeiculo=". $_GET['apagar']);
	$sql = "delete from tb_veiculos where descricaoVeiculo=". $descricao."' and renavam=$renav";
	$busca = query($sql);
	 echo "<br>";
	 echo "<center>";
	 echo "<hr>";
	 echo "VEÍCULO EXCLUÍDO COM SUCESSO!!!";
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
<h2 align="center" font="Verdana, Arial">MULTIMARCAS VEÍCULOS &ndash; ADSVA4 &ndash; LUCIANO GAUBATZ BORGES</h2>
<hr>  
<center>
<form name="form1" method="POST" action="listagem.php">
<br/><br/>DIGITE A DESCRIÇÃO DO VEÍCULO: <input type="text" name="busca_nome">&nbsp;&nbsp;
<input type="submit" value="FILTRAR">&nbsp;&nbsp;
<a href=cadastro_veiculos.html><input type="button" value="VOLTAR" onClick="#"></a>
</form>

<table border="1" align="center">
		    <tr>
			<th colspan="10" bgcolor="orange">LISTAGEM DE VEÍCULOS CADASTRADOS</th>
			</tr>
			<tr>
			<th bgcolor="yellow">RENAVAM</th>
			<th bgcolor="yellow">DESCRICÃO DO VEÍCULO</th>
			<th bgcolor="yellow">MONTADORA</th>
			<th bgcolor="yellow">ANO DE FABRICAÇÃO</th>
			<th bgcolor="yellow">PLACA</th>
			<th bgcolor="yellow">VALOR VEÍCULO</th>
			<th bgcolor="yellow">VALOR IPVA</th>
			<th colspan="3" bgcolor="yellow">APAGAR</th>
			</tr>
			<tr>
			
			<?php
				while($linha = $sql->fetch_assoc()) {
			?>
			<td align="center"><?php echo $linha['renavam']; ?></td>
			<td align="center"><?php echo ucwords($linha['descricaoVeiculo']); ?></td>
			<td align="center"><?php echo ucwords($linha['montadora']); ?></td>
			<td align="center"><?php echo $linha['anoFabricacao']; ?></td>
			<td align="center"><?php echo strtoupper($linha['placa']); ?></td>
			<td align="center"><?php echo $linha['valorVeiculo']; ?></td>
			<td align="center"><?php echo $linha['ipva']; ?></td>
	        <th>
	       		<a href="listagem.php?apagar='<?php echo $linha['descricaoVeiculo']; echo ";"; echo $linha['renavam']; ?>">
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





