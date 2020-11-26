<?php
session_start();
include_once("conexao.php");

$id =  mysqli_real_escape_string($conn, $_POST['id']);
$nome =  mysqli_real_escape_string($conn, $_POST['cliente_nome']);
$cpf = mysqli_real_escape_string($conn, $_POST['cliente_cpf']);
$rg = mysqli_real_escape_string($conn, $_POST['cliente_rg']);
$email = mysqli_real_escape_string($conn, $_POST['cliente_email']);
$ddd = mysqli_real_escape_string($conn, $_POST['cliente_ddd']);
$tel = mysqli_real_escape_string($conn, $_POST['cliente_tel']);
$tel2 = mysqli_real_escape_string($conn, $_POST['cliente_tel2']);
$nasc = mysqli_real_escape_string($conn, $_POST['cliente_nasc']);
$atv =  mysqli_real_escape_string($conn, $_POST['atv']);

    /*$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'cliente_nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cliente_cpf', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'cliente_rg', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'cliente_email', FILTER_SANITIZE_EMAIL);
    $ddd = filter_input(INPUT_POST, 'cliente_ddd', FILTER_SANITIZE_NUMBER_INT);
    $tel = filter_input(INPUT_POST, 'cliente_tel', FILTER_SANITIZE_NUMBER_INT);
    $tel2 = filter_input(INPUT_POST, 'cliente_tel2', FILTER_SANITIZE_NUMBER_INT);
    $nasc = filter_input(INPUT_POST, 'cliente_nasc', FILTER_SANITIZE_STRING);
    $atv = filter_input(INPUT_POST, 'atv', FILTER_SANITIZE_NUMBER_INT);*/

echo "Id: $id <br>";
echo "Nome: $nome <br>";
echo "CPF: $cpf <br>";
echo "RG: $rg <br>";
echo "E-mail: $email <br>";
echo "DDD: $ddd <br>";
echo "Tel: $tel <br>";
echo "Tel2: $tel2 <br>";
echo "Nascimento: $nasc <br>";
echo "ATV: $atv <br>";


$result_cadastro = "UPDATE cadastro 
                    SET 
                        nome='$nome', 
                        cpf='$cpf', 
                        rg='$rg', 
                        email='$email', 
                        ddd='$ddd', 
                        tel='$tel', 
                        tel2='$tel2', 
                        nasc='$nasc', 
                        atv='$atv' 
                    wHERE id='$id'";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);

echo mysqli_error($conn);

header('Location: /Projeto_CRUD/Lista.php');

/*echo json_encode($result_cadastro);*/
?>

<!DOCTYPE html>
<p><a href="Lista.php" target="_self">Exibir lista de Clientes</a></p>
</html>