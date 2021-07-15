<?php
	if(isset($_POST['del'])){
		$cpf=$_POST['cpf'];

		$strcon = mysqli_connect('localhost','','','desafio') or die('Erro ao conectar ao banco de dados');
		$sql = "delete from telefones where Clientes_CPF=$cpf;";
		$sql1 = "delete from clientes where CPF=$cpf;";
		mysqli_query($strcon,$sql) or die('Erro ao deletar: SQL ERROR 1');
		mysqli_query($strcon,$sql1) or die('Erro ao deletar: SQL ERROR 2');

		echo "Cliente e dados deletados com Sucesso!";
	}
?>
<form name='voltar' action='consulta.php' method="POST" ><input type="submit" name="voltar" value="VOLTAR"></form>