<?php
include_once("conexao.php");
if (!isset($_SESSION)) session_start();

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!isset($_POST['login']) || !isset($_POST['pwd'])) {
  header('Location: /Projeto_CRUD/login.php');
  exit();
}
$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, $_POST['pwd']);

$teste_verificação = "SELECT id, nome, nivel, senha FROM usuario WHERE usuario_login = '$login' LIMIT 1 ";
$result_teste = mysqli_query($conn, $teste_verificação);

$row_teste = mysqli_fetch_assoc($result_teste);

if (password_verify($password, $row_teste['senha'])) {

  /* echo "Aqui: ";
  echo $row_teste['id'];
  echo $row_teste['nome'];
  echo $row_teste['nivel'];*/

  $_SESSION['UsuarioID'] = $row_teste['id'];
  $_SESSION['UsuarioNome'] = $row_teste['nome'];
  $_SESSION['UsuarioNivel'] = $row_teste['nivel'];

  // Redireciona o visitante
  header("Location: Lista.php");
  exit;
} else {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado 
?>
  <script>
    alert('Login ou Senha invalidos !');
    document.location.href = "/Projeto_CRUD/login.php";
  </script>
<?php }
?>