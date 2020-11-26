<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ra = filter_input(INPUT_POST, 'ra', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "RA: $ra <br>";
//echo "E-mail: $email <br>";
//echo "Turno: $turno <br>";
//echo "Curso: $curso <br>";
//echo "Semestre: $semestre <br>";

$result_usuario = "UPDATE usuarios SET nome='$nome', ra='$ra', email='$email', turno='$turno', curso='$curso', semestre='$semestre', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
