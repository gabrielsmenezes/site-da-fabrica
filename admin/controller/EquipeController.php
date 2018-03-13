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
        	Render::render_php( 'views/' . 'equipe.php' , $listAlunos);
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
	                $newURL = '/admin/?pagina=equipe';
                    header('Location: '.$newURL);
	            }
	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEquipe'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=equipe';
                header('Location: '.$newURL);
	        }
        }
        static function removerAluno(){
        	$id = $_POST['removeId'];

            if( is_numeric($id) ){
	            $pf = AlunoFactory::get();
	            $pf->deleteById($id);

	            $_SESSION['msgEquipe'] = "removido com sucesso";
		        $newURL = '/admin/?pagina=equipe';
	            header('Location: '.$newURL);
        	}
        	else{
        		//echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEquipe'] = "";
	            $newURL = '/admin/?pagina=equipe';
                header('Location: '.$newURL);
        	}
        }
    }
?>
