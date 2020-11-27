<?php
session_start();
include_once("conexao.php");
include_once("testar_vazio.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cadastro = "SELECT * FROM cadastro WHERE id = '$id'";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);
$row_cadastro = mysqli_fetch_assoc($resultado_cadastro);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Edição de Dados</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!--  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
  <script src="JavaScript.js"></script>
</head>

<body>
  <div class="container">
    <h2 class="titulo">Editar Cadastro</h2>

    <form name="edicao" id="edicaoform" method="POST" action="procedimento_edicao.php" onsubmit="alert('Usuario Salvo !')">
      <input type="hidden" name="id" value="<?php echo $row_cadastro['id']; ?>">

      <p><label class="control-label col-sm-2" for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="cliente_nome" value="<?php echo $row_cadastro['nome']; ?>" placeholder="Digite o nome do cliente" /></p>
      <p><label class="control-label col-sm-2" for="cpf">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cliente_cpf" maxlength="11" value="<?php echo $row_cadastro['cpf']; ?>" placeholder="000.000.000-00" /></p>
      <p><label class="control-label col-sm-2" for="rg">RG:</label>
        <input type="text" class="form-control" id="rg" name="cliente_rg" value="<?php echo $row_cadastro['rg']; ?>" placeholder="00.000.000-0" /></p>
      <p><label class="control-label col-sm-2" for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="cliente_email" value="<?php echo $row_cadastro['email']; ?>" placeholder="email@gmail.com" /></p>
      <p><label class="control-label col-sm-2" for="ddd">DDD:</label>
        <input type="tel" class="form-control" id="ddd" name="cliente_ddd" maxlength="2" value="<?php echo $row_cadastro['ddd']; ?>" placeholder="(00)" /></p>
      <p><label class="control-label col-sm-2" for="tel">Tel:</label>
        <input type="tel" class="form-control" id="tel" name="cliente_tel" maxlength="8" value="<?php echo $row_cadastro['tel']; ?>" placeholder="0000-0000" /></p>
      <p><label class="control-label col-sm-2" for="tel2">Tel2:</label>
        <input type="tel" class="form-control" id="tel2" name="cliente_tel2" maxlength="8" value="<?php echo $row_cadastro['tel2']; ?>" placeholder="0000-0000" /></p>
      <p><label class="control-label col-sm-2" for="nasc">Nascimento:</label>
        <input type="date" class="form-control" id="nasc" name="cliente_nasc" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" value="<?php echo $row_cadastro['nasc']; ?>" placeholder="00/00/0000" /></p><br>
      <p><label>Status:</label>
        <input type="text" readonly="true" placeholder="Marque abaixo o Status" value="<?php echo $row_cadastro['atv'] ? 'Ativo' : 'Inativo' ?>"><br>
        <input type="radio" id="atv" name="atv" value="1" <?php echo $row_cadastro['atv'] == 1 ? 'checked' : '' ?>>Ativado
        <input type="radio" id="atv" name="atv" value="0" <?php echo $row_cadastro['atv'] != 1 ? 'checked' : '' ?>>Desativado</p>


      <button type="submit" onclick="funcao1('salvar')" class="btn btn-success">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </button>

      <button type="reset" onclick="funcao1('cancelar')" class="btn btn-danger">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </button>
    </form>
  </div>
</body>

</html>