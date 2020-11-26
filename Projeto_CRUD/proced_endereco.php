<?php
session_start();
include_once("conexao.php");


$cep = filter_input(INPUT_POST, 'cliente_cep', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'cliente_rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'cliente_bairro', FILTER_SANITIZE_STRING);
$num = filter_input(INPUT_POST, 'cliente_num', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, 'cliente_cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$principal = filter_input(INPUT_POST, 'princ', FILTER_SANITIZE_NUMBER_INT);
$cliente_id = filter_input(INPUT_POST, 'cliente_id', FILTER_SANITIZE_NUMBER_INT);

    /*echo "CEP: $cep <br>";
    echo "Rua: $rua <br>";
    echo "Bairro: $bairro <br>";
    echo "Num: $num <br>";
    echo "Cidade: $cidade <br>";
    echo "Estado: $estado <br>";
    echo "Tipo de Endereço: $principal <br>";
    echo "ID Cliente: $cliente_id <br>";*/
    

    if($principal == 1) {
        $sql = "UPDATE enderecos SET principal = 0 WHERE cliente_id = '$cliente_id'";
        $result_update = mysqli_query($conn, $sql);
        $rowsAffected = mysqli_affected_rows($result_update);
    }
      
    $result_endereco = "INSERT INTO enderecos (cep, rua, bairro, numero, cidade, estado, principal, cliente_id) VALUES ('$cep', '$rua', '$bairro', '$num', '$cidade', '$estado', '$principal', '$cliente_id')";

    $resultado_endereco = mysqli_query($conn, $result_endereco);

    header("Location: /Projeto_CRUD/visualizar.php?id=$cliente_id");
