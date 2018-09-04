
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
				<script>
					function alterna(id) {
						if(document.getElementById("areaPdf_"+id).hidden == ""){
						    //alert(document.getElementById("pdfButton").display);
						    document.getElementById("areaPdf_"+id ).hidden = "hidden";
						    document.getElementById("pdfButton_"+id).innerHTML="Mostrar PDF";
						}
						else{
						    //alert(document.getElementById("pdfButton"));
							document.getElementById("areaPdf_"+id).hidden = "";
						    document.getElementById("pdfButton_"+id).innerHTML="Ocultar PDF";
						}							
					}
				</script>
				<h1>Lista de editais</h1>

				<?php  	

				
				foreach ($args as $edital) {
					echo "<div>";
		            echo "<h2>" .$edital->getTitulo() . "</h2>";
		            //aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	                $pdf=base64_encode($edital->getArquivo());
	               	echo "<div hidden id=\"areaPdf_". $edital->getId() ."\">";
	                echo "<br><embed  src = \" data:application/pdf;charset=utf8;base64,  ";
	                echo  $pdf;
	                echo  " \" width=\"800\" height=\"600\" />";
	                echo "</div>";
	                echo "<div class=\"informacoes\">";
		            echo "" . $edital->getDescricao() . "";
		            echo "</div>";
		            echo "<form action='editais/remover' method='post'>
		           				<input type=\"hidden\" name=\"editalId\" value=". $edital->getId() .">
		           				<button class='edit'   type='submit' name='editEdital' formaction='editais/editar' />Editar</button>
		           				<button class = \"showButton\" type=\"button\" id=\"pdfButton_".$edital->getId()."\"
		           											 onclick=\"alterna(". $edital->getId() .")\">
		           					Mostrar PDF
		           				</button>

								<button hidden class = \"testButton\" type=\"submit\" formaction='/admin/?pagina=pdfViewer'>
			           					Abrir pdf
			           			</button>

		           				<button type='submit'>Deletar</button>";

		            
		            echo "</form>";
		            /*
		            	<button  class = \"testButton\" type=\"submit\" formaction='/admin/?pagina=pdfViewer'>
		           					Abrir pdf
		           				</button>
		            */
		        
					echo "</div>";
			

				}

				?>
				
				<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
	            <script src="/public/js/pt_BR.js"></script>
	            <script>tinymce.init({ selector:'textarea' , plugins: [
	    							'advlist autolink charmap preview',
	    							'searchreplace visualblocks code',
								    'paste code help'
								  	],
								  	height : "200",
								  	width  : "40%"});
	            </script>
				
				<h2>Cadastro de edital</h2>
				<form class = "justified" action="editais/cadastrar" method="POST" enctype="multipart/form-data">
				    
					<div align='center'>

				    	<input class = "heighttext" type="text" placeholder="Título do Edital"  style="text-align: center"  name="tituloEdital" size="42" > <br> <br>
				    	<textarea  class = "justified" placeholder="Descrição" name="descricaoEdital" id = "descricaoEdital">
				    		<br><p style="text-align: center;">Descri&ccedil;&atilde;o do Edital</p>
				    	</textarea><br>
				    </div>
				    <label>File: </label>   <input  type="file" name="arquivoEdital"  /><br> <br>
				    <button type="submit" name="cadastroEdital" />Cadastrar</button>
				</form>
				<?php
					if( isset($_SESSION['msgEdital']) ){	
						echo $_SESSION['msgEdital'];
						unset($_SESSION['msgEdital']);
					}
				?>


			</div>

		</div>


	</body>

</html>
