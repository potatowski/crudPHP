<form name='pesquisa' action='pesquisa.php' method="POST">
	<label>Pesquisar por: </label>
	<select name="opcao" id="opcao">
		<option value="nome" selected>Nome</option>
		<option value="cpf" >CPF</option>
		<option value="numero" >Número</option>
	</select>
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
	<input type="submit" name="consulta" value="Enviar">
</form>