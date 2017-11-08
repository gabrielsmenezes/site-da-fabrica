<?php 
    class Usuario {
        private $id;
        private $nome;
        private $senha;
        

        public function getId(){
            return $this->id;
        }

        
        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function setSenha($senha){
            $this->senha = $senha;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getSenha(){
            return $this->senha;
        }
    }
?>
