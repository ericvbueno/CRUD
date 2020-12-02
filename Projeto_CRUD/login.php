<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Controle de Acesso</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="card login">
      <div class="kabum">
        <img class="imglogin" src="img/kabum.png" alt="logo da kabum">
      </div>
      <h2 class="titulo">Login</h2>
      <form class="form-horizontal formulario" method="POST" action="validacao.php">
        <label class="control-label col-sm-2">Login:</label>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" id="login" placeholder="Enter Login" name="login">
          </div>
        </div>
        <label class="control-label col-sm-2" for="cad_nome">Senha:</label>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"><br>
          </div>
        </div>
        <div class="botao">
       <p><a href="cad_login.php" target="_self">Registre-se</a></p>
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        </form>
  </div>
</body>

</html>