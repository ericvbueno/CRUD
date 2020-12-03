<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastrar Login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="card registro">

      <form class="form-horizontal" id="cad_login_form" method="POST" action="proced/cad_login.php" onsubmit="alert('Usuario cadastrado com sucesso !')">
        <h2 class="titulo">Cadastrar Login:</h2>

        <p><label class="control-label col-sm-2" for="cad_nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" required pattern="[a-zA-Z\s]+$" placeholder="Digite seu nome"></p>
        <p><label class="control-label col-sm-2" for="cad_email">Email:</label>
          <input type="email" class="form-control" id="email_cad" name="cliente_email" required placeholder="email@gmail.com"></p>
        <p><label class="control-label col-sm-2" for="cad_login">Login:</label>
          <input type="text" class="form-control" id="login" name="login" required placeholder="Digite o Login que sera usado"></p>
        <p> <label class="control-label col-sm-2" for="cad_login">Senha:</label>
          <input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite sua Senha"></p><br>

        <button type="submit" class="btn btn-primary btn-block">Registrar</button><br>
        <a type="submit" href="login.php" target="_self" class="btn btn-info btn-block">Voltar</a>
      </form>
    </div>
</body>

</html>