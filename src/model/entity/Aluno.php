<?php 
    class Aluno {
    	private $id;
        private $nome;
        private $imagem;
        private $descricao;

        function __construct($nome, $imagem, $descricao){
            $this->nome = $nome;
            $this->imagem = $imagem;
            $this->descricao = $descricao;
        }  
        

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setImagem($imagem){
            $this->imagem = $imagem;
        }        
        public function getNome(){
            return $this->nome;
        }        
        public function getImagem(){
            return $this->imagem;
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

    }
?>
