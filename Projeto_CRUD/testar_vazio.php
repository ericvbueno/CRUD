<?php 
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) or ($_SESSION['UsuarioNivel'] == "")) {

  session_destroy(); // Destrói a sessão limpando todos os valores salvos

  // Redireciona o usuario para sua lista de clientes
  header("Location: login.php");
  exit();
}
?>