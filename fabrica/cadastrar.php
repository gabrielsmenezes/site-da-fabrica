<?php
//arquivo de cadastro.
//incluindo o arquivo de conexao.
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



//Variaveis que recebem valores do formulario de cadastro.
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$resenha = $_POST['repetesenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];
$tamanho_foto = $_FILES['foto']['size'];
$arquivo_foto = $_FILES['foto']['tmp_name'];


//Substituição de caracteres indesejados
include "substituicao.php";

//Variável registro que será usada para ver se usuário está ou não habilitado a fazer o cadastro.
$registro = false;
if($nome != "" && $email != "" && $senha != "" && $lembrete != "" && $foto != ""){
			if($senha != $resenha){
				echo "<script>alert('Senhas diferentes');window.history.go(-1);</script>";
			}else{
				//habilitando o usuário para realizar o cadastro.
				$registro = true;
			}
}else{
	echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1);</script>";
}



//Verificando os formatos permitidos para upload.
$formatos = array(1=>'image/png', 2=>'image/jpg', 3=>'image/jpeg', 4=>'image/gif');
$teste = array_search($tipo, $formatos);

//Consulta que traz o id do usuário.
$sql = mysqli_query($link, "SELECT * FROM tb_user ORDER BY id_user DESC LIMIT 1");
while($line = mysqli_fetch_array($sql)){
	$id = $line['id_user'];
	$email_user = $line['email'];
}

//Cadastrando um novo usuário e direcionando ele para a tela principal.
if($registro == true && $email != @$email_user && $teste == true && $arquivo_foto != "none"){
	$fp = fopen($arquivo_foto, "rb");
      	$conteudo = fread($fp, $tamanho_foto);
     	$conteudo = addslashes($conteudo);
      	fclose($fp);

	mysqli_query($link, "INSERT INTO tb_user(nome, email, senha, lembrete, nome_foto, tamanho_foto, tipo_foto, foto, nivel) VALUES
('$nome', '$email', '$senha', '$lembrete', '$foto', '$tamanho_foto', '$tipo', '$conteudo' , 0)");
	echo "<p style='text-align: center; color: #333; padding: 5px;'>Usuário cadastrado com sucesso!<br>";
	echo "<a href='index.php' style='color: #59f'>Ir para home</a> | <a href= 'login.php' style= 'color: #59f'>Login</a>";
	echo "</p>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
}else{
	header('location:index.php');
}


?>