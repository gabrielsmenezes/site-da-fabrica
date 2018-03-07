<?php
	$projetos = $args;
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
	<div class="bordaheader"></div>
	<div class="bordaheader2"></div>
</header>

<div id="sticky-anchor"></div>
<nav>
	<a href="/?pagina=index"> Volte ao Início </a>
</nav>


<div class="caixas">
	
	<div id="caixa" class="projetos">
			<h1>Projetos</h1>
			
			<?php

				foreach ($projetos as $projeto) {
					echo "<div class=\"project\">";
		            $img=base64_encode($projeto->getImagem());
					echo "<img src = \" data:image/JPG;charset=utf8;base64,";
		            echo $img;
		            echo "\" class=\"proj\" alt=\"imagem do projeto\" />";
				
					echo "<h3><a href=\"/?pagina=projetoIndividual&number=". $projeto->getId() ."\">". $projeto->getNome() ."</a></h3> </br>";
			
					

					echo "<p>". $projeto->getDescricao() ."</p>";
					echo "<br>";
					echo "</div>";
				}
			?>
	
		
	</div>

	
	
	<footer>
			
			<div class="me">
			
			<div class="bloco">
			<h2>Links Úteis</h2>
			<ul>
				<li><a href="http://www.sbc.org.br">SBC &#8211; Sociedade Brasileira de Computação</a></li>
				<li><a href="http://fundect.ledes.net">LEDES &#8211; UFMS</a></li>
				<li><a href="http://biblioteca.ufms.br">Biblioteca &#8211; UFMS</a></li>
			</ul>
			</div>
			
			<div class="bloco">
			<h2>Graduação</h2>
			<ul>
				<li><a href="https://www.facom.ufms.br/analise-de-sistemas/">Sistemas de Informação</a></li>
				<li><a href="https://www.facom.ufms.br/ciencia-da-computacao/">Ciência da Computação</a></li>
				<li><a href="https://www.facom.ufms.br/engenharia-de-computacao/">Engenharia de Computação</a></li>
				<li><a href="https://www.facom.ufms.br/engenharia-de-software/">Engenharia de Software</a></li>
				<li><a href="https://www.facom.ufms.br/tecnologia-em-analise-e-desenvolvimento-de-sistemas/">Téc. em Análise e Desenvolvimento de Sistemas</a></li>
			</ul>
			</div>
			
			<div class="bloco">
			<h2>Pós Graduação</h2>
			<ul>
				<li><a href="https://www.facom.ufms.br/mestradoprofissional/">Mestrado Prof. Computação Aplicada</a></li>
				<li><a href="https://www.facom.ufms.br/mestrado-acad-ciencia-da-computacao/">Mestrado Acad. Ciência da Computação</a></li>
				<li><a href="https://www.facom.ufms.br/doutorado-ciencia-da-computacao/">Doutorado Ciência da Computação</a></li>
			</ul>
			</div>
			 
			 <div class="bloco">
			<h2>Oportunidades</h2>
			<ul>
				<li><a href="https://www.facom.ufms.br/vaga-para-programador-before-tecnologia-da-informacao/" title="Vaga para Programador &#8211; Before Tecnologia da Informação">Vaga para Programador &#8211; Before Tecnologia da Informação</a></li>
				<li><a href="https://www.facom.ufms.br/oportunidade-de-estagio-energisa/" title="Oportunidade de estágio &#8211; Energisa">Oportunidade de estágio &#8211; Energisa</a> 
				<li><a href="https://www.facom.ufms.br/resultado-selecao-de-professor-substituto/" title="Resultado Seleção de Professor Substituto">Resultado Seleção de Professor Substituto</a></li>
				<li><a href="https://www.facom.ufms.br/selecao-de-professor-substituto/" title="Seleção de Professor Substituto">Seleção de Professor Substituto</a></li>
				<li><a href="https://www.facom.ufms.br/abre-oferece-estagio-para-redes-de-computadores/" title="Abre oferece estágio para Redes de Computadores">Abre oferece estágio para Redes de Computadores</a></li>
			</ul>
			</div>
			
			</div>
	
		<div class="disclaimer">
			Layout inteiramente desenvolvido por Isabela Andrade Souza. Todos os direitos reservados. <br>
		Plágio é crime de acordo com a Lei Federal dos direitos autorais n°9610.
		</div>
		
	</footer>
</div>

</body>
</html>
