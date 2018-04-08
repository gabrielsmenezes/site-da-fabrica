<?php 
    
    class NovidadesController{
    
        static public function get(){
        	$nf = NovidadeFactory::get();
        	$listNovidades = null;
        	$listNovidades = $nf->lista();
        	Render::render_php( 'views/' . 'novidades.php' , $listNovidades);            
        	//echo "pass get EditaisController<br>";
        }
        
        static public function editarNovidade(){
        	if( !isset($_POST['novidadeId']) ){
        		$newURL = '/admin/?pagina=novidades';
                header('Location: '.$newURL);
        	}
        	else{        		
	            $nf = NovidadeFactory::get();
	        	$novidade = null;
	        	$novidade = $nf->getById($_POST['novidadeId']);
	        	// echo $_POST['novidadeId'];     
	        	// print_r($novidade); 
	        	Render::render_php( '/views/' . 'editorNovidade.php' , $novidade);
        	}
        }
        



        static public function updateNovidade(){
         	if( isset($_POST['tituloNovidade']) && isset($_POST['descricaoNovidade']) && 
	            $_POST['tituloNovidade'] != "" && $_POST['descricaoNovidade'] != "" ){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";
         		$id = $_POST['novidadeId'];
	            $tituloNovidade = $_POST['tituloNovidade'];
	            $descricaoNovidade = $_POST['descricaoNovidade'];	 
	            if( isset($_FILES['imagemNovidade']) ){
	            	if( $_FILES['imagemNovidade']['tmp_name'] != ""){
		            	$imagemNovidade = file_get_contents($_FILES['imagemNovidade']['tmp_name']);
		            }	
	            }

	            $factoryNovidade = NovidadeFactory::get();

	            // $factoryNovidade->update("titulo", $nomeProjeto, $id);
	            // $factoryNovidade->update("descricao", $descricaoProjeto, $id);
	            
	            $arrCol = ["titulo", "descricao"];
	            $arrVal = [$tituloNovidade, $descricaoNovidade];

	            if( isset($imagemNovidade) ){
	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemNovidade);
	            }
	            $factoryNovidade->updateArray($arrCol, $arrVal, $id);
	            //echo "fim do metodo";
	            $_SESSION['msgNovidade'] = "Atualizado com sucesso";
	            $newURL = '/admin/?pagina=novidades';
                header('Location: '.$newURL);

	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgNovidade'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=novidades';
                header('Location: '.$newURL);
	        }
        }



        static public function inserirNovidade(){            
           if( isset($_POST['tituloNovidade']) && isset($_POST['descricaoNovidade']) && isset($_FILES['imagemNovidade']) &&
	            $_POST['tituloNovidade'] != "" && $_POST['descricaoNovidade'] != "" && $_FILES['imagemNovidade']['tmp_name'] != ""){

	            $tituloNovidade = $_POST['tituloNovidade'];
	            $descricaoNovidade = $_POST['descricaoNovidade'];

	            $imagemNovidade = file_get_contents($_FILES['imagemNovidade']['tmp_name']);

	            $novidade = new Novidade();
	            $novidade->addAtributos($tituloNovidade, $imagemNovidade, $descricaoNovidade);

	            $factoryNovidade = NovidadeFactory::get();

	            $iError = $factoryNovidade->inserir($novidade);
	            if( $iError != null ){
	                /////////////////
	                //debug
	                //
	                //echo $iError;
	            }
	            else{
	                //echo "inserido com sucesso";
	                $_SESSION['msgNovidade'] = "inserido com sucesso";
	                $newURL = '/admin/?pagina=novidades';
                    header('Location: '.$newURL);
	            }
	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgNovidade'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=novidades';
                header('Location: '.$newURL);
	        }
        }


        static function removerNovidade(){
        	$id = $_POST['novidadeId'];

            if( is_numeric($id) ){
	            $nf = NovidadeFactory::get();
	            $nf->deleteById($id);

	            $_SESSION['msgNovidade'] = "removido com sucesso";
		        $newURL = '/admin/?pagina=novidades';
	            header('Location: '.$newURL);
        	}
        	else{
	            $_SESSION['msgNovidade'] = "";
	            $newURL = '/admin/?pagina=novidades';
                header('Location: '.$newURL);
        	}
        }



        // static function showNovidadeById(){
        // 	$id = $_POST['editalId'];

        //     if( is_numeric($id) ){
	       //      $ef = EditalFactory::get();
	       //      $pdfDoc = $ef->getById($id);
        // 		Render::render_php( 'views/' . 'pdfViewer.php' , $pdfDoc); 
        // 	}
        // 	else{
	       //      $_SESSION['msgEdital'] = "";
	       //      $newURL = '/admin/?pagina=editais';
        //         header('Location: '.$newURL);
        // 	}
        // }

    }
?>
