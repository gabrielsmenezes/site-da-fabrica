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
		echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1);</script>";
	}


	$sql = mysqli_query($link, "SELECT * FROM tb_postagensprojetos WHERE nome = '$nome' AND categoria = '$categoria'");
	while($line = mysqli_fetch_array($sql)){
		$id_post = $line['id_post'];
		$imagem = $line['imagem'];
		
	}

	$pasta = "postagens_projetos/post$id_post";
	//echo $pasta;


	if(file_exists($pasta)){
		unlink($pasta.'/'.$imagem);
		rmdir($pasta); //A pasta será deletada.
	}
	

	if($registro == true){
		mysqli_query($link, "DELETE FROM tb_postagensprojetos WHERE nome = '$nome' AND categoria = '$categoria'");
		
		echo "<p style='text-align: center; color: #333; padding: 5px;'>Projeto deletado com sucesso!<br>";
		echo "<a href='form_excluir_projetos.php' style='color: #59f'>Voltar para o formulário</a>";
		echo "</p>";

	}else{
		echo "Não foi possível excluir esse projeto<br>";
		echo "<a href= form_excluir_projetos.php>Voltar ao formulário</a>";
	}
	
}else{
	header('location:index.php');
}

?>