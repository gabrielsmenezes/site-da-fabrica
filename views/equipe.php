
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="views/CSS/login.css">
	</head>

	<body>
		<h2>Lista de alunos</h2>

		<?php  	

		
		foreach ($args as $aluno) {


            echo $aluno->getNome() . "<br>";
			$img=base64_encode($aluno->getImagem());
			echo "<img src = \" data:image/JPG;charset=utf8;base64,";
            echo $img;
            echo "\"  />";
            echo "<br>" . $aluno->getDescricao() . "<br><br>";
		}
		
		?>

		<h2>Cadastro de aluno</h2>
		<form action="?pagina=inserirAluno" method="POST" enctype="multipart/form-data">
		    
		    <input type="text" placeholder="Nome completo" name="nomeAluno"> <br>
		    <input type="text" placeholder="Descrição" name="descricaoAluno"> <br>
		    <label>File: </label>   <input type="file" name="imagemAluno"  /><br> 
		    <input type="submit" value = "salvar" name="cadastroAluno" />
		</form>
		<?php
			if( isset($_SESSION['msgEquipe']) ){	
				echo $_SESSION['msgEquipe'];
				unset($_SESSION['msgEquipe']);
			}
		?>


	</body>

</html>
