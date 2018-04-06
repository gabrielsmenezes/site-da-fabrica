<?php 

    //include 'render.php';
    
    class ProjetosController{
    
        static public function get(){  
            $pf = ProjetoFactory::get();
        	$listProjetos = null;
        	$listProjetos = $pf->lista();          
        	Render::render_php( 'views/' . 'projetos.php' , $listProjetos);
        }
        static public function editarProjeto(){
        	if( !isset($_POST['projectId']) ){
        		$newURL = '/admin/?pagina=projetos';
                header('Location: '.$newURL);
        	}
        	else{        		
	            $pf = ProjetoFactory::get();
	        	$project = null;
	        	$project = $pf->getById($_POST['projectId']);          
	        	Render::render_php( '/views/' . 'editorProjeto.php' , $project);
        	}
        }
        static public function updateProjeto(){
         	if( isset($_POST['nomeProjeto']) && isset($_POST['descricaoProjeto']) && 
        		isset($_POST['descricaoCurtaProjeto']) && $_POST['descricaoCurtaProjeto'] != "" &&
	            $_POST['nomeProjeto'] != "" && $_POST['descricaoProjeto'] != "" ){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";
         		$id = $_POST['projectId'];
	            $nomeProjeto = $_POST['nomeProjeto'];
	            $descricaoProjeto = $_POST['descricaoProjeto'];	            
	            $descricaoCurtaProjeto = $_POST['descricaoCurtaProjeto'];
	            //$imagemProjeto = $_FILES['imagemProjeto'];
	            if( isset($_FILES['imagemProjeto']) ){
	            	if( $_FILES['imagemProjeto']['tmp_name'] != ""){
		            	$imagemProjeto = file_get_contents($_FILES['imagemProjeto']['tmp_name']);
		            }	
	            }

	            //echo "factory<br>";
	            $factoryProjeto = ProjetoFactory::get();

	            //echo "adicionar<br>";
	            /*
	            $factoryProjeto->update("nome", $nomeProjeto, $id);
	            $factoryProjeto->update("descricao", $descricaoProjeto, $id);
	            $factoryProjeto->update("descricaoCurta", $descricaoCurtaProjeto, $id);
	            */
	            $arrCol = ["nome", "descricao", "descricaoCurta"];
	            $arrVal = [$nomeProjeto, $descricaoProjeto, $descricaoCurtaProjeto];

	            if( isset($imagemProjeto) ){
	            	//$factoryProjeto->update("imagem", $imagemProjeto, $id);
	            	array_push($arrCol, "imagem");
	            	array_push($arrVal, $imagemProjeto);
	            }
	            $factoryProjeto->updateArray($arrCol, $arrVal, $id);
	            //echo "fim do metodo";
	            $_SESSION['msgProjetos'] = "Atualizado com sucesso";
	            $newURL = '/admin/?pagina=projetos';
                header('Location: '.$newURL);

	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgProjetos'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=projetos';
                header('Location: '.$newURL);
	        }
        }
        static public function inserirProjeto(){            
        	if( isset($_POST['nomeProjeto']) && isset($_POST['descricaoProjeto']) && isset($_FILES['imagemProjeto']) && 
        		isset($_POST['descricaoCurtaProjeto']) && $_POST['descricaoCurtaProjeto'] != "" &&
	            $_POST['nomeProjeto'] != "" && $_POST['descricaoProjeto'] != "" && $_FILES['imagemProjeto']['tmp_name'] != ""){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";

	            $nomeProjeto = $_POST['nomeProjeto'];
	            $descricaoProjeto = $_POST['descricaoProjeto'];	            
	            $descricaoCurtaProjeto = $_POST['descricaoCurtaProjeto'];
	            //$imagemProjeto = $_FILES['imagemProjeto'];

	            $imagemProjeto = file_get_contents($_FILES['imagemProjeto']['tmp_name']);

	            //echo "criar obj<br>";
	            $Projeto = new Projeto();
	            $Projeto->addAtributos($nomeProjeto, $imagemProjeto, $descricaoProjeto, $descricaoCurtaProjeto);

	            //echo "factory<br>";
	            $factoryProjeto = ProjetoFactory::get();

	            //echo "adicionar<br>";
	            $iError = $factoryProjeto->inserir($Projeto);
	            if( $iError != null ){
	                /////////////////
	                //debug
	                //
	                echo $iError;
	            }
	            else{
	                //echo "inserido com sucesso";
	                $_SESSION['msgProjetos'] = "inserido com sucesso";
	                $newURL = '/admin/?pagina=projetos';
                    header('Location: '.$newURL);
	            }
	        }
	        else{
	            //echo "Formulário preenchido incorretamente";
	            $_SESSION['msgProjetos'] = "Formulário preenchido incorretamente";
	            $newURL = '/admin/?pagina=projetos';
                header('Location: '.$newURL);
	        }
        }
        static function removerProjeto(){
        	$id = $_POST['projectId'];

            if( is_numeric($id) ){
	            $pf = ProjetoFactory::get();
	            $pf->deleteById($id);

	            $_SESSION['msgProjetos'] = "removido com sucesso";
		        $newURL = '/admin/?pagina=projetos';
	            header('Location: '.$newURL);
        	}
        	else{
        		//echo "Formulário preenchido incorretamente";
	            $_SESSION['msgProjetos'] = "";
	            $newURL = '/admin/?pagina=projetos';
                header('Location: '.$newURL);
        	}
        }
    }
?>
