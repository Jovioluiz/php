<?php 
function exibeTipo($x){
	switch ($x) {
		case 1:
			return "Show";
		case 2:
			return "Balada";
		case 3:
			return "Teatro";
		case 4:
			return "Esporte";
		case 5:
			return "Festival";
		case 6: 
			return "Palestra";
		case 7:
			return "Exposição";
	}
}

function exibePorcentagem($n){
	return number_format($n, 1, ",", ".")."%";//1 casa decimal, com virgula como separador de decimal e ponto como separador de milhar
 }


function exibeVendaAberta($b){
	if ($b == 1) {
		return "Sim";
	} else{
		return "Não";
	}
}

 ?>
