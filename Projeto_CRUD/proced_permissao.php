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

echo $result_usuario;

$resultado_usuario = mysqli_query($conn, $result_usuario);

echo mysqli_error($conn);

$_SESSION['UsuarioNivel'] = $nivel;
$testenivel = $_SESSION['UsuarioNivel'];

if($testenivel == 1){
    header('Location: /Projeto_CRUD/usuarios.php');
    exit();
}
if($testenivel == 0){
    session_destroy(); // Destrói a sessão limpando todos os valores salvos
    
    header('Location: /Projeto_CRUD/login.php');
    exit();
}

/*echo json_encode($result_usuario);*/
?>

<!DOCTYPE html>
<p><a href="usuarios.php" target="_self">Exibir lista de Usuarios</a></p>
</html>