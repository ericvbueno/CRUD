<?php
session_start();
include_once("conexao.php");

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

 // Verifica se não há a variável da sessão que identifica o usuário
 if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] == "")) {
     
  session_destroy(); // Destrói a sessão limpando todos os valores salvos

  // Redireciona o usuario para sua lista de clientes
  header("Location: login.php");
  exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_login = "SELECT * FROM usuario WHERE id = '$id'";
$resultado_login = mysqli_query($conn, $result_login);
$row_usuario = mysqli_fetch_assoc($resultado_login);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Autorizacões de Usuários</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheets.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="JavaScript.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="titulo">Alteração de autorizações para Usuários</h2>

        <form method="POST" action="proced_permissao.php" onsubmit="alert('Alteração Salva !')">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

<p><label class="control-label col-sm-2" for="nome">Nome:</label>
<input type="text" class="form-control" readonly="true" id="nome" name="nome" value="<?php echo $row_usuario['nome']; ?>"></p><br>
<p><label>Permissão:</label><br>
<input type="radio" name="permissao" id="permissao" value="1" <?php echo $row_usuario['nivel'] == 1 ? 'checked' : '' ?>>Administrador
<input type="radio" name="permissao" id="permissao" value="0" <?php echo $row_usuario['nivel'] != 1 ? 'checked' : '' ?>>Usuario</p>

<button type="submit" class="btn btn-success send-btn">Salvar</button>
</form>
    </div>  
</body>
</html>