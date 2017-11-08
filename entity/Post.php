<?php 
    class Post {
    	private $id;
        private $conteudo;
        
       
        public function getId(){
            return $this->id;
        }

        public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
        }
        
        
        public function getConteudo(){
            return $this->conteudo;
        }
    }
?>
