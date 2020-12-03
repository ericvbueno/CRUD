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
  <title>Cadastro de Endereços</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles/stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!--<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>-->
  <script defer src="Script/JavaScript.js"></script>
</head>

<body>
  <div class="container">

    <h2 class="titulo">Cadastro de Endereços</h2>

    <form name="endereco" id="enderecoform" method="POST" action="proced/cad_endereco.php">
      <input type="hidden" name="cliente_id" value="<?php echo $row_cadastro['id']; ?>">

      <p><label class="control-label col-sm-2" for="nome">Nome:</label>
        <input type="text" class="form-control" readonly="true" id="nome" name="cliente_nome" value="<?php echo $row_cadastro['nome']; ?>" /></p>

      <p><label class="control-label col-sm-2" for="cep">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cliente_cep" required maxlength="8" pattern="[0-9]+$" placeholder="00000-000" /></p>
      <p><label class="control-label col-sm-2" for="rua">Rua:</label>
        <input type="text" class="form-control" id="rua" name="cliente_rua" required pattern="[a-zA-Z\s]+$" placeholder="Digite a rua do cliente" /></p>
      <p><label class="control-label col-sm-2" for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="cliente_bairro" required pattern="[a-zA-Z\s]+$" placeholder="Digite o bairro do cliente" /></p>
      <p><label class="control-label col-sm-2" for="num">Numero:</label>
        <input type="text" class="form-control" id="num" name="cliente_num" required pattern="[0-9]+$" placeholder="Digite o nº da casa do cliente" /></p>
      <p><label class="control-label col-sm-2" for="cidade">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cliente_cidade" required pattern="[a-zA-Z\s]+$" placeholder="Digite a cidade do cliente" /></p>
      <p><label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
          <option></option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Prá</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondõnia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
      </p>
      <p><label>Tipo de Endereço:</label><br>
        <input type="radio" id="princ" name="princ" value="1">Principal
        <input type="radio" id="princ" name="princ" value="0">Secundario</p>

      <button type="submit" class="btn btn-success send-btn">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </button>

      <a type="reset" href="visualizar.php?id=<?php echo $row_cadastro['id']; ?>" target="_self" class="btn btn-danger">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
    </form>
    <div>
      <script src="validacao.js"></script>
</body>

</html>