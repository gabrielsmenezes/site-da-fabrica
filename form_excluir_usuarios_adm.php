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
			<h1 class="tituloPostPessoa" style="margin-left: 10%">Formulário: exclusão de usuários adm</h1>
			<form action="excluir_user_adm.php" method="POST" enctype="multipart/form-data">
				<p class="categoria_form">Digite o email do administrador a ser excluído.</p>
				<input type="email" name="email" class="campos_cad" placeholder="E-mail">
				<div id="botoes">
					<input type="submit" value="Excluir" class="bt_cad">
					<input type="reset" value="Limpar" class="bt_cad">
				</div>
			</form>

				<div class="botoes">
					<a href="adm.php" class="form_link"> Voltar para a página de adm &rarr;</a>
				</div>
		</div>
	</body>
</html>