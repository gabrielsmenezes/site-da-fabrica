<html>
	<head>
		<title>Site Fábrica de Software</title>
		<link rel="stylesheet" type="text/css" href="css/formato.css">
	</head>
	<body>
		<div id="box_form">
			<h1 class="tituloCadastro" style="margin-left: 10%">Cadastre-se</h1>
			<form action="cadastrar.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="nome" class="campos_cad" placeholder="Nome">
				<input type="email" name="email" class="campos_cad" placeholder="E-mail">
				<input type="password" name="senha" class="campos_cad" placeholder="Senha">
				<input type="password" name="repetesenha" class="campos_cad" placeholder="Confirmar senha">
				<input type="text" name="lembrete" class="campos_cad" placeholder="Lembrete">
				<p class="categoria_form">Selecione uma foto.</p>
				<input type="file" name="foto" class="campos_cad">
				<div id="botoes">
					<input type="submit" value="Cadastrar" class="bt_cad">
					<input type="reset" value="Limpar" class="bt_cad">
				</div>
			</form>

				<div class="botoes">
					<a href="index.php" class="form_link">&larr; Ir para a home</a>
					<p class="p_form">Já possui cadastro? Então clique no link abaixo para fazer login.</p>
					<a href="login.php" class="form_link">Logar</a>
				</div>
		</div>
	</body>
</html>