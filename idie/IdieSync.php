<?php
/**
 * @author Gian Fonseca <github.com/lucasgian>
 * @version 0.1.0
 */

class IdieSync {

    /**
     * Método construtor 
     */
    function __construct() {
        require_once 'config/autoload.php';
    }
    
    /**
     * Roteador
     */
    public function router() {
        new Frame();
    }
}


?>