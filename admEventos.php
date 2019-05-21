<?php 
include_once "includes/conexao.php";
$sql = "select nome, tipo, date_format(data, '%d/%m/%Y') as data, ((totalVendidos/totalIngressos) * 100) as vendidos, vendaAberta from evento order by data desc";
$resultado = mysqli_query($conexao, $sql);

?>


<h1>Administração de Eventos</h1>
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
			<th>Vendidos</th>
			<th>Venda Aberta</th>
		</tr>
		<?php 
		while ($evento = mysqli_fetch_array($resultado)) {
			?>
			<tr>
				<td><?php echo $evento['nome'];?></td>
				<td><?=$evento['tipo']?></td>
				<td><?=$evento['data']?></td>
				<td><?=$evento['vendidos']?></td>
				<td><?=$evento['vendaAberta']?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
} //fecha o else
?>