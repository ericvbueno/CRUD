<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ra = filter_input(INPUT_POST, 'ra', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "RA: $ra <br>";
//echo "E-mail: $email <br>";
//echo "Sexo: $sexo <br>";
//echo "Turno: $turno <br>";
//echo "Curso: $curso <br>";
//echo "Semestre: $semestre <br>";


$result_usuario = "INSERT INTO usuarios (nome, ra, email, sexo, turno, curso, semestre, created) VALUES ('$nome', '$ra', '$email','$sexo', '$turno', '$curso', '$semestre', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cad_usuario.php");
}
