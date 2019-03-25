<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$conteudo = $_POST['conteudo'];

//E-mail.
$to = "josaugusto37@gmail.com"; // e-mail do detinatário
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: Jose<josaugusto37@gmail.com>' . "\r\n";
$headers .= 'From: <contato@siteFabricaDeSoftware.com.br>'. "\r\n";
$headers .= 'Reply-To: <contato@siteFabricaDeSoftware.com.br>'. "\r\n";

$envio = mail($to, $assunto, $conteudo, $headers);
if($envio){
	echo "E-mail enviado com sucesso!<br>";
	echo "<a href=index.php>Clique aqui para voltar a tela principal</a>";
}else{
	echo "Erro de envio<br>";
	echo "<a href=contato.php>Voltar a tela de contato</a>";
}

?>