<?php
/**
 * Realiza o autoload das classes configuradas no arquivo project.json no sorce
 * @author Gian Fonseca <github.com/lucasgian>
 * @version 2.0.0
 */

require_once 'const.php';


spl_autoload_register(function ($class_name) {

    $json = Decode::getJson();

    foreach ($json->source as $key => $value) {

        if ( file_exists( $value . $class_name . '.php' ) ) {

            require_once $value . $class_name . '.php';

        }
            
    }
    
});

?>