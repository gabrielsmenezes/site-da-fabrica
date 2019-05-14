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
	$categoria = $_POST['categoria'];


	$registro = false;

	if ($nome != "" && $categoria != "") {
		$registro = true;
	}else{
		echo "<script>window.history.go(-1);</script>";
	}


	$sql = mysqli_query($link, "SELECT * FROM tb_postagenspessoas WHERE nome = '$nome' AND categoria = '$categoria'");
	while($line = mysqli_fetch_array($sql)){
		$id_post = $line['id_post'];
		$imagem = $line['imagem'];
		
	}

	$pasta = "postagens_pessoas/post$id_post";
	//echo $pasta;


	if(file_exists($pasta)){
		unlink($pasta.'/'.$imagem);
		rmdir($pasta); //A pasta será deletada.
	}
	

	if($registro == true){
		mysqli_query($link, "DELETE FROM tb_postagenspessoas WHERE nome = '$nome' AND categoria = '$categoria'");

		header('location:form_excluir_pessoas.php');

	}else{
		echo "Não foi possível excluir esse membro<br>";
		echo "<a href= form_excluir_pessoas.php>Voltar ao formulário</a>";
	}
	
}else{
	header('location:index.php');
}

?>