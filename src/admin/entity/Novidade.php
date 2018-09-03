<?php 
    class Novidade {
    	private $id;
        private $titulo;
        private $imagem;
        private $descricao;            
       	
        
        function __construct($titulo, $imagem, $descricao) {

            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->imagem = $imagem;

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
        public function getImagem(){
            return $this->imagem;
        }
        public function setImagem($imagem){
            $this->imagem = $imagem;
        }
    }
?>
