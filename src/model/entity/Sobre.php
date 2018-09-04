<?php 
    class Sobre {
    	private $id;
        private $descricao;
        
       	public function __construct($descricao) {

       		$this->descricao = $descricao;

        } 
        
        public function setDescricao($descricao){
       		$this->descricao = $descricao;
        } 
        public function getDescricao(){
        	return $this->descricao;
        }
        
    }
?>
