<?php
session_start();
include_once("conexao.php");
include_once("nivel/testar_nivel.php");
include_once("Link/links.html");

$id = $_SESSION['UsuarioID'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Lista de Clientes</title>
  <meta charset="utf-8">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<style>
</style>

<body>
  <div class="fundo">
    <a type="submit" href="proced/logout.php" target="_self" class='btn btn-primary'>Logout</a>
    <h1>Lista de Clientes</h1>

    <p>
      <form id="divBusca" method="POST" action="busca.php">


        <label>Buscar:</label>
        <input type="text" id="txtBusca" name="busca" class="form-control" />

        <p><label>Por:</label>
          <select name="campo" id="campo">
            <option></option>
            <option name="tipo" value="id">ID</option>
            <option value="nome">Nome</option>
            <option value="cpf">CPF</option>
            <option value="rg">RG</option>
            <option value="email">Email</option>
            <option value="ddd">DDD</option>
            <option value="tel">Tel</option>
            <option value="tel2">Tel2</option>
            <option value="nasc">Nasc</option>
            <option value="usuario.nome">Responsavel</option>
            <option value="atv">Status</option>
          </select>
        </p>

        <button id="btnBusca" class="btn btn-primary form-control">
          <span class='glyphicon glyphicon-search' aria-hidden='true'></span>
        </button>
      </form>
    </p>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Cliente</th>
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
      $result_cadastro = "SELECT cadastro.*, usuario.nome as usuario_nome 
      FROM cadastro
      JOIN usuario
      ON cadastro.usuario_id = usuario.id ORDER BY cadastro.id";
      $resultado_cadastro = mysqli_query($conn, $result_cadastro);
      while ($row_cadastro = mysqli_fetch_assoc($resultado_cadastro)) {

      ?>
        <tbody>
          <tr>
            <td><?php echo $row_cadastro['id']; ?></td>
            <td><?php echo $row_cadastro['nome']; ?></td>
            <td><?php echo $row_cadastro['cpf']; ?> </td>
            <td> <?php echo $row_cadastro['rg']; ?></td>
            <td> <?php echo $row_cadastro['email']; ?></td>
            <td> <?php echo $row_cadastro['ddd']; ?></td>
            <td> <?php echo $row_cadastro['tel']; ?></td>
            <td> <?php echo $row_cadastro['tel2']; ?></td>
            <td> <?php echo $row_cadastro['nasc']; ?></td>
            <td><?php echo $row_cadastro['usuario_nome']; ?></td>
            <td> <?php echo $row_cadastro['atv'] ? 'Ativo' : 'Inativo'; ?></td>
            <td>
              <button type='submit' id="editar" name="editar" value="<?php echo $row_cadastro['id']; ?>" onclick='funcao1("editar",<?php echo $row_cadastro["id"]; ?>)' class='btn btn-info'>
                <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
              </button>

              <button type='submit' id="visualizar" name="visualizar" value="<?php echo $row_cadastro['id']; ?>" onclick='funcao1("visualizar",<?php echo $row_cadastro["id"]; ?>)' class='btn btn-primary'>
                <span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span>
              </button>

              <button type='reset' id="excluir" name="excluir" value="<?php echo $row_cadastro['id']; ?>" onclick='funcao1("excluir_cadastro",<?php echo $row_cadastro["id"]; ?>)' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                <script>
                  var clientId = <?php echo $row_cadastro['id'] ?>;
                </script>
              </button>

            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
    <a type="submit" href="usuarios.php" class='btn btn-primary' target="_self">Exibir os usuarios do Sistema</a>
    <a type='submit' id="cad_cliente" name="cad_cliente" value="<?php echo $id;?>"onclick='funcao1("cadastro",<?php echo $id;?>)'  class='btn btn-primary'>Cadastrar Cliente</a>
  </div>
</body>

</html>