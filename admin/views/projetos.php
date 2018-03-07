
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="../views/CSS/login.css">
	</head>

	<body>
		<h2>Projetos</h2>
		<?php  	

		
		foreach ($args as $projeto) {
            echo $projeto->getNome() . "<br>";
			$img=base64_encode($projeto->getImagem());
			echo "<img src = \" data:image/JPG;charset=utf8;base64,";
            echo $img;
            echo "\"  />";
            echo "<form action='/admin/?pagina=postRemove' method='post'>
           				<input type=\"hidden\" name=\"removeId\" value=". $projeto->getId() .">
                        <button type='submit'>Deletar</button>
                  </form>";
            echo "<br>" . $projeto->getDescricao() . "<br><br>";
		}
		
		?>
		<h2>Cadastro de Projeto</h2>
		<form action="/admin/?pagina=inserirProjeto" method="POST" enctype="multipart/form-data">
		    
		    <input type="text" placeholder="Nome do projeto" name="nomeProjeto"> <br>
		    <input type="text" placeholder="Descrição do projeto" name="descricaoProjeto"> <br>
		    <label>File: </label>   <input type="file" name="imagemProjeto"  /><br> 
		    <input type="submit" value = "salvar" name="buttonProjeto" />
		</form>
		<?php
			if( isset($_SESSION['msgProjetos']) ){	
				echo $_SESSION['msgProjetos'];
				unset($_SESSION['msgProjetos']);
			}
		?>


	</body>

</html>
	