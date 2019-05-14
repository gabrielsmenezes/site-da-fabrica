<?php
//Arquivo logar.php
include "connect.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

if($email != "" && $senha != ""){
	//echo "Usuário está logado";
	$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");
	$registro = mysqli_num_rows($sql);
	while($line = mysqli_fetch_array($sql)){
		$senha_user = $line['senha'];
		$nivel = $line['nivel'];
	}
	if($registro){
		if($senha_user == $senha){
			SESSION_START();
			$_SESSION['login'] = $email;
			$_SESSION['password'] = $senha;
			if($nivel == 0){
				header('location: adm.php');
			}
		}else{
			echo "Senha não confere com o cadastro.";
			echo "<a href='login.php'>Voltar a tela de login.</a>";
		}
	}else{
		echo "Você não possui cadastro. Deseja se cadastrar?";
		echo "<a href='form_cadastro.php'>Cadastre-se</a>";
	}

}else{
	header('location: login.php?valor=1');
}



?>