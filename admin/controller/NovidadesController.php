<?php 
    
    class NovidadesController{
    
        static public function get(){
        	$nf = NovidadeFactory::get();
        	$listNovidades = null;
        	$listNovidades = $nf->lista();
        	Render::render_php( 'views/' . 'novidades.php' , $listNovidades);            
        	//echo "pass get EditaisController<br>";
        }
        /*
        static public function editarNovidade(){
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
        */



    //     static public function updateNovidades(){
    //      	if( isset($_POST['tituloEdital']) && isset($_POST['descricaoEdital']) && 
	   //          $_POST['tituloEdital'] != "" && $_POST['descricaoEdital'] != "" ){
	   //          //echo "<br><br>init<br>";

	   //          //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";
    //      		$id = $_POST['editalId'];
	   //          $tituloEdital = $_POST['tituloEdital'];
	   //          $descricaoEdital = $_POST['descricaoEdital'];	 
	   //          if( isset($_FILES['arquivoEdital']) ){
	   //          	if( $_FILES['arquivoEdital']['tmp_name'] != ""){
		  //           	$arquivoEdital = file_get_contents($_FILES['arquivoEdital']['tmp_name']);
		  //           }	
	   //          }
	   //          /*
	   //          echo $id;
	   //          echo "<br>";
	   //          echo $nomeAluno;
	   //          echo "<br>";
	   //          echo $descricaoAluno;
	   //          echo "<br>";
				// */

	   //          //echo "factory<br>";
	   //          $factoryEdital = EditalFactory::get();

	   //          //echo "adicionar<br>";
	            
	   //          $factoryProjeto->update("nome", $nomeProjeto, $id);
	   //          $factoryProjeto->update("descricao", $descricaoProjeto, $id);
	   //          $factoryProjeto->update("descricaoCurta", $descricaoCurtaProjeto, $id);
	            
	   //          $arrCol = ["titulo", "descricao"];
	   //          $arrVal = [$tituloEdital, $descricaoEdital];

	   //          if( isset($arquivoEdital) ){
	   //          	//$factoryProjeto->update("imagem", $imagemProjeto, $id);
	   //          	array_push($arrCol, "arquivo");
	   //          	array_push($arrVal, $arquivoEdital);
	   //          }
	   //          $factoryEdital->updateArray($arrCol, $arrVal, $id);
	   //          //echo "fim do metodo";
	   //          $_SESSION['msgEditais'] = "Atualizado com sucesso";
	   //          $newURL = '/admin/?pagina=editais';
    //             header('Location: '.$newURL);

	   //      }
	   //      else{
	   //          //echo "Formulário preenchido incorretamente";
	   //          $_SESSION['msgEditais'] = "Formulário preenchido incorretamente";
	   //          $newURL = '/admin/?pagina=editais';
    //             header('Location: '.$newURL);
	   //      }
    //     }



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


        // static function removerEdital(){
        // 	$id = $_POST['editalId'];

        //     if( is_numeric($id) ){
	       //      $pf = EditalFactory::get();
	       //      $pf->deleteById($id);

	       //      $_SESSION['msgEdital'] = "removido com sucesso";
		      //   $newURL = '/admin/?pagina=editais';
	       //      header('Location: '.$newURL);
        // 	}
        // 	else{
	       //      $_SESSION['msgEdital'] = "";
	       //      $newURL = '/admin/?pagina=editais';
        //         header('Location: '.$newURL);
        // 	}
        // }



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
