

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Fábrica de Software - UFMS</title>
	
	<link rel="shortcut icon" href="Imagens/favicon.png">
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

<span id="inicio"> </span>

<header>
</header>

<div id="sticky-anchor"></div>
<nav>
	<a href="../"> Volte ao Início </a>
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

				
				foreach ($editais as $edital) {
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
		            echo "
		           				
		           				<button class = \"showButton\" type=\"button\" id=\"pdfButton_".$edital->getId()."\"
		           											 onclick=\"alterna(". $edital->getId() .")\">
		           					Mostrar PDF
		           				</button>

								<button hidden class = \"testButton\" type=\"submit\" formaction='/admin/?pagina=pdfViewer'>
			           					Abrir pdf
			           			</button>";

		            
		            /*
		            	<button  class = \"testButton\" type=\"submit\" formaction='/admin/?pagina=pdfViewer'>
		           					Abrir pdf
		           				</button>
		            */
		        
					echo "</div>";
			

				}

				?>
				
			

			</div>

		</div>


</body>
</html>
