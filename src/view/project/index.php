
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="views/CSS/login.css">
		<meta charset="utf-8">
		<title>Administração Fábrica de Software - UFMS</title>
		
		<link rel="shortcut icon" href="../Imagens/favicon.png">
		<link rel="stylesheet" media="screen" href="/views/style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Jura|Orbitron" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Isabela Andrade">
		<meta name="robots" content="all">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("a").on('click', function(event) {

			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {
			  // Prevent default anchor click behavior
			  event.preventDefault();

			  // Store hash
			  var hash = this.hash;

			  // Using jQuery's animate() method to add smooth page scroll
			  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			  $('html, body').animate({
				scrollTop: $(hash).offset().top
			  }, 800, function(){
		   
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			  });
			} // End if
		  });
		});
		</script>
		
		
		<script>
				$(document).ready(function() {
	  
				  $(window).scroll(function () {
					  //if you hard code, then use console
					  //.log to determine when you want the 
					  //nav bar to stick.  
					  console.log($(window).scrollTop())
					if ($(window).scrollTop() > 220) {
					  $('nav').addClass('navbar-fixed');
					}
					if ($(window).scrollTop() < 221) {
					  $('nav').removeClass('navbar-fixed');
					}
				  });
				});
		</script>
	</head>

	<body>
		<header>
			<!--
			<div class="bordaheader"></div>
			<div class="bordaheader2"></div>
			-->
		</header>
		<div id="sticky-anchor"></div>
		<nav>
			<a href="user-admin"> Volte ao Menu </a>
		</nav>
		<div class="mainbox">
			<div id="caixa" class="projetos">
				<h1>Projetos</h1>
				<?php  	

				
				foreach ($args as $projeto) {

					echo "<div class=\"project\">";
		            echo $projeto->getNome() . "<br>";
					$img=base64_encode($projeto->getImagem());
					echo "<img src = \" data:image/JPG;charset=utf8;base64,";
		            echo $img;
		            echo "\" class = \"proj\"  />";
		            echo "<div class = 'descricao'>";
		            echo "<p>" . $projeto->getDescricao() . "<p>";
		            //echo "<br> <div>" . $projeto->getDescricao() . "</div><br><br>";
		            echo "</div>";
		            echo "  <form action='projetos/remover' method='post'>
		           				<input type=\"hidden\" name=\"projectId\" value=". $projeto->getId() .">		   
		            			<button class='edit'   type='submit' name='editProjeto' formaction='projetos/editar' />Editar</button>
		                        <button class='delete' type='submit'>Deletar</button>
		            		</form>";
					echo "</div>";	
				}
				
				?>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
	            <script src="/public/js/pt_BR.js"></script>
	            <script>tinymce.init({ selector:'textarea#descricaoCurtaProjeto' ,
								    mode : "exact",						
	            					plugins: [
	    							'advlist autolink lists link image charmap print preview anchor textcolor',
	    							'searchreplace visualblocks code fullscreen',
								    'insertdatetime media table contextmenu paste code help'
								  	],
								  	height : "200",
								  	width  : "20%"
								  });
	           			tinymce.init({ selector:'textarea#descricaoProjeto' ,
								    mode : "exact",						
	            					plugins: [
	    							'advlist autolink lists link image charmap print preview anchor textcolor',
	    							'searchreplace visualblocks code fullscreen',
								    'insertdatetime media table contextmenu paste code help'
								  	],
								  	height : "200",
								  	width  : "40%"
								  });
	            	/*
	                var teste = function(){
	                    var p = tinyMCE.activeEditor.getContent();
	                    var e = document.getElementById('descricaoProjeto');
	                    e.value  = '';
	                    e.height = "500";
	                    e.value  = p;
	                }
	                */
	            </script>




				<h1>Cadastro de Projeto</h1>
				<form action="projetos/cadastrar" method="POST" enctype="multipart/form-data">
					<div align='center'>
					    <input class ="projs" type="text" placeholder="Nome do projeto" name="nomeProjeto"  size="42"> <br><br>
					    <textarea class = "justified" placeholder="Descrição curta do projeto" name="descricaoCurtaProjeto" id = "descricaoCurtaProjeto">
				    		<br><p style="text-align: center;">Descri&ccedil;&atilde;o curta do projeto</p>
				    	</textarea><br>
				    	<textarea class = "justified" width= placeholder="Descrição do projeto" name="descricaoProjeto" id = "descricaoProjeto">
				    		<br><p style="text-align: center;">Descri&ccedil;&atilde;o do projeto</p>
				    	</textarea><br>		 
					    <label>File: </label>   <input type="file" name="imagemProjeto"  /><br> <br>

					    
					    <button type="submit" name="buttonProjeto" />Cadastrar</button>
					</div>
				</form>
				<?php
					if( isset($_SESSION['msgProjetos']) ){	
						echo $_SESSION['msgProjetos'];
						unset($_SESSION['msgProjetos']);
					}
				?>

				</div>
		</div>


	</body>

</html>
	