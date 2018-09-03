
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
				<h1>Novidades</h1>

				<?php
				
				echo "<div>";
				foreach ($args as $novidade) {
					echo "<div class=\"news\">";
			            echo "<div class=\"newsTitle\" > <h2>" .$novidade->getTitulo() . "<h2></div>";
			            //aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
						$img=base64_encode($novidade->getImagem());

						echo "<div class=\"newsSquare\" >";

							echo "<div class=\"newsImg\">";
								echo "<img  src = \" data:image/JPG;charset=utf8;base64,";
					            echo $img;
					            // echo  " \" width=\"400\" height=\"300\" /> ";
					            echo  " \"  /> ";
				                echo "<div class=\"newsTxt\">";
					    		    echo "" . $novidade->getDescricao() . "";
					    		echo "</div>";
					    	echo "</div>";

			            echo "</div>";


			        
					echo "</div>";
					echo "<div class\"testeDiv\">";
			            echo "<form action='novidades/remover' method='post'>
			           				<input type=\"hidden\" name=\"novidadeId\" value=". $novidade->getId() .">
			           				<button class='edit'   type='submit' name='editNovidade' formaction='novidades/editar' />Editar</button>
			           				<button type='submit'>Deletar</button>";
			            
			            echo "</form>";
			        echo "</div>";
			

				}
				echo "</div>";

				?>
				
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
	            <script src="/public/js/pt_BR.js"></script>
	            <script>tinymce.init({ selector:'textarea' , plugins: [
	    							'advlist autolink charmap preview',
	    							'searchreplace visualblocks code',
								    'paste code help'
								  	],
								  	height : "350",
								  	width  : "100%"});
	            </script>
				
				<h2>Postar novidade</h2>
				<form class = "justified" action="novidades/cadastrar" method="POST" enctype="multipart/form-data">
				    
					<div align='center'>

				    	<input class = "heighttext" type="text" placeholder="Título da novidade"  style="text-align: center"  name="tituloNovidade" size="42" > <br> <br>
				    	<textarea  class = "justified" placeholder="Descrição" name="descricaoNovidade" id = "descricaoNovidade">
				    		<br><p style="text-align: center;">Novidade</p>
				    	</textarea><br>
				    </div>
				    <label>Imagem: </label>   <input  type="file" name="imagemNovidade"  /><br> <br>
				    <button type="submit" name="postarNovidade" />Cadastrar</button>
				</form>
				<?php
					if( isset($_SESSION['msgNovidade']) ){	
						echo $_SESSION['msgNovidade'];
						unset($_SESSION['msgNovidade']);
					}
				?>


			</div>

		</div>


	</body>

</html>
