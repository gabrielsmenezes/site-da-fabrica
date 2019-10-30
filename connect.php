<?php
//arquivo de conexão com o banco
//my_sqli_connect
// $host = "localhost";
// $user = "fabrica";
// $pass = "wisestrong777$";
// $db = "fabricadb";


$host = "ec2-174-129-253-157.compute-1.amazonaws.com";
$user = "jvtuzthaeucpsz";
$pass = "35b0b249829ac3baebd0c8c5686643e92ce7fcd9c4c1674f4d2e6d8719ba1472";
$db = "d5no3hdho5ufur";

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