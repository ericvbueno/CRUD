<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>		
	</head>
<style>
 figure{
  text-align:left;
}
 img{
   width: 200px;
}
</style>
	<body>
		<h1>Cadastrar Aluno</h1>
<figure>
<img src="Einstein.png" alt="Einstein Limeira"/>
</figure>
<form name="formulario" method="POST" action="proc_cad_usuario.php">
<p>Nome:<br>
 <input type="text" name="nome" id="nome" size="30" maxlength="30"></p>
<p>RA:<br>
 <input type="text" name="ra" id="ra" size="10" maxlength="30" placeholder="0000/00-0"></p>
<p>Email:<br>
<input type="email" name="email" id "email" placeholder="Digite o seu e-mail"></p>
<p>Sexo:<br>
 <input type="radio" name="sexo" value="Masculino">Masculino
 <input type="radio" name="sexo" value="Feminino">Feminino</p>
<p>Selecione o turno:<br>
 <input type="checkbox" name="turno" id="turno" value="Manhã">Manhã
 <input type="checkbox" name="turno" id="turno" value="Tarde">Tarde
 <input type="checkbox" name="turno" id="turno" value="Noite">Noite</p>
<p>Curso:<br>
<select name="curso" id="curso">
 <option value="vazio"> </option>
 <option value="TADS">TADS</option>
 <option value="Gastronomia">Gastronomia</option>
 <option value="Administração">Administração</option>
</select></p>
<p>Semestre:<br>
 <input type="radio" name="semestre" value="1">Primeiro
 <input type="radio" name="semestre" value="2">Segundo
 <input type="radio" name="semestre" value="3">Terceiro
 <input type="radio" name="semestre" value="4">Quarto
 <input type="radio" name="semestre" value="5">Quinto
 <input type="radio" name="semestre" value="6">Sexto
 <input type="radio" name="semestre" value="7">Setimo
 <input type="radio" name="semestre" value="8">Oitavo</p>
<p><input type="submit" value="Cadastrar"></p>


		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
</form>
</body>
</html>