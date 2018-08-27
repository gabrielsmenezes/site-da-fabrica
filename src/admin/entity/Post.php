<?php 
    class Novidades {
    	private $id;
        private $titulo;
        private $conteudo;
        private $imagem;

        
        public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
        }
        
        
        public function getConteudo(){
            return $this->conteudo;
        }
    }
?>
