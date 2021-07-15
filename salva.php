<?php

	if(isset($_POST['enviar'])){
		$strcon = mysqli_connect('localhost','','','desafio') or die('Erro ao conectar ao banco de dados');
		$cpf = $_POST['cpf'];
		$nome = $_POST['nomeCliente'];
		$nasc = $_POST['nasc'];

		#dados telefone
		$num = $_POST['numero'];
		$ddd = $_POST['ddd'];
		$opd = $_POST['operadora'];

		$upt = "update telefones set ddd = '$ddd', numero = '$num', Operadora_nome = '$opd' where Clientes_CPF = '$cpf';";
		$upt2 = "update clientes set nome='$nome', nascimento='$nasc' where CPF=$cpf;";

		mysqli_query($strcon,$upt) or die("Erro na atualização: SQL ERROR 3");
		mysqli_query($strcon,$upt2) or die("Erro na atualização: SQL ERROR 4");
	}
	mysqli_close($strcon);
?>
<form name='voltar' action='consulta.php' method="POST" ><input type="submit" name="voltar" value="VOLTAR"></form>