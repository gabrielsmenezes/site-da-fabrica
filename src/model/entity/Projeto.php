<?php 
    class Projeto {
      private $id;
      private $nome;
      private $imagem;
      private $descricao;
      private $descricaoCurta;
      
      public function __construct($nome, $imagem, $descricao, $descricaoCurta) {

        $this->nome = $nome;
        $this->imagem = $imagem;
        $this->descricao = $descricao;
        $this->descricaoCurta = $descricaoCurta;

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
      public function setDescricaoCurta( $descricaoCurta ){
        $this->descricaoCurta = $descricaoCurta;
      }
      public function getDescricaoCurta(){
        return $this->descricaoCurta;
      }
    }
?>
