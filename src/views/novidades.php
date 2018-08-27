<?php
	$novidades = $args;
?>


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
	<a href="/?pagina=index"> Volte ao Início </a>
</nav>


<div class="mainbox">
	
	<div class="projects">
			<h1>Novidades</h1>
				
			<?php
				// criar ancora
				echo "";
				foreach ($novidades as $novidade) {
					$img=base64_encode($novidade->getImagem());
					
					
					?>
					<div class="new">
			            <h3>
			            	<!--
			            	<a href="/?pagina=noticiaIndividual&number=<?php echo $novidade->getId() ?>">
			            	-->
			            		<?php echo $novidade->getTitulo() ?>
			            	<!--
			            	</a>
			            	-->	    
			            </h3>
						
						<img src="data:image/JPG;charset=utf8;base64,<?php echo $img;?>"/> 

				        <?php echo "" . $novidade->getDescricao();?>
						
						
						
						
					</div>
					<?php
				}
			?>	


			<?php
				/*
				foreach ($novidades as $novidade) {
					echo "<div class=\"project\">";
		            $img=base64_encode($novidade->getImagem());
					echo "<img src = \" data:image/JPG;charset=utf8;base64,";
		            echo $img;
		            echo "\"  alt=\"imagem do projeto\" />";
				
					echo "<h3><a href=\"/?pagina=novidadeIndividual&number=". $novidade->getId() ."\">". $novidade->getTitulo() ."</a></h3> </br>";
			
					
					echo "<div class = 'descricao'>";
					echo "<p>". $novidade->getDescricao() ."</p>";
					echo "</div>";
					echo "<br>";
					echo "</div>";
				}
				*/
			?>
	
		
	</div>

	
	
	<?php include_once "footer.php";?>
</div>

</body>
</html>
