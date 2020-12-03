<?php
session_start();
include_once("conexao.php");
include_once("testar_vazio.php");

$busca = strtolower($_POST['busca']);
$userID = $_SESSION['UsuarioID'];
$campo =  ($_POST['campo'] == "usuario.nome") ? $_POST['campo'] : "cadastro." . $_POST['campo'];

$where = ($_SESSION['UsuarioNivel'] == 0) ? " AND cadastro.usuario_id = '$userID'" : "";
if ($busca == 'ativo') {
  $busca = 1;
} else if ($busca == 'inativo') {
  $busca = 0;
}
$result_cadastro = "SELECT cadastro.*, usuario.nome as usuario_nome 
    FROM cadastro
    JOIN usuario
    ON cadastro.usuario_id = usuario.id
    WHERE $campo LIKE '%$busca%'
    $where
    ";

$resultado_cadastro = mysqli_query($conn, $result_cadastro);
$quantidade_cadastro = mysqli_num_rows($resultado_cadastro);

$nivel_necessario = 1;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Busca de clientes</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles/stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="Script/JavaScript.js"></script>
</head>
<style>
</style>

<body>
  <div class="fundo">
    <h1>Resultados da Busca</h1>

    <?php

    if ($quantidade_cadastro == 0) { ?>
      <h3 style='color:grey;'> Nenhum resultado encontrado</h3><br>
    <?php }

    if ($quantidade_cadastro > 0) {

    ?>
      <table name="busca" class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>DDD</th>
            <th>Tel</th>
            <th>Tel2</th>
            <th>Nasc</th>
            <th>Responsavel</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>

        <?php

        while ($rows_cadastro = mysqli_fetch_array($resultado_cadastro)) {

        ?>
          <tbody>
            <tr>
              <td><?php echo $rows_cadastro['id']; ?></td>
              <td><?php echo $rows_cadastro['nome']; ?></td>
              <td><?php echo $rows_cadastro['cpf']; ?></td>
              <td><?php echo $rows_cadastro['rg']; ?></td>
              <td><?php echo $rows_cadastro['email']; ?></td>
              <td><?php echo $rows_cadastro['ddd']; ?></td>
              <td><?php echo $rows_cadastro['tel']; ?></td>
              <td><?php echo $rows_cadastro['tel2']; ?></td>
              <td><?php echo $rows_cadastro['nasc']; ?></td>
              <td><?php echo $rows_cadastro['usuario_nome']; ?></td>
              <td><?php echo $rows_cadastro['atv'] ? 'Ativo' : 'Inativo'; ?></td>
              <td>
                <button type='submit' id="editar" name="editar" value="<?php echo $rows_cadastro['id']; ?>" onclick='funcao1("editar",<?php echo $rows_cadastro["id"]; ?>)' class='btn btn-info'>
                  <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </button>
                <button type='submit' id="visualizar" name="visualizar" value="<?php echo $rows_cadastro['id']; ?>" onclick='funcao1("visualizar",<?php echo $rows_cadastro["id"]; ?>)' class='btn btn-primary'>
                  <span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span>
                </button>

                <?php
                // Verifica se não há a variável da sessão que identifica o usuário
                if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] == $nivel_necessario)) { ?>
                  <button type='reset' id="excluir" name="excluir" value="<?php echo $rows_cadastro['id']; ?>" onclick='funcao1("excluir_cadastro",<?php echo $rows_cadastro["id"]; ?>)' class='btn btn-danger'>
                    <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                    <script>
                      var clientId = <?php echo $rows_cadastro['id'] ?>;
                    </script>
                  </button>
                <?php } ?>

              </td>
            </tr>
          </tbody>
      <?php }
      } ?>
      </table>
      <p><a type="submit" href="Lista.php" class='btn btn-primary' target="_self">Voltar</a></p>
  </div>
</body>

</html>