<div id="conteudo_alunos_membros">
	<h1 class="tituloAluno">Alunos</h1>
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
	$sel_parcial = mysqli_query($link, "SELECT * FROM tb_postagenspessoas WHERE categoria = 1 LIMIT $inicio, $qtd_registros");
	$sel_total = mysqli_query($link, "SELECT * FROM tb_postagenspessoas WHERE categoria = 1");

	$contar = mysqli_num_rows($sel_total);
	$contar_pages = $contar/$qtd_registros;
	//echo $contar_pages;

	while($line = mysqli_fetch_array($sel_parcial)){
		$imagem = $line['imagem'];
		$nome = $line['nome'];
		$descricao = $line['descricao'];
		$id_post = $line['id_post'];

	?>

	<div class="posts_alunos">
		<img src="postagens_pessoas/<?php echo "post".$id_post."/".$imagem;?>" class="imagem">
		<p class="nome"><?php echo $nome;?></p>
		<p class="curso"><?php echo $descricao;?></p>
	</div>

	<?php
	}

	$anterior = $pagina - 1;
	$proximo = $pagina + 1;

	echo "<br><br>";
	if($pagina > 1){
		echo "<a href=?page=$anterior> &larr; Anterior</a>";
	}

	for($i = 1; $i < $contar_pages + 1; $i++){
		echo "<a href=?page=".$i.">".$i."</a>";
	}


	if($pagina < $contar_pages){
		echo "<a href=?page=$proximo>  Próximo &rarr; </a>";
	}

	?>
	
	
</div>