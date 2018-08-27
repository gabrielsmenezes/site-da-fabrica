<?php
    class Render {
        static public function render_php($path, $args){
            ob_start();
            include(/*$_SESSION['pasta']."/".*/$path);
            $var = ob_get_contents();
            ob_end_clean();
            echo $var;
        }
    }
?>
