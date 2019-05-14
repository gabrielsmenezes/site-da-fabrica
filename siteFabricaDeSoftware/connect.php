<?php
//arquivo de conexão com o banco
//my_sqli_connect
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_sitefabrica";

$link = mysqli_connect($host, $user, $pass, $db);
/*$banco = mysqli_connect_errno();
if($banco == true){
	echo "Erro na conexão";
}
else{
	echo "Conexão funcionando";
}
*/
?>