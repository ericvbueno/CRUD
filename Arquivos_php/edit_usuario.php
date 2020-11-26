<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
<style>
     label{
         display: inline-block;
         width: 120px;
         text-align: right;
         line-height: 2;
}
</style>
	<body>
		
		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label> RA: </label>
			<input type="text" name="ra" placeholder="Digite seu RA corretamente" value="<?php echo $row_usuario['ra']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label>Turno:</label>

			 <input type="text" name="turno" placeholder="Selecione seu turno ao lado" value="<?php echo $row_usuario['turno']; ?>">
			 <input type="checkbox" name="turno" id="turno" value="Manhã">Manhã
			 <input type="checkbox" name="turno" id="turno" value="Tarde">Tarde
			 <input type="checkbox" name="turno" id="turno" value="Noite">Noite <br><br>

			<label>Semestre:</label>

			 <input type= "text" name="semestre" placeholder="Marque abaixo o semestre" value="<?php echo $row_usuario['semestre']; ?>"><br><br>
			 <input type="radio" name="semestre" value="1">Primeiro
 			 <input type="radio" name="semestre" value="2">Segundo
			 <input type="radio" name="semestre" value="3">Terceiro
 			 <input type="radio" name="semestre" value="4">Quarto
 			 <input type="radio" name="semestre" value="5">Quinto 
			 <input type="radio" name="semestre" value="6">Sexto
			 <input type="radio" name="semestre" value="7">Setimo
			 <input type="radio" name="semestre" value="8">Oitavo<br><br>
			
			 <label>Curso:</label>

			 <select name="curso" id="curso">
			 <option value="<?php echo $row_usuario['curso']; ?>"></option>
 			 <option value="TADS">TADS</option>
			 <option value="Gastronomia">Gastronomia</option>
			 <option value="Administração">Administração</option> <br><br>	

			<input type="submit" value="Editar"><br><br>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		</form>
	</body>
</html>