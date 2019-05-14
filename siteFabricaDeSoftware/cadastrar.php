<?php
//arquivo de cadastro.
//incluindo o arquivo de conexao.
include "connect.php";




//Variaveis que recebem valores do formulario de cadastro.
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$resenha = $_POST['repetesenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];


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



//Cadastrando um novo usuário e direcionando ele para a tela principal.
if($registro == true && $email != @$email_user && $teste == true){
	mysqli_query($link, "INSERT INTO tb_user(nome, email, senha, lembrete, foto, nivel) VALUES
('$nome', '$email', '$senha', '$lembrete', '$foto', 0)");
	echo "<p style='text-align: center; color: #333; padding: 5px;'>Usuário cadastrado com sucesso!<br>";
	echo "<a href='index.php' style='color: #59f'>Ir para home</a> | <a href= 'login.php' style= 'color: #59f'>Login</a>";
	echo "</p>";
}else{
	echo "<script>window.history.go(-1);</script>";
}

//Consulta que traz o id do usuário.
$sql = mysqli_query($link, "SELECT * FROM tb_user ORDER BY id_user DESC LIMIT 1");
while($line = mysqli_fetch_array($sql)){
	$id = $line['id_user'];
	$email_user = $line['email'];
}

$pasta = "user/user$id";

if(file_exists($pasta)){
	//echo "Pasta já existe";
}else if($registro == true && $teste == true){
	mkdir($pasta, 0777);
}



if($teste == true){
	move_uploaded_file($_FILES['foto']['tmp_name'], $pasta."/".$foto);
}else{
	echo "<script>alert('Tipo de arquivo não suportado');</script>";
}


?>