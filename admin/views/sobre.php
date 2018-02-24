
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">

		<meta charset="UTF-8">
		<title>Login</title>
		<!--
	
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 

		<link rel="stylesheet" type="text/css" href="views/CSS/login.css">
		-->
	</head>

	<body>
		<br>
		<form method="post" action ="/admin/?pagina=updateSobre">


			<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
            <script src="/public/js/pt_BR.js"></script>
            <script>tinymce.init({ selector:'textarea' , plugins: [
    							'advlist autolink lists link image charmap print preview anchor textcolor',
    							'searchreplace visualblocks code fullscreen',
							    'insertdatetime media table contextmenu paste code help'
							  	],
							  	height : "350"});
                var teste = function(){
                    var p = tinyMCE.activeEditor.getContent();
                    var e = document.getElementById('sobre');
                    e.value = '';
                    e.value = p;
                }
            </script>

			<textarea class="form-control" id="sobre" name="sobre"><?php  echo $args;  ?></textarea><br>
			<button type="submit">Enviar</button>
		</form>


	</body>

</html>
