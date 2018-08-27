<?php 

    include 'render.php';
    
    class IndexController{
    
        static public function get(){
            
            $dirView = 'views/' . 'index.php';
            $content = "<br><br> IndexController.php <br><br>";

            Render::render_php( $dirView , $content);
        }
    }
?>
