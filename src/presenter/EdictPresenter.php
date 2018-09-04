<?php 
    
    class EdictPresenter {
    
    	private static $attributes = array('titulo', "arquivo", "descricao");
        
        /**
    	 * Buscas, devolve um array de Editais randomicamente
    	 * @param Recebe um limite de Editais que devem ser retornandos
    	 * @return Array de Editais
    	 */
    	static public function lista( $limit ) {

        	return EditalFactory::get()->listaOrdId( 

        		$limit, self::$attributes

        	);

    	}

    	/**
    	 * Buscas, devolve um array de Editais, com todos os projetos
    	 * @param Recebe um limite de Editais que devem ser retornandos
    	 * @return Array de Editais
    	 */
    	static public function listAll() {

        	return EditalFactory::get()->lista(

        		null, self::$attributes

        	);

    	}

    	/**
    	 * Buscas, devolve um Projeto
    	 * @param Numerico (inteiro), recebe um id do Projeto que devem ser retornando
    	 * @return Projeto
    	 */
    	static public function element( $id ) {

        	return EditalFactory::get()->getById( $id, self::$attributes )[0];

    	}

    	/**
    	 * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
    	 * @param messaga String, uma mesagem de sucesso ou erro.
    	 * @param sucess boolean, o status de sucesso (true) ou erro (false).
    	 */
        private function redirect( $message, $success = true, $route = "../editais" ) {

        	if( $success ) {

        		$_SESSION['msgEquipe'] = $message;
            	header('Location: '. $route);

        	} else {

        		$_SESSION['msgEquipe'] = $message;
            	header('Location: ' . $route);

        	}
        	

        }


        static public function update() {

         	if( isset($_POST['tituloEdital']) && isset($_POST['descricaoEdital']) && 
	            $_POST['tituloEdital'] != "" && $_POST['descricaoEdital'] != "" ) {

         		$id = $_POST['editalId'];
	            $tituloEdital = $_POST['tituloEdital'];
	            $descricaoEdital = $_POST['descricaoEdital'];

	            if( isset($_FILES['arquivoEdital']) ) {

	            	if( $_FILES['arquivoEdital']['tmp_name'] != "") {

		            	$arquivoEdital = file_get_contents($_FILES['arquivoEdital']['tmp_name']);

		            }	

	            }
	            

	            $arrCol = ["titulo", "descricao"];
	            $arrVal = [$tituloEdital, $descricaoEdital];

	            if( isset($arquivoEdital) ) {

	            	array_push($arrCol, "arquivo");
	            	array_push($arrVal, $arquivoEdital);

	            }

	            EditalFactory::get()->updateArray($arrCol, $arrVal, $id);
                self::redirect("Atualizado com sucesso");

	        } else {
	            
	            self::redirect("Formulário preenchido incorretamente", false);
	            
	        }
        }

        static public function insert() {

        	    if( isset($_POST['tituloEdital']) && isset($_POST['descricaoEdital']) && isset($_FILES['arquivoEdital']) &&
	            $_POST['tituloEdital'] != "" && $_POST['descricaoEdital'] != "" && $_FILES['arquivoEdital']['tmp_name'] != "") {

	            $tituloEdital = $_POST['tituloEdital'];
	            $descricaoEdital = $_POST['descricaoEdital'];

	            $arquivoEdital = file_get_contents($_FILES['arquivoEdital']['tmp_name']);

	            $edital = new Edital($tituloEdital, $arquivoEdital, $descricaoEdital);

	            if( EditalFactory::get()->inserir($edital) == true ) {

                    self::redirect("Inserido com sucesso");

	            }


	        } else {
	            
	            self::redirect("Formulário preenchido incorretamente", false);

	        }

        }

        static function delete() {

        	$id = $_POST['editalId'];

            if( is_numeric($id) ) {

	            EditalFactory::get()->deleteById($id);
	            self::redirect("Removido com sucesso");

        	} else {

	            self::redirect("Formulário preenchido incorretamente", false);

        	}

        }

        static function showEditalById(){
        	$id = $_POST['editalId'];


            if( is_numeric($id) ){
	            $ef = EditalFactory::get();
	            $pdfDoc = $ef->getById($id);
        		Render::render_php( 'views/' . 'pdfViewer.php' , $pdfDoc); 
        	}
        	else{
	            $_SESSION['msgEdital'] = "";
	            $newURL = '../editais';
                header('Location: '.$newURL);
        	}
        }

    }
