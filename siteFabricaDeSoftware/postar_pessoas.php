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
	$id_user = $line['id_user'];
}
if($senha_log == $senha && $nivel == 0){
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$categoria = $_POST['categoria'];
	$foto = $_FILES['foto']['name'];
	$tipo =  $_FILES['foto']['type'];

	//Substituição de caracteres indesejados
	include "substituicao.php";


	$registro = false;

	if ($nome != "" && $foto != "" && $descricao != "" && $categoria != "") {
		$registro = true;
	}else{
		echo "<script>window.history.go(-1);</script>";
	}

	//Verificando os formatos permitidos para upload.
	$formatos = array(1=>'image/png', 2=>'image/jpg', 3=>'image/jpeg', 4=>'image/gif');
	$teste = array_search($tipo, $formatos);
	
	if($registro == true && $teste == true){
		mysqli_query($link, "INSERT INTO tb_postagenspessoas(imagem, nome, descricao, categoria, id_user) 
			VALUES('$foto', '$nome', '$descricao', '$categoria','$id_user')");

		header('location:form_postagem_pessoas.php');

	}else{
		echo "Não foi possível cadastrar esse conteúdo<br>";
		echo "<a href= form_postagem_pessoas.php>Voltar ao formulário</a>";
	}


	$sql = mysqli_query($link, "SELECT * FROM tb_postagenspessoas ORDER BY id_post DESC LIMIT 1");
	while($line = mysqli_fetch_array($sql)){
		$id_post = $line['id_post'];
	}

	$pasta = "postagens_pessoas/post$id_post";

	if(file_exists($pasta)){
		//echo "Pasta já existe";
	}else if($registro == true && $teste == true){
		mkdir($pasta, 0777); //aqui será criada uma pasta.
	}

	if($teste == true){
		move_uploaded_file($_FILES['foto']['tmp_name'], $pasta."/".$foto);
	}else{
		echo "<script>alert('Tipo de arquivo não suportado');</script>";
	}

	
}else{
	header('location:index.php');
}

?>