<?php 

    //include 'render.php';
    
    class ProjetosController{
    
        static public function get(){  
            $pf = ProjetoFactory::get();
        	$listProjetos = null;
        	$listProjetos = $pf->lista();          
        	Render::render_php( 'views/' . 'projetos.php' , $listProjetos);
        }
        static public function inserirProjeto(){            
        	if( isset($_POST['nomeProjeto']) && isset($_POST['descricaoProjeto']) && isset($_FILES['imagemProjeto']) &&
	            $_POST['nomeProjeto'] != "" && $_POST['descricaoProjeto'] != "" && $_FILES['imagemProjeto']['tmp_name'] != ""){
	            //echo "<br><br>init<br>";

	            //echo "<br>:".$_FILES['imagemProjeto']['tmp_name'].":<br>";

	            $nomeProjeto = $_POST['nomeProjeto'];
	            $descricaoProjeto = $_POST['descricaoProjeto'];
	            //$imagemProjeto = $_FILES['imagemProjeto'];

	            $imagemProjeto = file_get_contents($_FILES['imagemProjeto']['tmp_name']);

	            //echo "criar obj<br>";
	            $Projeto = new Projeto();
	            $Projeto->addAtributos($nomeProjeto, $imagemProjeto, $descricaoProjeto);

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
        	$id = $_POST['removeId'];

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
