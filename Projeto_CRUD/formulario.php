<?php
session_start();
include_once("conexao.php");
include_once("nivel/testar_vazio.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuario WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastro de Clientes</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles/stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!--<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>-->
  <script defer src="Script/JavaScript.js"></script>
</head>

<body>
  <div class="container">

    <h2 class="titulo">Cadastro de Clientes</h2>

    <form class="teste" name="formulario" id="cadastroform" method="POST" action="proced/cadastro.php">
      <input type="hidden" name="usuario" value="<?php echo $row_usuario['id']; ?>">

      <p><label class="control-label col-sm-2" for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="cliente_nome" required pattern="[a-zA-Z\s]+$" placeholder="Digite o nome do cliente" /></p>
      <p><label class="control-label col-sm-2" for="cpf">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cliente_cpf" required maxlength="11" pattern="[0-9]+$" placeholder="000.000.000-00" /></p>
      <p><label class="control-label col-sm-2" for="rg">RG:</label>
        <input type="text" class="form-control" id="rg" name="cliente_rg" required placeholder="00.000.000-0" /></p>
      <p><label class="control-label col-sm-2" for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="cliente_email" required placeholder="email@gmail.com" /></p>
      <p><label class="control-label col-sm-2" for="ddd">DDD:</label>
        <input type="tel" class="form-control" id="ddd" name="cliente_ddd" required maxlength="2" pattern="[0-9]+$" placeholder="(00)" /></p>
      <p><label class="control-label col-sm-2" for="tel">Tel:</label>
        <input type="tel" class="form-control" id="tel" name="cliente_tel" required maxlength="8" pattern="[0-9]+$" placeholder="0000-0000" /></p>
      <p><label class="control-label col-sm-2" for="tel2">Tel2:</label>
        <input type="tel" class="form-control" id="tel2" name="cliente_tel2" required maxlength="8" pattern="[0-9]+$" placeholder="0000-0000" /></p>
      <p><label class="control-label col-sm-2" for="nasc">Nascimento:</label>
        <input type="date" class="form-control" id="nasc" name="cliente_nasc" required maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="00/00/0000" /></p><br>

      <button type="submit" class="btn btn-success send-btn">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </button>

      <a type="reset" href="Lista.php" target="_self" class="btn btn-danger">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
    </form>
  </div>
  <script src="validacao.js"></script>
</body>

</html>