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
  <a class="w3-bar-item w3-button w3-hover-black" href="/?pagina=post-novo">Novo</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:250px">
<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Novo Post</h1>
      <ul>
            <?php
                
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/tinymce.min.js"></script>
            <script src="/public/js/pt_BR.js"></script>
            <script>tinymce.init({ selector:'textarea' , plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  height : "350"});
                var teste = function(){
                    var p = tinyMCE.activeEditor.getContent();
                    var e = document.getElementById('post');
                    e.value = '';
                    e.value = p;
                }
            </script>

            <textarea>Novo post aqui!!!</textarea>
            
            <form id="formulario" method="post" action="/?pagina=post-novo" onsubmit="return teste();">
                <input type='text' id="post" name="postC" style="display: none;">
                <button type="submit">Enviar</button>
            </form>
            
        </ul>
    </div>
    <div class="w3-third w3-container">
    
    </div>
  </div>
        
        
</div>
<?php include 'views/parciais/fechamento.php'?>
