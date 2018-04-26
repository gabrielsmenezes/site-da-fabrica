<?php
	$projeto = $args;
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
	
	<div  class="proj">
			

			<?php
				
				echo "<h1>".$projeto->getNome()."</h1>";
            	//echo $projeto->getNome() . "<br>";
				$img=base64_encode($projeto->getImagem());
				echo "<img src = \" data:image/JPG;charset=utf8;base64,";
	            echo $img;
	            echo "\"  />";

	            echo "<div align=\"center\" class =\"descricaoProj\" >";

	            echo "" . $projeto->getDescricao() . "";

	            echo "</div>";
	            echo "<br>";
	            
			?>




			<!--
			<img src="Imagens/imagem.jpg" alt="t5" />

			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  t2 Suspendisse cursus, neque sit amet feugiat viverra, eros arcu luctus enim, non luctus dolor tortor eget nibh. Aenean facilisis dolor dui, at finibus metus rutrum vel. Donec vitae nulla porta, ornare diam a, vulputate nisl. Sed ullamcorper massa fermentum elit efficitur malesuada. Cras ut nulla euismod, imperdiet leo id, tempor metus. Suspendisse in placerat leo, non accumsan neque. Vestibulum vel ultricies velit. Curabitur viverra ipsum quis orci accumsan cursus. Vivamus pharetra lobortis lectus non fermentum. Nunc vel metus scelerisque, pharetra sapien sit amet, ultrices lacus. Cras tincidunt semper molestie. Nullam aliquam finibus mauris quis tristique. Suspendisse vel nulla id ex consequat condimentum. Integer at rutrum purus, vitae malesuada ex. Aenean semper lacus pharetra eros tincidunt bibendum eget eget sapien. Vestibulum justo erat, auctor vitae gravida non, pharetra ac sem. 
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit.  t2 Suspendisse cursus, neque sit amet feugiat viverra, eros arcu luctus enim, non luctus dolor tortor eget nibh. Aenean facilisis dolor dui, at finibus metus rutrum vel. Donec vitae nulla porta, ornare diam a, vulputate nisl. Sed ullamcorper massa fermentum elit efficitur malesuada. Cras ut nulla euismod, imperdiet leo id, tempor metus. Suspendisse in placerat leo, non accumsan neque. Vestibulum vel ultricies velit. Curabitur viverra ipsum quis orci accumsan cursus. Vivamus pharetra lobortis lectus non fermentum. Nunc vel metus scelerisque, pharetra sapien sit amet, ultrices lacus. Cras tincidunt semper molestie. Nullam aliquam finibus mauris quis tristique. Suspendisse vel nulla id ex consequat condimentum. Integer at rutrum purus, vitae malesuada ex. Aenean semper lacus pharetra eros tincidunt bibendum eget eget sapien. Vestibulum justo erat, auctor vitae gravida non, pharetra ac sem. 
			</p>
			-->
		
		
	</div>

	
	
	<?php include_once "footer.php";?>
</div>

</body>
</html>
