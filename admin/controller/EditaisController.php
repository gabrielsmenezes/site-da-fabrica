<?php 
    
    class EditaisController{
    
        static public function get(){
            $ef = EditalFactory::get();
        	$listEditais = null;
        	$listEditais = $ef->lista();
        	Render::render_php( 'views/' . 'editais.php' , $listEditais);            
        	//echo "pass get EditaisController<br>";
        }
        static public function editarEdital(){
        	if( !isset($_POST['editalId']) ){
        		$newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);
        	}
        	else{        		
	            $ef = EditalFactory::get();
	        	$edital = null;
	        	$edital = $ef->getById($_POST['editalId']);          
	        	Render::render_php( '/views/' . 'editorEdital.php' , $edital);
        	}
        }
        static public function updateEdital(){
         	if( isset($_POST['tituloEdital']) && isset($_POST['descricaoEdital']) && 
	            $_POST['tituloEdital'] != "" && $_POST['descricaoEdital'] != "" ){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";
         		$id = $_POST['editalId'];
	            $tituloEdital = $_POST['tituloEdital'];
	            $descricaoEdital = $_POST['descricaoEdital'];	 
	            if( isset($_FILES['arquivoEdital']) ){
	            	if( $_FILES['arquivoEdital']['tmp_name'] != ""){
		            	$arquivoEdital = file_get_contents($_FILES['arquivoEdital']['tmp_name']);
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
	            $factoryEdital = EditalFactory::get();

	            //echo "adicionar<br>";
	            /*
	            $factoryProjeto->update("nome", $nomeProjeto, $id);
	            $factoryProjeto->update("descricao", $descricaoProjeto, $id);
	            $factoryProjeto->update("descricaoCurta", $descricaoCurtaProjeto, $id);
	            */
	            $arrCol = ["titulo", "descricao"];
	            $arrVal = [$tituloEdital, $descricaoEdital];

	            if( isset($arquivoEdital) ){
	            	//$factoryProjeto->update("imagem", $imagemProjeto, $id);
	            	array_push($arrCol, "arquivo");
	            	array_push($arrVal, $arquivoEdital);
	            }
	            $factoryEdital->updateArray($arrCol, $arrVal, $id);
	            //echo "fim do metodo";
	            $_SESSION['msgEditais'] = "Atualizado com sucesso";
	            $newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);

	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEditais'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);
	        }
        }
        static public function inserirEdital(){            
        	    if( isset($_POST['tituloEdital']) && isset($_POST['descricaoEdital']) && isset($_FILES['arquivoEdital']) &&
	            $_POST['tituloEdital'] != "" && $_POST['descricaoEdital'] != "" && $_FILES['arquivoEdital']['tmp_name'] != ""){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemAluno']['tmp_name'].":<br>";

	            $tituloEdital = $_POST['tituloEdital'];
	            $descricaoEdital = $_POST['descricaoEdital'];
	            //$arquivoEdital = $_FILES['arquivoEdital'];

	            $arquivoEdital = file_get_contents($_FILES['arquivoEdital']['tmp_name']);

	            //echo "criar obj<br>";
	            $edital = new Edital();
	            $edital->addAtributos($tituloEdital, $arquivoEdital, $descricaoEdital);

	            //echo "factory<br>";
	            $factoryEdital = EditalFactory::get();

	            //echo "adicionar<br>";
	            $iError = $factoryEdital->inserir($edital);
	            if( $iError != null ){
	                /////////////////
	                //debug
	                //
	                //echo $iError;
	            }
	            else{
	                //echo "inserido com sucesso";
	                $_SESSION['msgEdital'] = "inserido com sucesso";
	                $newURL = '/admin/?pagina=editais';
                    header('Location: '.$newURL);
	            }
	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgEdital'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);
	        }
        }
        static function removerEdital(){
        	$id = $_POST['editalId'];

            if( is_numeric($id) ){
	            $pf = EditalFactory::get();
	            $pf->deleteById($id);

	            $_SESSION['msgEdital'] = "removido com sucesso";
		        $newURL = '/admin/?pagina=editais';
	            header('Location: '.$newURL);
        	}
        	else{
	            $_SESSION['msgEdital'] = "";
	            $newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);
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
	            $newURL = '/admin/?pagina=editais';
                header('Location: '.$newURL);
        	}
        }

    }
?>
