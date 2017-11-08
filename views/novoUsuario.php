<?php
    include 'views/parciais/cabeca.php';
    include 'views/parciais/menu.php';
    //include 'views/parciais/menuLateral.php';
?>
<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <a class="w3-bar-item w3-button w3-hover-black" href="/?pagina=usuario-novo">Novo</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:250px">
<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Novo Usuário</h1>
      <?php 
        if(isset($_SESSION['erroNovoUsuario'])){
            $m = $_SESSION['erroNovoUsuario'];
            echo '</span>'.$m.'</span>';
            unset($_SESSION['erroNovoUsuario']);
        }
        echo "<form action='/?pagina=sair' method='post'>
                        <button type='submit'>Sair</button>
                    </form>";
        ?>
        <form method="post" action="/?pagina=usuario-novo">
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
        
        
</div>
<?php include 'views/parciais/fechamento.php'?>


