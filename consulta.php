<!DOCTYPE html>
<html>
<head>
	<title>Consulta</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
	<h1>Pesquisa</h1>
		<form name='pesquisa' action='pesquisa.php' method="POST">
		<label>Pesquisar por: </label>
		<select name="opcao" id="opcao">
			<option value="nome" selected>Nome</option>
			<option value="cpf" >CPF</option>
			<option value="numero" >Número</option>
		</select>
		<input type="submit" name="consulta" value="Enviar">
		<div id="divNome">
			<label>Nome: </label>
			<input type="text" name="nome">
		</div>
		<div id="divCpf">
			<label>CPF: </label>
			<input type="text" name="cpf" minlength="11" maxlength="11">
		</div>
		<div id="divNumero">
			<label>DDD+Número: </label>
			<input type="text" name="ddd" size="2" minlength="2" maxlength="2">
			<input type="tel" name="numero" size="9" minlength="9" maxlength="9">
		</div>
		
	</form>
	<?php
		echo "<table border='1'><br>";
		echo "<tr>";
		echo "<th>CPF</th>";
		echo "<th>NOME</th>";
		echo "<th>DATA DE NASCIMENTO</th>";
		echo "<th>NÚMERO</th>";
		echo "<th>OPERADORA</th>";
		echo "<th>ATUALIZAR</th>";
		echo "<th>DELETAR</th>";

		#Conectando bd e fazendo a query sql
		$strcon = mysqli_connect('localhost','','','desafio') or die('Erro ao conectar ao banco de dados');
		
		$sql = "select c.CPF,c.nome as nomeCliente,c.nascimento,t.ddd, t.numero, o.nome as nomeOpd
		from telefones as t join clientes as c join operadoras as o
		on c.CPF = t.Clientes_CPF and o.nome = t.Operadora_nome order by c.nome";

		$result= mysqli_query($strcon,$sql);

		#Pegando dados
		while($registro = mysqli_fetch_array($result)){
			$cpf = $registro['CPF'];
			$nome = $registro['nomeCliente'];
			$nasc = $registro['nascimento'];
			$ddd = $registro['ddd'];
			$numero = $registro['numero'];
			$opd = $registro['nomeOpd'];
			echo "<tr>";
			echo "<td>".$cpf."</td>";
			echo "<td>".$nome."</td>";
			echo "<td>".$nasc."</td>";
			echo "<td>(".$ddd.") ".substr($numero, 0, 5)."-".substr($numero, 5, 4)."</td>";
			echo "<td>".$opd."</td>";
			echo "<td><form action='atualizar.php' name='atualizar' method='POST'>
				  <input type='hidden' name='cpf' value='$cpf'>
				  <input type='submit' name='atualizar' value='ATUALIZAR'></td></form>";
			echo  "<td><form action='apagar.php' name='deletar' method='POST'>
				   <input type='hidden' name='cpf' value='$cpf'> 
				   <input type='submit' name='del' value='DELETAR'></td></form>";
		}
		echo "</table>";
		mysqli_close($strcon);
	?>
</body>
</html>
<script>
	$(document).ready(function() {
	  $('#divCpf').hide();
	  $('#divNumero').hide();

	  $('#opcao').change(function() {
	    if ($('#opcao').val() == 'nome') {
	      $('#divNome').show();
	    } else {
	      $('#divNome').hide();
	    }
	    if ($('#opcao').val() == 'cpf') {
	      $('#divCpf').show();
	    } else {
	      $('#divCpf').hide();
	    }
	    if ($('#opcao').val() == 'numero') {
	      $('#divNumero').show();
	    } else {
	      $('#divNumero').hide();
	    }
	  });
	});
</script>