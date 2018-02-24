<?php 
    class Post {
        private $conteudo;
        
        public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
        }
        
        
        public function getConteudo(){
            return $this->conteudo;
        }
    }
?>
