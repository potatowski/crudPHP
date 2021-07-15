<?php
	if(isset($_POST['consulta'])){
		$sql = "select c.CPF,c.nome as nomeCliente,convert(varchar,c.nascimento, 103),t.ddd, t.numero, o.nome as nomeOpd
		from telefones as t join clientes as c join operadoras as o
		on c.CPF = t.Clientes_CPF and o.nome = t.Operadora_nome"; 
		$opcao = $_POST['opcao'];
			switch ($opcao) {
				case 'nome':
					$nome = $_POST['nome'];
					$sql = $sql." where c.nome='$nome'order by c.nome;";
				break;
				case 'cpf':
					$cpf = $_POST['cpf'];
					$sql= $sql." where c.cpf=$cpf";
				break;
					case 'numero':
						$ddd = $_POST['ddd'];
						$num = $_POST['numero'];
						$sql = $sql." where t.ddd=$ddd and t.numero = $num order by c.nome;";
				break;
			}
		}
	echo "<table border=1";
	echo "<tr>";
	echo "<th>CPF</th>";
	echo "<th>NOME</th>";
	echo "<th>DATA DE NASCIMENTO</th>";
	echo "<th>NÚMERO</th>";
	echo "<th>OPERADORA</th>";

	#Conectando bd e fazendo a query sql
	$strcon = mysqli_connect('localhost','','','desafio') or die('Erro ao conectar ao banco de dados');
	$result= mysqli_query($strcon,$sql) or die('Erro no cadastro');

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
		echo "<td>(".$ddd.") ".$numero."</td>";
		echo "<td>".$opd."</td>";
		echo "<td><form action='atualizar.php' name='atualizar' method='POST'>
				  <input type='hidden' name='cpf' value='$cpf'>
				  <input type='submit' name='atualizar' value='ATUALIZAR'></td></form>";
			echo  "<td><form action='apagar.php' name='deletar' method='POST'>
				   <input type='hidden' name='cpf' value='$cpf'> 
				   <input type='submit' name='del' value='DELETAR'></td></form>"
	}
	echo "</table>";
?>
<form action="atualizar.php" method="POST"><input type="submit" value="Atualizar"></form>
<form action="apagar.php" method="POST"><input type="submit" value="Apagar"></form>
<form action="voltar.php" method="POST"><input type="submit" value="Voltar"></form>