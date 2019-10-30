<?php
include "connect.php";
SESSION_START();//Inicia ou recupera uma sessão que está em aberto.
if(isset($_SESSION['login']) && isset($_SESSION['password'])){
	$login = $_SESSION['login'];//email do usuário.
	$senha_log = $_SESSION['password'];//password do usuário.
}else{
	header('location:index.php');
}
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)){
	$senha = $line['senha'];
	$nivel = $line['nivel'];
	$foto = $line['foto'];
	$id = $line['id_user'];
}
if($senha_log == $senha && $nivel == 0){
	
}else{
	header('location:index.php');
}

?>

<html>
	<head>
		<title>Site Fábrica de Software</title>
		<link rel="stylesheet" type="text/css" href="css/formato.css">
	</head>
	<body>
		<div id="box_form">
			<h1 class="tituloCadastro" style="margin-left: 10%">Cadastrar</h1>
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
					<a href="adm.php" class="form_link"> Voltar para a página de adm &rarr;</a>
				</div>
		</div>
	</body>
</html>