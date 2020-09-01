<?php

// interessa apenas a quantidade
// de salários mínimos:
// se for maior do que 1, INSS é 11%
// abaixo de 1, INSS é zero
const SALARIO_MIN = 1045;
$salarios = $_POST["qtde_salarios"];
$inss_calc = 0;

// os valores de salário bruto e líquido
$salario_bruto = $salarios * SALARIO_MIN;
$salario_liquido = 0;

if($salarios > 1) {
	$inss_calc = $salario_bruto * 0.11;
	$salario_liquido = $salario_bruto - $inss_calc;
} else {
	$salario_liquido = $salario_bruto;
}

?>