
	<?php include "connect.php";

$qtd_registros = 20;
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


	?>

	<div class='container'>
			<div class="container">
				<h1 class="tituloProfessor">Alunos</h1>
			</div>

		<div class="album py-5 bg-light">
		
			<div class='row'>

				<?php
				while($line = mysqli_fetch_array($sel_parcial)){
					$imagem = $line['imagem'];
					$nome = $line['nome'];
					$descricao = $line['descricao'];
					$id_post = $line['id_post'];
				?>

					<div class="col-md-3">
						<div class="card mb-4 box-shadow p-3 m-3">
							<img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($imagem);?>" width=175 height=auto>
							<div class="card-body">
								<div class="card-text">
									<p class="nome3"><?php echo $nome;?></p>
									<p class="funcao"><?php echo $descricao;?></p>	
								</div>
							
							</div>
							
						</div>
						
					</div>
				
				<?php }
				
			echo '</div>';


				$anterior = $pagina - 1;
				$proximo = $pagina + 1;?>
				

			<div class='row'>
				<div class="ml-auto">
					<?php
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
		</div>	
</div>
