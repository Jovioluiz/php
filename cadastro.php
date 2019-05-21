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
	echo "<p><a href=\"cadastro.php\">Voltar</a></p>";
	die();//interrompe o script
}
?>

<h1>Cadastro de eventos</h1>
<form action="" method="post">
	<div>
		<label>Nome: <input type="text" name="nome" maxlength="50" size="50"></label>
	</div>
	<div>
		<label>Tipo: 
			<select name="tipo">
				<option value="0">Selecione</option>
				<option value="1">Show</option>
				<option value="2">Balada</option>
				<option value="3">Teatro</option>
				<option value="4">Esporte</option>
				<option value="5">Festival</option>
				<option value="6">Palestra</option>
				<option value="7">Exposição</option>
			</select>
		</label>
	</div>
	<div>
		<label>Local: <input type="text" name="local" maxlength="100" size="50"></label>
	</div>
	<div>
		<label>Descrição: <textarea cols="50" rows="10" name="descricao"></textarea></label>
	</div>
	<div>
		<label>Total de ingressos: <input type="number" name="totalIngressos" min="0" value="0"></label>
	</div>
	<div>
		<label>Valor: <input type="number" name="valor" min="0" value="0"></label>
	</div>
	<div>
		<label>Data do evento: <input type="date" name="data"></label>
	</div>
	<div>
		<label>Hora do evento: <input type="time" name="hora"></label>
	</div>
	<div>
		A venda de ingressos ainda está aberta?
		<label><input type="radio" name="venda" value="1" checked="">Sim</label>
		<label><input type="radio" name="venda" value="0">Não</label>
	</div>
	<div>
		<input type="submit" name="cadastrar" value="Cadastrar">
		<input type="reset" name="limpar" value="Limpar">
	</div>
</form>
