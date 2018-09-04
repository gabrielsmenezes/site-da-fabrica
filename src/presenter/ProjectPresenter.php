<?php 
    
    class ProjectPresenter {
        
        /**
    	 * Buscas, devolve um array de Projetos, gerado randomicamente
    	 * @param Recebe um limite de Projetos que devem ser retornandos
    	 * @return Array de Projetos
    	 */
    	static public function listRandom( $limit ) {

        	return ProjetoFactory::get()->lista( $limit );

    	}

    	/**
    	 * Buscas, devolve um array de Projetos, com todos os projetos
    	 * @param Recebe um limite de Projetos que devem ser retornandos
    	 * @return Array de Projetos
    	 */
    	static public function listAll() {

        	return ProjetoFactory::get()->lista();

    	}


    	/**
         * Buscas, devolve um Projeto
         * @param Numerico (inteiro), recebe um id do Projeto que devem ser retornando
         * @return Projeto
         */
    	static public function element( $id ) {

        	return ProjetoFactory::get()->getById( $id )[0];

    	}


        static public function update() {

         	if( isset($_POST['nomeProjeto']) && isset($_POST['descricaoProjeto']) && 
        		isset($_POST['descricaoCurtaProjeto']) && $_POST['descricaoCurtaProjeto'] != "" &&
	            $_POST['nomeProjeto'] != "" && $_POST['descricaoProjeto'] != "" ) {

         		$id = $_POST['projectId'];
	            $nomeProjeto = $_POST['nomeProjeto'];
	            $descricaoProjeto = $_POST['descricaoProjeto'];	            
	            $descricaoCurtaProjeto = $_POST['descricaoCurtaProjeto'];

	            if( isset($_FILES['imagemProjeto']) ) {

	            	if( $_FILES['imagemProjeto']['tmp_name'] != "") {

		            	$imagemProjeto = file_get_contents($_FILES['imagemProjeto']['tmp_name']);

		            }	

	            }


	            $arrCol = ["nome", "descricao", "descricaoCurta"];
	            $arrVal = [$nomeProjeto, $descricaoProjeto, $descricaoCurtaProjeto];

	            if( isset($imagemProjeto) ){

	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemProjeto);

	            }

	            ProjetoFactory::get()->updateArray($arrCol, $arrVal, $id);

	            self::redirect("Atualizado com sucesso");

	        } else {

	            self::redirect("Formulário preenchido incorretamente", false);

	        }

        }

        /**
    	 * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
    	 * @param messaga String, uma mesagem de sucesso ou erro.
    	 * @param sucess boolean, o status de sucesso (true) ou erro (false).
    	 */
        private function redirect( $message, $success = true, $route = "../projetos" ) {

        	if( $success ) {

        		$_SESSION['msgProjetos'] = $message;
            	header('Location: '. $route);

        	} else {

        		$_SESSION['msgProjetos'] = $message;
            	header('Location: ' . $route);

        	}
        	

        }

        static public function insert() {    

        	if( isset($_POST['nomeProjeto']) && isset($_POST['descricaoProjeto']) && isset($_FILES['imagemProjeto']) && 
        		isset($_POST['descricaoCurtaProjeto']) && $_POST['descricaoCurtaProjeto'] != "" &&
	            $_POST['nomeProjeto'] != "" && $_POST['descricaoProjeto'] != "" && $_FILES['imagemProjeto']['tmp_name'] != "") {


	            $nomeProjeto = $_POST['nomeProjeto'];
	            $descricaoProjeto = $_POST['descricaoProjeto'];	            
	            $descricaoCurtaProjeto = $_POST['descricaoCurtaProjeto'];

	            $imagemProjeto = file_get_contents($_FILES['imagemProjeto']['tmp_name']);

	            $Projeto = new Projeto($nomeProjeto, $imagemProjeto, $descricaoProjeto, $descricaoCurtaProjeto);
	           
	            if( ProjetoFactory::get()->inserir($Projeto) == true ) {

	                self::redirect("Inserido com sucesso");

	            } else {
	                
	                self::redirect("Não foi possível cadastrar", false);

	            }

	        } else {

	            self::redirect("Formulário preenchido incorretamente", false);

	        }
        }

        static function delete() {

        	$id = $_POST['projectId'];

            if( is_numeric($id) ) {

	            $pf = ProjetoFactory::get();
	            $pf->deleteById($id);

	            self::redirect("Removido com sucesso");

        	} else {
        		
        		self::redirect("Não foi possível remover", false);
        	}

        }


        static function edit() {

        	return self::element($_POST['projectId']);

        }

    }
