<?php 

    //include 'render.php';
	///////////////////////////////
	//
	// $_SESSION é unset na view
	// provavelmente tem algum 
	// jeito melhor de fazer isso.
	//
	///////////////////////////////
    
    class EquipeController{
    
        static public function get(){            
           	$af = AlunoFactory::get();
        	$listAlunos = null;
        	$listAlunos = $af->lista();
        	
        }
        static public function editarAluno(){
        	if( !isset($_POST['alunoId']) ){
        		$newURL = '/admin/?pagina=equipe';
                header('Location: '.$newURL);
        	}
        	else{        		
	            $af = AlunoFactory::get();
	        	$aluno = null;
	        	$aluno = $af->getById($_POST['alunoId']);          
	        	Render::render_php( '/views/' . 'editorAluno.php' , $aluno);
        	}
        }
        static public function updateAluno(){
         	if( isset($_POST['nomeAluno']) && isset($_POST['descricaoAluno']) && 
	            $_POST['nomeAluno'] != "" && $_POST['descricaoAluno'] != "" ){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";
         		$id = $_POST['alunoId'];
	            $nomeAluno = $_POST['nomeAluno'];
	            $descricaoAluno = $_POST['descricaoAluno'];	 
	            if( isset($_FILES['imagemAluno']) ){
	            	if( $_FILES['imagemAluno']['tmp_name'] != ""){
		            	$imagemAluno = file_get_contents($_FILES['imagemAluno']['tmp_name']);
		            }	
	            }
	            /*
	            echo $id;
	            echo "<br>";
	            echo $nomeAluno;
	            echo "<br>";
	            echo $descricaoAluno;
	            echo "<br>";
				*/

	            //echo "factory<br>";
	            $factoryAluno = AlunoFactory::get();

	            //echo "adicionar<br>";
	            /*
	            $factoryProjeto->update("nome", $nomeProjeto, $id);
	            $factoryProjeto->update("descricao", $descricaoProjeto, $id);
	            $factoryProjeto->update("descricaoCurta", $descricaoCurtaProjeto, $id);
	            */
	            $arrCol = ["nome", "descricao"];
	            $arrVal = [$nomeAluno, $descricaoAluno];

	            if( isset($imagemAluno) ){
	            	//$factoryProjeto->update("imagem", $imagemProjeto, $id);
	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemAluno);
	            }
	            $factoryAluno->updateArray($arrCol, $arrVal, $id);
	            //echo "fim do metodo";
	            $_SESSION['msgEquipe'] = "Atualizado com sucesso";
	            $newURL = '../equipe';
                header('Location: '.$newURL);

	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEquipe'] = "Formulário preenchido incorretamente";
	            $newURL = '../equipe';
                header('Location: '.$newURL);
	        }
        }
        static public function inserirAluno(){            
        	if( isset($_POST['nomeAluno']) && isset($_POST['descricaoAluno']) && isset($_FILES['imagemAluno']) &&
	            $_POST['nomeAluno'] != "" && $_POST['descricaoAluno'] != "" && $_FILES['imagemAluno']['tmp_name'] != ""){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemAluno']['tmp_name'].":<br>";

	            $nomeAluno = $_POST['nomeAluno'];
	            $descricaoAluno = $_POST['descricaoAluno'];
	            //$imagemAluno = $_FILES['imagemAluno'];

	            $imagemAluno = file_get_contents($_FILES['imagemAluno']['tmp_name']);

	            //echo "criar obj<br>";
	            $aluno = new Aluno();
	            $aluno->addAtributos($nomeAluno, $imagemAluno, $descricaoAluno);

	            //echo "factory<br>";
	            $factoryAluno = AlunoFactory::get();

	            //echo "adicionar<br>";
	            $iError = $factoryAluno->inserir($aluno);
	            if( $iError != null ){
	                /////////////////
	                //debug
	                //
	                //echo $iError;
	            }
	            else{
	                //echo "inserido com sucesso";
	                $_SESSION['msgEquipe'] = "inserido com sucesso";
	                $newURL = '../equipe';
                    header('Location: '.$newURL);
	            }
	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEquipe'] = "Formulário preenchido incorretamente";
	            $newURL = '../equipe';
                header('Location: '.$newURL);
	        }
        }
        static function removerAluno(){
        	$id = $_POST['alunoId'];

        	echo $id;

            if( is_numeric($id) ){
	            $pf = AlunoFactory::get();
	            $pf->deleteById($id);

	            $_SESSION['msgEquipe'] = "removido com sucesso";
		        $newURL = '../equipe';
	            header('Location: '.$newURL);
        	}
        	else{
        		//echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEquipe'] = "";
	            //$newURL = '/admin/?pagina=equipe';
                //header('Location: '.$newURL);
        	}
        }
    }
?>
