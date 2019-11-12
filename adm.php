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
		<div id="box_adm">
			<h1 class="tituloADM">Usuário logado como: <?php echo $login; ?></h1> 
			<img src="data:image/jpeg;base64, <?php echo base64_encode($foto);?>" style="float:right; width: 80px; height: auto; margin: -60px 5px 0 0;"/>
					<ul class="links_adm">
						<li><a href="form_listagem_pessoas.php">Listar membros</a></li>
						<li><a href="form_postagem_pessoas.php">Criar novo membro</a></li>
						<li><a href="form_excluir_pessoas.php">Excluir membro</a></li>
						<li><a href="form_listagem_projetos.php">Listar projetos</a></li>
						<li><a href="form_postagem_projetos.php">Criar novo projeto</a></li>
						<li><a href="form_excluir_projetos.php">Excluir projeto</a></li>
						<li><a href="form_listagem_editais.php">Listar editais</a></li>
						<li><a href="form_postagem_editais.php">Criar novo edital</a></li>
						<li><a href="form_excluir_editais.php">Excluir edital</a></li>
						<li><a href="form_listagem_user.php">Listar usuários adm</a></li>
						<li><a href="form_Cad_astro_fabr_ica_2019_1.php">Adicionar usuários adm</a></li>
						<li><a href="form_excluir_usuarios_adm.php">Excluir usuários adm</a></li>
						<li><a href="index.php">Ir para home</a></li>
						<li><a href="logout.php">Sair</a></li>
					</ul>
				</nav>
		</div>
	</body>
</html>