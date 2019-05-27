<div id="conteudo_editais">
	<h1 class="tituloAluno">Editais</h1>

	<?php
	include "connect.php";

	$qtd_registros = 2;
	@$page = $_GET['page'];
	if(!$page){
		$pagina = 1;
	}else{
		$pagina = $page;
	}

	$inicio = $pagina - 1;
	$inicio = $inicio * $qtd_registros;
	$sel_parcial = mysqli_query($link, "SELECT * FROM tb_postagenseditais ORDER BY id_post DESC LIMIT $inicio, $qtd_registros");
	$sel_total = mysqli_query($link, "SELECT * FROM tb_postagenseditais");

	$contar = mysqli_num_rows($sel_total);
	$contar_pages = $contar/$qtd_registros;
	//echo $contar_pages;

	while($line = mysqli_fetch_array($sel_parcial)){
		$arquivo = $line['arquivo'];
		$nome = $line['nome'];
		$descricao = $line['descricao'];
		$id_post = $line['id_post'];

	?>

	<div class="posts_editais">
		<p class="edital"><?php echo $descricao;?></p>
		<p><a href="ver_arquivo.php?codigo=<?php echo $id_post;?>" class="link_edital" target="_blanck"><?php echo $nome;?></a></p>
	</div>

	<?php
	}

	$anterior = $pagina - 1;
	$proximo = $pagina + 1;

	echo "<br><br>";
	if($pagina > 1){
		echo "<a href=?page=$anterior class = 'paginacao'> &larr; Anterior</a>";
	}

	for($i = 1; $i < $contar_pages + 1; $i++){
		echo "<a href=?page=".$i." class= 'paginacao'>".$i."</a>";
	}


	if($pagina < $contar_pages){
		echo "<a href=?page=$proximo class = 'paginacao'>  Próximo &rarr; </a>";
	}

	?>
	
</div>