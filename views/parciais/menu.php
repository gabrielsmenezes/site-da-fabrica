<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="/?pagina=index" class="w3-bar-item w3-button w3-theme-l1">Home</a>

    <a href="/?pagina=usuario" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Alunos</a>
    <a href="/?pagina=post" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Posts</a>
    <?php
        if(isset($_SESSION['user']))
            echo '<a href="/?pagina=sair" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sair</a>';
    ?>
  </div>
</div>
