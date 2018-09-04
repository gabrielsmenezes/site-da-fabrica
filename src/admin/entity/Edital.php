<?php 
    class Edital {
    	private $id;
        private $titulo;
        private $arquivo;
        private $descricao;            
       	
        public function __construct($titulo, $arquivo, $descricao) {

       		$this->titulo = $titulo;
       		$this->descricao = $descricao;
            $this->arquivo = $arquivo;
        
        }  
        

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }
        public function getTitulo(){
            return $this->titulo;
        }        
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function getId(){
        	return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getArquivo(){
            return $this->arquivo;
        }
        public function setArquivo($arquivo){
            $this->arquivo = $arquivo;
        }
    }
?>
