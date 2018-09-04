<?php 
	/**
	 * Presenter responsável pelas views das noticias.
	 * @author Gian Fonseca
	 * @version 2.0.0
	 */

    class NoticePresenter {
    

    	/**
    	 * Buscas, ordena e devolve um array de Noticias
    	 * @return Array de Noticias
    	 */
    	static public function listAll() {

        	return NovidadeFactory::get()->listaOrdId();

    	}

    	/**
    	 * Buscas, devolve um array de Noticias randomicamente
    	 * @param Recebe um limite de Noticias que devem ser retornandos
    	 * @return Array de Noticias
    	 */
    	static public function lista( $limit ) {

        	return NovidadeFactory::get()->listaOrdId( $limit );

    	}
        
        /**
    	 * Retorna os dados de um Noticia selecionada.
    	 * @return Noticia, a Noticia selecionada pelo id.
    	 */
        static public function edit() {

        	if( !isset($_POST['novidadeId']) ) {

                self::redirect("não foi possível editar a noticia", false);

                return null;

        	} 
	        
	        return NovidadeFactory::get()->getById($_POST['novidadeId'])[0]; 

        }

        static public function update() {

         	if( isset($_POST['tituloNovidade']) && isset($_POST['descricaoNovidade']) && 
	            $_POST['tituloNovidade'] != "" && $_POST['descricaoNovidade'] != "" ) {

         		$id = $_POST['novidadeId'];
	            $tituloNovidade = $_POST['tituloNovidade'];
	            $descricaoNovidade = $_POST['descricaoNovidade'];	 

	            if( isset($_FILES['imagemNovidade']) ) {

	            	if( $_FILES['imagemNovidade']['tmp_name'] != "" ) {

		            	$imagemNovidade = file_get_contents($_FILES['imagemNovidade']['tmp_name']);

		            }	

	            }

	            $arrCol = ["titulo", "descricao"];
	            $arrVal = [$tituloNovidade, $descricaoNovidade];

	            if( isset($imagemNovidade) ) {

	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemNovidade);

	            }

	            NovidadeFactory::get()->updateArray($arrCol, $arrVal, $id);

	            self::redirect("Atualizado com sucesso");

	        } else {

	           	self::redirect("Formulário preenchido incorretamente", false);

	        }
        }

        static public function insert() {

           if( isset($_POST['tituloNovidade']) && isset($_POST['descricaoNovidade']) && isset($_FILES['imagemNovidade']) &&
	            $_POST['tituloNovidade'] != "" && $_POST['descricaoNovidade'] != "" && $_FILES['imagemNovidade']['tmp_name'] != ""){

	            $tituloNovidade = $_POST['tituloNovidade'];
	            $descricaoNovidade = $_POST['descricaoNovidade'];

	            $imagemNovidade = file_get_contents($_FILES['imagemNovidade']['tmp_name']);

	            $novidade = new Novidade($tituloNovidade, $imagemNovidade, $descricaoNovidade);
	            

	            if( NovidadeFactory::get()->inserir($novidade) === true ) {

                    self::redirect("Inserido com sucesso");

	            } 

	        } else {

                self::redirect("Formulário preenchido incorretamente", false);

	        }


        }

        /**
    	 * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
    	 * @param messaga String, uma mesagem de sucesso ou erro.
    	 * @param sucess boolean, o status de sucesso (true) ou erro (false).
    	 */
        private function redirect( $message, $success = true, $route = "../novidades" ) {

        	if( $success ) {

        		$_SESSION['msgNovidade'] = $message;
            	header('Location: '. $route);

        	} else {

        		$_SESSION['msgNovidade'] = $message;
            	header('Location: ' . $route);

        	}
        	

        }

        static function delete() {

        	$id = $_POST['novidadeId'];

            if( is_numeric($id) ) {

	            $nf = NovidadeFactory::get();
	            $nf->deleteById($id);

	            self::redirect("Removido com sucesso");

        	} else {

                self::redirect("Não foi possível a remoção da noticia", false);

        	}

        }


    }
?>
