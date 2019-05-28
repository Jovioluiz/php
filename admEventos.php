<?php 
include_once "includes/conexao.php";
include_once "includes/functions.php";
$sql = "select nome, tipo, date_format(data, '%d/%m/%Y') as data, ((totalVendidos/totalIngressos) * 100) as vendidos, vendaAberta, local from evento order by data desc";
$resultado = mysqli_query($conexao, $sql);
?>
<h1>Administração de Eventos</h1>
<p><a href="cadastro.php"></a>Cadastrar novo Eventos</p>
<?php
if (mysqli_num_rows($resultado) == 0) {
	echo "<p>Nenhum Evento Cadastrado</p>";
} else{
	?>
	<table border="1">
		<tr>
			<th>Nome</th>
			<th>Tipo</th>
			<th>Data</th>
			<th>Local</th>
			<th>Vendidos</th>
			<th>Venda Aberta</th>
		</tr>
		<?php 
		while ($evento = mysqli_fetch_array($resultado)) {
			?>
			<tr>
				<td><?php echo $evento['nome'];?></td>
				<td><?=exibeTipo($evento['tipo'])?></td>
				<td><?=$evento['data']?></td>
				<td><?=$evento['local']?></td>
				<td><?=exibePorcentagem($evento['vendidos'])?></td>
				<td><?=exibeVendaAberta($evento['vendaAberta'])?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
} //fecha o else
?>
