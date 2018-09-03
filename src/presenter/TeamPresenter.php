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
    	 * Buscas, devolve um array de alunos randomicamente
    	 * @param Recebe um limite de alunos que devem ser retornandos
    	 * @return Array de Alunos
    	 */
    	static public function listRandom( $limit ) {

        	return AlunoFactory::get()->lista( $limit );

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
    	 * Retorna os dados de um aluno selecionado.
    	 * @return Aluno, o aluno selecionado pelo id.
    	 */
        static public function edit() {

        	if( !isset($_POST['alunoId']) ) {

                self::redirect("não foi possível editar o aluno", false);

                return null;

        	} 
	        
	        return AlunoFactory::get()->getById($_POST['alunoId'])[0]; 

        }



        /**
    	 * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
    	 * @param messaga String, uma mesagem de sucesso ou erro.
    	 * @param sucess boolean, o status de sucesso (true) ou erro (false).
    	 */
        private function redirect( $message, $success = true, $route = "../equipe" ) {

        	if( $success ) {

        		$_SESSION['msgEquipe'] = $message;
            	header('Location: '. $route);

        	} else {

        		$_SESSION['msgEquipe'] = $message;
            	header('Location: ' . $route);

        	}
        	

        }

        /**
    	 * Controla a atualização dos dados de um aluno especifico.
    	 */
        static public function update() {

         	if( isset($_POST['nomeAluno']) && isset($_POST['descricaoAluno']) && 
	            $_POST['nomeAluno'] != "" && $_POST['descricaoAluno'] != "" ) {

         		$id = $_POST['alunoId'];
	            $nomeAluno = $_POST['nomeAluno'];
	            $descricaoAluno = $_POST['descricaoAluno'];	 

	            if( isset($_FILES['imagemAluno']) ) {

	            	if( $_FILES['imagemAluno']['tmp_name'] != "") {

		            	$imagemAluno = file_get_contents($_FILES['imagemAluno']['tmp_name']);

		            }
	            }

	            $arrCol = ["nome", "descricao"];
	            $arrVal = [$nomeAluno, $descricaoAluno];

	            if( isset($imagemAluno) ) {

	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemAluno);

	            }

	            AlunoFactory::get()->updateArray($arrCol, $arrVal, $id);
                self::redirect("Atualizado com sucesso");

	        } else {

                self::redirect("Formulário preenchido incorretamente", false);

	        }
        }

        /**
    	 * Deleta a um aluno especifico identinficado pelo seu id.
    	 */
        static function delete() {

        	$id = $_POST['alunoId'];

            if( is_numeric($id) ) {

	            AlunoFactory::get()->deleteById($id);
		        self::redirect("Removido com sucesso");

        	} else {

        		self::redirect("Formulário preenchido incorretamente", false);

        	}

        }

    }

