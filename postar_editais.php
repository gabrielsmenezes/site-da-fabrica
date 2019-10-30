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
	$foto = $_FILES['arquivo']['name'];
	$tipo =  $_FILES['arquivo']['type'];
	$tamanho_foto = $_FILES['arquivo']['size'];
	$arquivo_foto = $_FILES['arquivo']['tmp_name'];

	//Substituição de caracteres indesejados
	include "substituicao.php";


	$registro = false;

	if ($nome != "" && $foto != "" && $descricao != "") {
		$registro = true;
	}else{
		echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1);</script>";
	}

	//Verificando os formatos permitidos para upload.
	$formatos = array(1=>'application/pdf');
	$teste = array_search($tipo, $formatos);
	
	if($registro == true && $teste == true){
		$fp = fopen($arquivo_foto, "rb");
      		$conteudo = fread($fp, $tamanho_foto);
     		$conteudo = addslashes($conteudo);
      		fclose($fp);

		mysqli_query($link, "INSERT INTO tb_postagenseditais(nome, descricao, nome_arquivo, tamanho_arquivo, tipo_arquivo, arquivo, id_user) 
			VALUES('$nome', '$descricao', '$foto', '$tamanho_foto', '$tipo', '$conteudo', '$id_user')");

		echo "<p style='text-align: center; color: #333; padding: 5px;'>Edital cadastrado com sucesso!<br>";
		echo "<a href='form_postagem_editais.php' style='color: #59f'>Voltar para o formulário</a>";
		echo "</p>";
	}else{
		echo "Não foi possível cadastrar esse conteúdo<br>";
		echo "<a href= form_postagem_editais.php>Voltar ao formulário</a>";
	}

	
}else{
	header('location:index.php');
}

?>