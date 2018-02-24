<?php 

    //include 'render.php';
    
    class SobreController{
    
        static public function get(){
            
            $dirView = 'views/' . 'sobre.php';
            //$content = "<br><br> SobreController.php <br><br>";
            $sf = SobreFactory::get();
            $content = $sf->lista()[0]->getDescricao();
            Render::render_php( $dirView , $content);
        }
        static public function update(){
        	$sobreObj = new Sobre();
        	$sobreObj->addAtributos( $_POST['sobre'] );
            echo "<br>sobre:".$_POST['sobre'].":<br>";
        	$sf = SobreFactory::get();
        	$sf->update($sobreObj);

            $newURL = '/admin/?pagina=sobre';
            header('Location: '.$newURL);
            //Render::render_php( $dirView , $content);
        }

    }
?>
