<?php
	if(isset($_POST['atualizar'])){
		$cpf=$_POST['cpf'];

		$strcon = mysqli_connect('localhost','','','desafio') or die('Erro ao conectar ao banco de dados');
		$sql = "select c.CPF,c.nome as nomeCliente,c.nascimento,t.ddd, t.numero, o.nome as nomeOpd
		from telefones as t join clientes as c join operadoras as o
		on c.CPF = t.Clientes_CPF and o.nome = t.Operadora_nome where c.CPF=$cpf";
		mysqli_query($strcon,$sql) or die('Erro ao deletar: SQL ERROR 1');

		echo "Dados do Cliente!";
		$result= mysqli_query($strcon,$sql) or die('Erro no cadastro');

	#Pegando dados
	while($registro = mysqli_fetch_array($result)){
		$cpf = $registro['CPF'];
		$nome = $registro['nomeCliente'];
		$nasc = $registro['nascimento'];
		$ddd = $registro['ddd'];
		$numero = $registro['numero'];
		$opd = $registro['nomeOpd'];
		echo "<form name='enviar' action='salva.php' method='POST'>";
		echo "<label>Nome Completo: </label>";
		echo "<input type='text' name='nomeCliente' size='45' value='$nome' required><br>";
		echo "<label>Data de Nascimento</label>";
		echo "<input type='date' name='nasc' value='$nasc' required><br>";
		echo "<label>Telefone: DDD+numero</label>";
		echo "<input type='text' name='ddd' size='2' minlength='2' maxlength='2' value='$ddd' required>";
		echo "<input type='tel' name='numero' size='9' minlength='9' maxlength='9' value='$numero' required><br>";
		echo "<label>Operadora:</label>";
		echo "<select name='operadora'>";
			echo "<option value='VIVO'>VIVO</option>";
			echo "<option value='TIM'>TIM</option>";
			echo "<option value='CLARO'>CLARO</option>";
			echo "<option value='OI'>OI</option>";
		echo "</select>";
		echo "<input type='hidden' name='cpf' value='$cpf'>";
		echo "<input type='submit' name='enviar' value='Enviar'>";
		echo "</form>";	
		}
		
		mysqli_close($strcon);
	}

	
?>
<form name='voltar' action='consulta.php' method="POST" ><input type="submit" name="voltar" value="VOLTAR"></form>