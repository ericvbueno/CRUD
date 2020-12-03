<?php
session_start();
include_once("../conexao.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'cliente_email', FILTER_SANITIZE_EMAIL);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
/*
    echo "Nome: $nome <br>";
    echo "Email: $email <br>";
    echo "Login: $login <br>";
    echo "Senha: $senha <br>";
    */

    $result_login = "INSERT INTO usuario (nome, email, usuario_login, senha) VALUES ('$nome', '$email', '$login', '$senhaSegura')";


    $resultado_login = mysqli_query($conn, $result_login);

   /* echo $result_login;
    
    echo mysqli_error($conn);*/

   header('Location: /Projeto_CRUD/login.php');

   /* echo json_encode($result_login);*/
   ?>
  <!--<!DOCTYPE html>
   <p><a href="cad_login.php" target="_self">Voltar a tela de registro</a></p>
   </html>
-->
