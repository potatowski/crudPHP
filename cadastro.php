<?php
	#dados cliente
	$nome = $_POST['nomeCliente'];
	$cpf = $_POST['cpf'];
	$nasc = $_POST['nasc'];

	#dados telefone
	$tel = $_POST['numero'];
	$ddd = $_POST['ddd'];
	$opd = $_POST['operadora'];


	#conectando bd
	$strcon = mysqli_connect('localhost','root','','desafio') or die('Erro ao conectar ao banco de dados');
	
	#cadastro no bd cliente
	$cadCliente = "insert into clientes values ('$cpf','$nome','$nasc')";
	
	mysqli_query($strcon,$cadCliente) or die('Erro no cadastro Cliente');

	#cadastro no bd telefone

	/* Aqui é a parte que descobriria a operadora pelo 2º e 3º número do telefone, mas como são muito preferir agilizar e pedir no form
	$descOpd =substr("$tel", 1,2);

	switch ($descOpd) {
		case 91:
			$opd = "VIVO";
			break;
		case 81:
			$opd = "TIM";
			break;
		case 84: 
			$opd = "CLARO";
			break;
		case 99 or 88:
			$opd = "OI";
			break;
	}
	*/

	$cadTel = "insert into telefones values ('$ddd','$tel','$cpf','$opd')";

	mysqli_query($strcon,$cadTel) or die('Erro no cadastro Telefone');

	mysqli_close($strcon);
	
	echo "Cliente cadastrado com sucesso";
?>
<form name='voltar' action='cadastro.html' method="POST" ><input type="submit" name="voltar" value="Voltar"></form>