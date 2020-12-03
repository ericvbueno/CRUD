<?php
session_start();
include_once("conexao.php");
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) or ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {

  // Redireciona o usuario para sua lista de clientes
  header("Location: login.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Usuarios</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles/stylesheets.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="JavaScript.js"></script>
</head>
<style>
</style>

<body>
  <div class="fundo">
    <h1>Lista de Usuarios</h1>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Login</th>
          <th>Nivel</th>
          <th>Ações</th>
        </tr>
      </thead>
      <?php
      $result_usuario = "SELECT * FROM usuario";
      $resultado_usuario = mysqli_query($conn, $result_usuario);
      while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

      ?>
        <tbody>
          <tr>
            <td><?php echo $row_usuario['id']; ?></td>
            <td><?php echo $row_usuario['nome']; ?></td>
            <td><?php echo $row_usuario['email']; ?> </td>
            <td> <?php echo $row_usuario['usuario_login']; ?></td>
            <td> <?php echo $row_usuario['nivel'] ? 'Administrador' : 'Usuario'; ?></td>
            <td>
              <button type='submit' id="editar" name="editar" value="<?php echo $row_usuario['id']; ?>" onclick='funcao1("alterar",<?php echo $row_usuario["id"]; ?>)' class='btn btn-info'>
                <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
              </button>
              <button type='submit' id="visualizar" name="visualizar" value="<?php echo $row_usuario['id']; ?>" onclick='funcao1("clientes_usuario",<?php echo $row_usuario["id"]; ?>)' class='btn btn-warning'>
                <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
              </button>
            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
    <a type="submit" href="Lista.php" target="_self" class="btn btn-primary send-btn">Voltar</a>
  </div>
</body>

</html>