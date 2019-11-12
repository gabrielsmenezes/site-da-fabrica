<?php
//arquivo logout
SESSION_START();//Inicia ou recupera uma sessão que está em aberto.
unset($_SESSION['login']);
unset($_SESSION['password']);
header('location:login.php');
?>