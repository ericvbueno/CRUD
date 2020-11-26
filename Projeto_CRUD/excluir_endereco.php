<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$clientId = filter_input(INPUT_GET, 'clientId', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_endereco = "DELETE FROM enderecos WHERE id='$id'";
	$resultado_endereco = mysqli_query($conn, $result_endereco);
}

header("Location: /Projeto_CRUD/visualizar.php?id=$clientId");