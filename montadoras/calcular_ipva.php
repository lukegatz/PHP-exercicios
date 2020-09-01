<?php

// interessam apenas o valor e o ano do automóvel
// se o ano > 1999, calcula 4% sobre o valor,
// senão ipva é 0
$valor = $_POST["entrada_valor"];
$ano = $_POST["entrada_ano"];
$ipva_calc = 0;

if($ano > 1999) {
	$ipva_calc = $valor * 0.04;
} 

?>