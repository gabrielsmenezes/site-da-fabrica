
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

		<br><br><br>
		<div class="mainbox">
			<br><br>
			<form method="post" action ="sobre/atualizar">


				<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
	            <script src="/public/js/pt_BR.js"></script>
	            <script>tinymce.init({ selector:'textarea' , plugins: [
	    							'advlist autolink lists link image charmap print preview anchor textcolor',
	    							'searchreplace visualblocks code fullscreen',
								    'insertdatetime media table contextmenu paste code help'
								  	],
								  	height : "350",
								  	width  : "80%"
								  	});
	                var teste = function(){
	                    var p = tinyMCE.activeEditor.getContent();
	                    var e = document.getElementById('sobre');
	                    e.value = '';
	                    e.value = p;
	                }
	            </script>
	            <div align="center">
					<textarea class="form-control" id="sobre" name="sobre"><?php  echo $args;  ?></textarea><br> 
					<button type="submit">Enviar</button>
				</div>
			</form>
		</div>


	</body>

</html>
