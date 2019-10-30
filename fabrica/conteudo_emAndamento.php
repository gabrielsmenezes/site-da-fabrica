	<?php
	include "connect.php";

	$qtd_registros = 10;
	@$page = $_GET['page'];
	if(!$page){
		$pagina = 1;
	}else{
		$pagina = $page;
	}

	$inicio = $pagina - 1;
	$inicio = $inicio * $qtd_registros;
	$sel_parcial = mysqli_query($link, "SELECT * FROM tb_postagensprojetos WHERE categoria = 0 LIMIT $inicio, $qtd_registros");
	$sel_total = mysqli_query($link, "SELECT * FROM tb_postagensprojetos WHERE categoria = 0");

	$contar = mysqli_num_rows($sel_total);
	$contar_pages = $contar/$qtd_registros;
	//echo $contar_pages;
	?>
	<div class="container">
		<div class="container mb-5">
			<h1 class="tituloProfessor">Projetos em Andamento</h1>
		</div>

		<div class="container">

			<?php
			while($line = mysqli_fetch_array($sel_parcial)){
				$imagem = $line['imagem'];
				$nome = $line['nome'];
				$descricao = $line['descricao'];
				$id_post = $line['id_post'];


			?>

			<div class="row">
				<div class="col">
					<img src="data:image/jpeg;base64, <?php echo base64_encode($imagem);?> " width=150px>
				</div>
				<div class="col-10">
					<p class="nome3"><?php echo $nome;?></p>
					<p class="funcao"><?php echo $descricao;?></p>
				</div>
				
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
	</div>