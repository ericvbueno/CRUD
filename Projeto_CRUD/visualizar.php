<?php
include_once("conexao.php");
include_once("nivel/testar_vazio.php");
include_once("Link/links.html");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cadastro = "SELECT * FROM cadastro WHERE id = '$id'";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);
$row_cadastro = mysqli_fetch_assoc($resultado_cadastro);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Visualizar dados do cliente</title>
  <meta charset="utf-8">
  <!--  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
  <script src="Script/JavaScript.js"></script>
</head>

<body>
  <div class="fundo">

    <h1>Endereços do cliente <?php echo $row_cadastro['nome']; ?></h1><br>

    <?php
    $result_endereco = "SELECT * FROM enderecos WHERE cliente_id = '$id'";
    $resultado_endereco = mysqli_query($conn, $result_endereco);
    $quantidade_endereco = mysqli_num_rows($resultado_endereco);

    if ($quantidade_endereco == 0) { ?>
      <h3 style='color:grey;'> Este cliente não possui endereços cadastrados</h3><br>
    <?php }

    if ($quantidade_endereco > 0) {

    ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Numero</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Tipo de Endereço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <?php
        while ($row_endereco = mysqli_fetch_assoc($resultado_endereco)) {
        ?>
          <tbody>
            <tr>
              <td><?php echo $row_endereco['cep']; ?></td>
              <td><?php echo $row_endereco['rua']; ?> </td>
              <td> <?php echo $row_endereco['bairro']; ?></td>
              <td> <?php echo $row_endereco['numero']; ?></td>
              <td> <?php echo $row_endereco['cidade']; ?></td>
              <td> <?php echo $row_endereco['estado']; ?></td>
              <td> <?php echo $row_endereco['principal'] ? 'Principal' : 'Secundario'; ?></td>
              <td>
                <button type='submit' id="editar" name="editar" value="<?php echo $row_endereco['id']; ?>" onclick='funcao1("editar_endereco",<?php echo $row_endereco["id"]; ?>, <?php echo $id; ?>)' class='btn btn-info'>
                  <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </button>
                <button type='reset' id="excluir" name="excluir" value="<?php echo $row_endereco['id']; ?>" onclick='funcao1("excluir_endereco",<?php echo $row_endereco["id"]; ?>)' class='btn btn-danger'>
                  <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                </button>
              </td>
            </tr>
          </tbody>
      <?php }
      } ?>
      </table>

      <a type='submit' id="cad_endereco" name="cad_endereco" value="<?php echo $row_cadastro['id']; ?>" onclick='funcao1("endereco",<?php echo $row_cadastro["id"]; ?>)' class='btn btn-primary'>Cadastrar Endereço</a>
      <a type="submit" href="Lista.php" target="_self" class="btn btn-primary send-btn">Voltar pra Lista</a>
      </form>

      <script>
        var clientId = <?php echo $id ?>;
      </script>
</body>
</div>

</html>