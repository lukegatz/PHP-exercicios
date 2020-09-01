<?php

function mask($val, $mask) {

	$maskared = '';
	$k = 0;

	for($i = 0; $i<=strlen($mask)-1; $i++) {

		if($mask[$i] == '#') {
			
			if(isset($val[$k]))
				$maskared .= $val[$k++];
		} else {
			
			if(isset($mask[$i]))
				$maskared .= $mask[$i];

		}

	}

	return $maskared;

}

?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$cnpj = '22485723000106';
			$cpf = '33725428769';
			$cep = '05432080';
			$data = '10102010';

			echo mask($cnpj,'##.###.###/####-##');
			echo "<br>";
			echo mask($cpf,'###.###.###-##');
			echo "<br>";
			echo mask($cep,'#####-###');
			echo "<br>";
			echo mask($data,'##/##/####');
		?>

	</body>
</html>
