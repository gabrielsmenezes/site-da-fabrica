
<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="views/CSS/login.css">
	</head>

	<body>
		<?php

		if( isset($_SESSION['erroLogin']) ){
			echo $_SESSION['erroLogin']; 
		}
		//echo $args; 
		?>

		<div class="center">
			<form method="post" action="/admin/?pagina=login">
				<label>Usuário :</label>
				<input type = "text" name = "login"><br>
				<label>	Senha   :  </label>
				<input type = "password" name = "senha"> <br>
				<button type = "submit"> Enviar </button> <br>
			</form>
		</div>
	</body>

</html>
