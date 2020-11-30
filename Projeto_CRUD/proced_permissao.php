<?php
session_start();
include_once("conexao.php");

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$id =  mysqli_real_escape_string($conn, $_POST['id']);
$nome =  mysqli_real_escape_string($conn, $_POST['nome']);
$nivel = mysqli_real_escape_string($conn, $_POST['permissao']);

echo "Id: $id <br>";
echo "Nome: $nome <br>";
echo "Nivel: $nivel <br>";

$result_usuario = "UPDATE usuario SET nivel='$nivel' WHERE id = '$id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);

$testenivel = $_SESSION['UsuarioNivel'];
$testeID = $_SESSION['UsuarioID'];

if($id == $testeID && $testenivel == 1) {
    session_destroy();
    header('Location: /Projeto_CRUD/login.php');
    exit();
}

header('Location: /Projeto_CRUD/usuarios.php');

?>

<!DOCTYPE html>
<p><a href="usuarios.php" target="_self">Exibir lista de Usuarios</a></p>
</html>