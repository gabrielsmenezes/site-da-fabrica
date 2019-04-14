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




//Consulta que traz o id do usuário.
$sql = mysqli_query($link, "SELECT * FROM tb_user ORDER BY id_user DESC limit 1");
while($line = mysqli_fetch_array($sql)){
	$id = $line['id_user'];
	$email_user = $line['email'];
}



@$id = $id + 1;
$pasta = "user".$id;//Sempre incrementará o id do usuário para criação de uma nova pasta.


//Verificando se a pasta existe.
//Verificando os formatos permitidos para upload.
$formatos = array(1=>'image/png', 2=>'image/jpg', 3=>'image/jpeg', 4=>'image/gif');
$teste = array_search($tipo, $formatos);
if(file_exists("user/".$pasta) || $email == @$email_user){
	//echo "<script>alert('Essa pasta já existe!');</script>";
	//rmdir($pasta);
}else if($registro == true && $teste == true){
	mkdir("user/".$pasta, 0777);
	//echo "<script>alert('A pasta ".$pasta." foi criada com sucesso!');</script>";
}


//Substituição de caracteres indesejados
include "substituicao.php";




if($teste == true){
	move_uploaded_file($_FILES['foto']['tmp_name'], "user/".$pasta."/".$foto);
}else{
	echo "<script>alert('Tipo de arquivo não suportado');</script>";
}




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


?>