<?php
if (isset($_POST['cadastrar'])) {
	$nome = $_POST['nome'];
	$tipo = $_POST['tipo'];
	$local = $_POST['local'];
	$descricao = $_POST['descricao'];
	$totalIngressos = $_POST['totalIngressos'];
	$valor = $_POST['valor'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$venda = $_POST['venda'];

	//validações
	$erros = array();

	if (empty($nome)) {
		$erros[] = "O nome do evento não pode ser vazio";
	}

	if ($tipo == 0) {
		$erros[] = "selecione o tipo de Evento!";
	}

	if ($totalIngressos == 0) {
		$erros = "O total de ingressos não pode ser zero";
	}

	if (count($erros) == 0) {
		//insert
		$sql = "insert into evento (nome, tipo,	local, descricao, totalIngressos, valor, data, hora, vendaAberta) values 
		('$nome', $tipo, '$local', '$descricao', $totalIngressos, $valor, '$data', '$hora', $venda)";
	
		//echo $sql;
		include_once "includes/conexao.php";
		if(mysqli_query($conexao, $sql)){
			echo "Cadastro Realizado com Sucesso";
		} else{
			echo "Ocorreu em erro no cadastro";
			echo mysqli_error($conexao);
		}
		echo "<p><a href=\"admEventos.php\">Voltar</a></p>";
		mysql_close($conexao);
		die();//interrompe o script
	}//fecha o count
}
?>

<h1>Cadastro de eventos</h1>
<?php 
	if (isset($erros)) {
		echo "<p>Foram encontrados os seguintes erros:</p> ";
		echo "<ul>";
		for($i = 0; $i<count($erros); $i++){
			echo "<li style='color: red'>$erros[$i]</li>";
		}
	echo "</ul>";
	}

	//
	$nome = isset($_POST['nome'])? $_POST['nome'] : "";
	$tipo = isset($_POST['tipo'])? $_POST['tipo'] : 0;
	$local = isset($_POST['local'])? $_POST['local'] : "";
	$descricao = isset($_POST['descricao'])? $_POST['descricao'] : "";
	$totalIngressos = isset($_POST['totalIngressos'])? $_POST['totalIngressos'] : 0;
	$valor = isset($_POST['valor'])? $_POST['valor'] : 0;
	$data = isset($_POST['data'])? $_POST['data'] : "";
	$hora = isset($_POST['hora'])? $_POST['hora'] : "";
	$venda = isset($_POST['venda'])? $_POST['venda'] : 1;
 ?>

<form action="" method="post">
	<div>
		<label>Nome: <input type="text" name="nome" maxlength="50" size="50" value="<?$nome?>"></label>
	</div>
	<div>
		<label>Tipo: 
			<select name="tipo">
				<option value="0" <?=($tipo == 0)? "selected":""?>>Selecione</option>
				<option value="1" <?=($tipo == 1)? "selected":""?>>Show</option>
				<option value="2" <?=($tipo == 2)? "selected":""?>>Balada</option>
				<option value="3" <?=($tipo == 3)? "selected":""?>>Teatro</option>
				<option value="4" <?=($tipo == 4)? "selected":""?>>Esporte</option>
				<option value="5" <?=($tipo == 5)? "selected":""?>>Festival</option>
				<option value="6" <?=($tipo == 6)? "selected":""?>>Palestra</option>
				<option value="7" <?=($tipo == 7)? "selected":""?>>Exposição</option>
			</select>
		</label>
	</div>
	<div>
		<label>Local: <input type="text" name="local" maxlength="100" size="50" value="<?$local?>"></label>
	</div>
	<div>
		<label>Descrição: <textarea cols="50" rows="10" name="descricao"><?=$descricao?></textarea></label>
	</div>
	<div>
		<label>Total de ingressos: <input type="number" name="totalIngressos" min="0" value="<?$totalIngressos?>"></label>
	</div>
	<div>
		<label>Valor: <input type="number" name="valor" min="0" value="<?$valor?>"></label>
	</div>
	<div>
		<label>Data do evento: <input type="date" name="data" value="<?$data?>"></label>
	</div>
	<div>
		<label>Hora do evento: <input type="time" name="hora" value="<?$hora?>"></label>
	</div>
	<div>
		A venda de ingressos ainda está aberta?
		<label><input type="radio" name="venda" value="1" <?=($venda == 1)? "checked":""?>>Sim</label>
		<label><input type="radio" name="venda" value="0" <?=($venda == 0)? "checked":""?>>Não</label>
	</div>
	<div>
		<input type="submit" name="cadastrar" value="Cadastrar">
		<input type="reset" name="limpar" value="Limpar">
	</div>
</form>
