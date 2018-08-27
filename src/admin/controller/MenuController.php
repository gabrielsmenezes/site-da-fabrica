<?php 
    
    /**
    include 'render.php';
    */

    class MenuController{
    
        static public function get(){
            //$uf = UsuarioFactory::get();
            //$usuarios = $uf->lista();
            
            $dirView = 'views/' . 'menu.php';
            $content = "<br><br> Menu Controller.php <br><br>";

            Render::render_php( $dirView , /*$content*/null);
        }
    }
?>
