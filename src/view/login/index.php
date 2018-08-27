<?php
/**
 * Tela de login
 *
 * @author Gian Fonseca
 * @version v0.1
 * @since idie-software 2018-1 
 * @link 
 */
$title = 'Login';?>

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
</html>