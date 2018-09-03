<?php 
/**
 * Presenter responsável pelas views das equipes.
 * @author Gian Fonseca
 * @version 2.0.0
 */
    class TeamPresenter {
    	
    	/**
    	 * Buscas, ordena e devolve um array de alunos
    	 * @return Array de Alunos
    	 */
    	static public function listAll() {

        	return AlunoFactory::get()->listaOrd();

    	}


    	/**
    	 * Inseri um novo aluno
    	 */
    	static public function insert() {

        	if( self::fieldValid() ) {

	            $nomeAluno = $_POST['nomeAluno'];
	            $descricaoAluno = $_POST['descricaoAluno'];
	  
	            $imagemAluno = file_get_contents($_FILES['imagemAluno']['tmp_name']);
	           
	            $aluno = new Aluno($nomeAluno, $imagemAluno, $descricaoAluno);

	            $factoryAluno = AlunoFactory::get();

	            if( $factoryAluno->inserir( $aluno ) === true ) {

	                self::redirect("inserido com sucesso");

	            } else {

	            	self::redirect("não foi possível cadastrar aluno", false);

	            }

	        } else {

                self::redirect("Formulário preenchido incorretamente", false);

	        }

        }

        private function fieldValid() {

        	return (

        		isset($_POST['nomeAluno']) && 
        		isset($_POST['descricaoAluno']) && 
        		isset($_FILES['imagemAluno']) &&
	            $_POST['nomeAluno'] != "" && 
	            $_POST['descricaoAluno'] != "" && 
	            $_FILES['imagemAluno']['tmp_name'] != ""

	        );

        }

        /**
    	 * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
    	 * @param messaga String, uma mesagem de sucesso ou erro.
    	 * @param sucess boolean, o status de sucesso (true) ou erro (false).
    	 */
        private function redirect( $message, $success = true ) {

        	if( $success ) {

        		$_SESSION['msgEquipe'] = $message;
            	$newURL = '../equipe';
            	header('Location: '.$newURL);

        	} else {

        		$_SESSION['msgEquipe'] = $message;
            	$newURL = '../equipe';
            	header('Location: '.$newURL);

        	}
        	

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
