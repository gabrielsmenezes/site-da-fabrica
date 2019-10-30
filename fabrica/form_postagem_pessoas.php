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
			<h1 class="tituloPostPessoa" style="margin-left: 10%">Formulário: postagem de pessoas</h1>
			<form action="postar_pessoas.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="nome" class="campos_cad" placeholder="Digite o nome da pessoa">
				<textarea name="descricao" class="campos_cad" wrap="hard" placeholder="Digite a descrição dessa pessoa aqui em até 300 caracteres..." 
				style="height: 200px" maxlength="600"></textarea>
				<p class="categoria_form">Selecione 0 se for um professor, 1 caso seja um aluno e 2 para egressos.</p>
				<input type="number" name="categoria" min="0" max="2" class="campos_cad" placeholder="Selecione valor 0, 1 ou 2">
				<p class="categoria_form">Selecione uma foto.</p>
				<input type="file" name="foto" class="campos_cad">
				<div id="botoes">
					<input type="submit" value="Publicar" class="bt_cad">
					<input type="reset" value="Limpar" class="bt_cad">
				</div>
			</form>

				<div class="botoes">
					<a href="adm.php" class="form_link"> Voltar para a página de adm &rarr;</a>
				</div>
		</div>
	</body>
</html>