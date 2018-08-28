<?php
/**
 * Tela de login
 *
 * @author Gian Fonseca
 * @version v2.0
 * @since Fabrica 2018-2 
 * @link 
 */
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="views/CSS/login.css">
    <meta charset="utf-8">
    <title>Administração Fábrica de Software - UFMS</title>
    
    <link rel="shortcut icon" href="../Imagens/favicon.png">
    <link rel="stylesheet" media="screen" href="/views/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jura|Orbitron" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Isabela Andrade">
    <meta name="robots" content="all">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
  </head>

  <body>

    <header>
      <!--
      <div class="bordaheader"></div>
      <div class="bordaheader2"></div>
      -->
    </header>
    <div id="sticky-anchor"></div>

    <div class="mainbox">
      <div class="infobg" align="center">
        <br>
        <h1>Faça seu login</h1>

        <?php

        if( isset($message) ){
          echo "<br>".$message."<br>"; 
        }
        //echo $args; 
        ?>

        <br>

        
          <form method="post" action="login">
            <label style="margin-left: -3px">Usuário</label>
            <input type = "text" name = "login"><br>
            <label>Senha  </label>
            <input type = "password" name = "senha"> <br><br>
            <button type = "submit"> Enviar </button> <br><br><br>
          </form>
      
      </div>
    </div>
  </body>

</html>



<?php
/*
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>

    <link type="text/css" rel="stylesheet" href="<?= __MATERIALIZE__ . 'css/materialize.min.css' ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= __CSS__ . 'form.css'; ?>">

</head>

<body data-spy="scroll" data-target=".navbar-fixed-top">

  <div class="container">
    <div class="login-isf">
      <h2>Acesso</h2>

      <div class="col-md-7 col-xs-12">
        <p>
          Bem-vindo a <strong>IDIE SOFTWARE</strong>.
          <br> Caso este seja o seu primeiro acesso selecione a opção
          <strong>Solicitar Acesso</strong> para se cadastrar.
          <br> Se você já efetuou o cadastro, digite seu E-mail, Senha e selecione a opção
          <strong>Autenticar</strong>.
          <br>

        </p>
      </div>
      <div class="caixa-login col-md-5 col-xs-12 sombra-2">

        <form class="form-signin">
          <div class="col-md-12 col-xs-12">

            <!-- Input Email -->
            <div class="row">
              <div class="form-group col-md-12 col-xs-12">
                <label for="Email:">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  E-mail de acesso:</label>
                <input type="email" id="email" name="email" minlength="11" placeholder="Digite seu e-mail" required email>
              </div>
            </div>

            <!-- Input Senha -->
            <div class="row">
              <div class="form-group col-md-12 col-xs-12">
                <label for="Senha:">
                  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                  Senha:</label>
                <input type="password" id="password" name="password" minlength="6" placeholder="Digite sua senha" required password>
              </div>
            </div>

            <!-- Captcha -->
            <div class="row">
              <div class="col-md-12">

                <div class="col-md-12">
                  <div class="row">
                    <button type="submit" id="btnAutenticar" name="btnAutenticar" class="btn btn-primary btn-block">Autenticar
                    </button>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </form>

        <div class="col-md-12">
          <div class="separador"></div>
        </div>


        <div class="col-md-6 col-xs-6">
          <button type="button" id="btnRecuperarSenha" name="btnRecuperarSenha" class="btn btn-default">Recuperar Senha
          </button>
        </div>
        <div class="col-md-6 col-xs-6 ">
          <a href="register" type="button" id="solicitar-acesso" name="solicitar-acesso" class="btn btn-block btn-success pull-right">Solicitar Acesso
          </a>
        </div>

      </div>
    </div>
  </div>

  
  </body>
</html>*/