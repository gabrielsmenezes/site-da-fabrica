<?php
include "connect.php";

//recuperar o codigo do arquivo atraves do metodo GET
$codigo = $_GET['codigo'];

 
$consulta = mysqli_query($link, "SELECT * FROM tb_postagenseditais WHERE id_post = $codigo");
 
$line = mysqli_fetch_array($consulta);
$tipo = $line['tipo_arquivo'];
$arquivo = $line['arquivo'];
 
   //EXIBE ARQUIVO  - se o navegador n�o oferecer suporte para a extens�o sera solicita dowload do arquivo
   header("Content-type: ".$tipo."");
   echo $arquivo;

?>