<?php
    include 'views/parciais/cabeca.php';
    include 'views/parciais/menu.php';
    //include 'views/parciais/menuLateral.php';
?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:250px">
<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Login</h1>
      <?php 
        if(isset($_SESSION['erroLogin'])){
            $m = $_SESSION['erroLogin'];
            echo '</span>'.$m.'</span>';
            unset($_SESSION['erroLogin']);
        }
        ?>
        <form method="post" action="/?pagina=login">
            <label>Usuário</label>
            <input type="text" name="nome">
            <label>Senha</label>
            <input type="text" name="senha">
            <button type="submit">Enviar</button>
        </form>
    </div>
    <div class="w3-third w3-container">
    
    </div>
  </div>

