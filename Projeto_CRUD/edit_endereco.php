<?php
session_start();
include_once("conexao.php");
include_once("testar_vazio.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_endereco = "SELECT enderecos.*, cadastro.nome, cadastro.id as cliente_id
FROM cadastro
JOIN enderecos on
cadastro.id = enderecos.cliente_id
WHERE enderecos.id = '$id'
";
$resultado_endereco = mysqli_query($conn, $result_endereco);
$row_endereco = mysqli_fetch_assoc($resultado_endereco);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastro de Endereços</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!--<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>-->
  <script defer src="JavaScript.js"></script>
</head>

<body>
  <div class="container">

    <h2 class="titulo">Editar Endereços</h2>

    <form name="edit_endereco" id="edit_enderecoform" method="POST" action="proced_editar_endereco.php">
      <input type="hidden" name="id" value="<?php echo $row_endereco['id']; ?>">
      <input type="hidden" name="cliente_id" value="<?php echo $row_endereco['cliente_id']; ?>">

      <p><label class="control-label col-sm-2" for="nome">Nome:</label>
        <input type="text" class="form-control" readonly="true" id="nome" name="cliente_nome" value="<?php echo $row_endereco['nome']; ?>" /></p>

      <p><label class="control-label col-sm-2" for="cep">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cliente_cep" required maxlength="8" pattern="[0-9]+$" value="<?php echo $row_endereco['cep']; ?>" placeholder="00000-000" /></p>
      <p><label class="control-label col-sm-2" for="rua">Rua:</label>
        <input type="text" class="form-control" id="rua" name="cliente_rua" required pattern="[a-zA-Z\s]+$" value="<?php echo $row_endereco['rua']; ?>" placeholder="Digite a rua do cliente" /></p>
      <p><label class="control-label col-sm-2" for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="cliente_bairro" required pattern="[a-zA-Z\s]+$" value="<?php echo $row_endereco['bairro']; ?>" placeholder="Digite o bairro do cliente" /></p>
      <p><label class="control-label col-sm-2" for="num">Numero:</label>
        <input type="text" class="form-control" id="num" name="cliente_num" required pattern="[0-9]+$" value="<?php echo $row_endereco['numero']; ?>" placeholder="Digite o nº da casa do cliente" /></p>
      <p><label class="control-label col-sm-2" for="cidade">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cliente_cidade" required pattern="[a-zA-Z\s]+$" value="<?php echo $row_endereco['cidade']; ?>" placeholder="Digite a cidade do cliente" /></p>
      <p><label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
          <option value="<?php echo $row_endereco['estado']; ?>"><?php echo $row_endereco['estado']; ?></option>
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
        <input type="radio" id="princ" name="princ" value="1" <?php echo $row_endereco['principal'] == 1 ? 'checked' : '' ?>>Principal
        <input type="radio" id="princ" name="princ" value="0" <?php echo $row_endereco['principal'] != 1 ? 'checked' : '' ?>>Secundario</p>
      <button type="submit" class="btn btn-success send-btn">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </button>
    </form>
  </div>
  <script src="validacao.js"></script>
</body>

</html>