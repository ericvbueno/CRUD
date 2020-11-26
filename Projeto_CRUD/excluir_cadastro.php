<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$clientId = filter_input(INPUT_GET, 'clientId', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	mysqli_query($conn, "DELETE FROM enderecos WHERE cliente_id='$id'");

	$result_cadastro = "DELETE FROM cadastro WHERE id='$id'";
	$resultado_cadastro = mysqli_query($conn, $result_cadastro);

	echo mysqli_error($conn);
}

//header("Location: /Projeto_CRUD/clientes_usuario.php?id=$clientId");exit();
header("Location: /Projeto_CRUD/Lista.php"); exit();

