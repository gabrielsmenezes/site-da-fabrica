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

$consulta = mysqli_query($link, "SELECT * FROM tb_postagenseditais");

?>

<div id="box_form">
<h1 class="tituloPostPessoa" style="margin-left: 10%">Editais abertos</h1>
<table border = "1">
	<tr>
	<td>Edital</td>
	<td>Nome</td>
	</tr>
	<?php while($dados = mysqli_fetch_array($consulta)){ ?>
	<tr>
	<td><?php echo $dados['id_post']; ?></td>
	<td><?php echo $dados['nome']; ?></td>
	</tr>
	<?php }; ?>
</table>
	<div class="botoes">
		<a href="adm.php" class="form_link"> Voltar para a página adm &rarr;</a>
	</div>
</div>
	
