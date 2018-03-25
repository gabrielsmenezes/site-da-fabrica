<?php
	$pdfArchive = $args[0]->getArquivo();
	$pdfArchive=base64_encode($pdfArchive);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta charset="utf-8">
		<title>PDF Viewer</title>
		<meta name="author" content="Edison Borghezan">
		<meta name="robots" content="all">
		<link rel="stylesheet" media="screen" href="/views/pdf.css">
	<body>	

		<?php
		

	        echo 	"<embed class=\"pdf\"  src = \" data:application/pdf;charset=utf8;base64,  ";
	        echo 		$pdfArchive;
	        echo  	" \" />";

		?>

	</body>

</html>
