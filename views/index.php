
<?php
	$sobre     = $args[0];
	$projetos  = $args[1];
	$alunos    = $args[2];
	$novidades = $args[3];
	$editais   = $args[4];
?>


<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<title>Fábrica de Software - UFMS</title>
	
	<link rel="shortcut icon" href="Imagens/favicon.png">
	<link rel="stylesheet" media="screen" href="views/style.css">
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
				if ($(window).scrollTop() < 225) {
				  $('nav').removeClass('navbar-fixed');
				}
			  });
			});
	</script>

</head>

<body>

<span id=""> </span>

<header>
	
</header>

<div id="sticky-anchor"></div>
<nav>
	<a href="#inicio"> Início </a>
	<a href="#sobre"> Institucional</a>
	<a href="#editais"> Editais </a>
	<a href="#projetos"> Projetos </a>
	<a href="#equipe"> Equipe </a>
	<a href="#editais"> Editais </a>
	
	<!--<a href="#contato"> Busca </a>-->
</nav>

<div class="mainbox">
	<div id="inicio" class="boxwhite">
		

		<div class="news">
		<h1>Ultimas Notícias</h1>
			
			<?php
				// criar ancora
				echo "";
				foreach ($novidades as $novidade) {
					$img=base64_encode($novidade->getImagem());
					
					
					?>
					<div class="new">
			            <h2> <?php echo $novidade->getTitulo()?></h2>
						<?php 
						if($novidade == reset($novidades)){
							?>
						
						<img src="data:image/JPG;charset=utf8;base64,<?php echo $img;?>"/> 
				        <?php 
						}
						echo "" . $novidade->getDescricao();?>
						
						
						
						
					</div>
					<?php
				}
			?>
			
		</div>	
			<br>
			 
			<button><a href="/?pagina=novidades">Ver Mais</a></button>
	</div>









	<div class="box">
		<div id="sobre" class="about">
		<h1>Fábrica de Software da UFMS</h1>
		<p> 
		<img src="Imagens/tech03.png" alt="t2" class="i1"/>
		<?php
			echo $sobre;
		?>

		
		
		</div>
	</div>
	
	
	<div class="boxwhite">
		<div id="editais" class="notices">
		<h1>Editais</h1>
		<div class="notice">
			<ul>
			<?php
				foreach ($editais as $edital) {						
						// criar ancora
						echo "<li>" .$edital->getTitulo() . "</li>";
						echo "";
					}
			?>
			</ul>
		</div>
		<button><a href="/?pagina=editais">Ver Mais</a></button>
		</div>
	</div>
	
	
	
	<div class="box">
		<div id="projetos" class="projects">
			<h1>Projetos</h1>



			
			<?php

				foreach ($projetos as $projeto) {
					echo "<div ";
					
					//if($projeto == reset($projetos))	
					//	echo "class=\"first\"";
					//if($projeto == end($projetos))	
					//	echo "class=\"last\"";
					//else
						echo"class=\"project\"";
					
					
					echo ">";
		            $img=base64_encode($projeto->getImagem());
					echo "<img src = \" data:image/JPG;charset=utf8;base64,";
		            echo $img;
		            echo "\" alt=\"imagem do projeto\" />";
				
					echo "<h3><a href=\"/?pagina=projetoIndividual&number=". $projeto->getId() ."\">". $projeto->getNome() ."</a></h3> </br>";
		            echo "<div class = 'descricao'>";
		            echo "<p>" . $projeto->getDescricaoCurta() . "<p>";
		            //echo "<br> <div>" . $projeto->getDescricao() . "</div><br><br>";
		            echo "</div>";
					echo "<br>";
					echo "</div>";
				}
			?>
			
			
			<br>
		</div>	 
			
			<button><a href="/?pagina=projetos">Ver Mais</a></button>
		
	</div>

	
	<div class="boxwhite">
		<div id="equipe" class="membros">
			<h1>Equipe</h1>
			
			<?php

				foreach ($alunos as $aluno) {
					echo "<div class=\"membro\">";
					$img=base64_encode($aluno->getImagem());
					echo "<img src = \" data:image/JPG;charset=utf8;base64,";
					echo $img;
					echo "\" class=\"eq\" alt=\"imagem do projeto\" />";
					
					echo "<h3>" . $aluno->getNome() . "</h3>";
					echo "<div class = 'descricao'>";
					echo "". $aluno->getDescricao() ."";
					echo "</div>";
					echo "</div>";
				}
			?>
			<br>
		</div>	
			<button><a href="/?pagina=equipe">Ver Mais</a></button>
		
		
	</div>

	
	
	<?php include_once "footer.php";?>
</div>

</body>
</html>
