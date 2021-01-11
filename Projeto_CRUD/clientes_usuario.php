<?php
session_start();
include_once("conexao.php");
include_once("nivel/testar_vazio.php");
include_once("Link/links.html");

$userID = $_SESSION['UsuarioID'];

// Bloqueia o acesso a Lista de outro usuario trocando o ID no campo de busca
if($_SESSION['usuarioNivel'] == '0' && $userID != $_GET['id'] ) {
  header("Location: clientes_usuario.php?id=$userID");
  exit();
}

$nivel_necessario = 1;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cadastro = "SELECT cadastro.*, usuario.nome as usuario_nome, usuario.id as id_usuario
 FROM cadastro
 JOIN usuario
 on cadastro.usuario_id = usuario.id
  WHERE usuario_id = '$id'";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);
$quantidade_cadastro = mysqli_num_rows($resultado_cadastro);

$cadastros = mysqli_fetch_all($resultado_cadastro, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Clientes Usuarios</title>
    <meta charset="utf-8">
  <!--  <script defer src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
    <script src="Script/JavaScript.js"></script>
  </head>
  <body>
  <div class="fundo">
  <a type="submit" href="proced/logout.php" target="_self" class='btn btn-primary'>Logout</a>

    <h1>Lista de Clientes: <?php echo $cadastros[0]['usuario_nome'];?></h1>
    
    <p><form id="divBusca" method="POST" action="busca.php">
   

   <label>Buscar:</label>
   <input type="text" id="txtBusca" name="busca" class="form-control"/>

   <p><label>Por:</label>
   <select name="campo" id="campo">
     <option ></option>
     <option name="tipo" value="id">ID</option>
     <option value="nome">Nome</option>
     <option value="cpf">CPF</option>
     <option value="rg">RG</option>
     <option value="email">Email</option>
     <option value="ddd">DDD</option>
     <option value="tel">Tel</option>
     <option value="tel2">Tel2</option>
     <option value="nasc">Nasc</option>
     <option value="atv">Status</option>
</select>
   </p>

 <button id="btnBusca" class="btn btn-primary form-control" >
 <span class='glyphicon glyphicon-search' aria-hidden='true'></span>
 </button>
</form>
</p><br>

    <?php

if($quantidade_cadastro == 0){ ?>
  <h3 style='color:grey;'> Este Usuario não possui clientes cadastrados</h3><br>
<?php }

     if($quantidade_cadastro > 0) {

    ?>
      <table  class="table table-bordered"> 
        <thead>
          <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>RG</th>
          <th>Email</th>
          <th>DDD</th>
          <th>Tel</th>
          <th>Tel2</th>
          <th>Nasc</th>
          <th>Status</th>
          <th>Ações</th>
          </tr>
        </thead>
      <?php
        foreach($cadastros as $cadastro){
      ?>
      <tbody>
          <tr>
          <td><?php echo $cadastro['id'];?></td> 
          <td><?php echo $cadastro['nome']; ?></td> 
          <td><?php echo $cadastro['cpf'];?> </td> 
          <td> <?php echo $cadastro['rg']; ?></td> 
          <td> <?php echo $cadastro['email'];?></td> 
          <td> <?php echo $cadastro['ddd'];?></td> 
          <td> <?php echo $cadastro['tel'];?></td> 
          <td> <?php echo $cadastro['tel2'];?></td> 
          <td> <?php echo $cadastro['nasc'];?></td> 
          <td> <?php echo $cadastro['atv'] ? 'Ativo' : 'Inativo';?></td>
          <td> 
          <button type='submit' id="editar" name="editar" value="<?php echo $cadastro['id'];?>"onclick='funcao1("editar",<?php echo $cadastro["id"];?>)'  class='btn btn-info'>
            <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
          </button>
          <button type='submit' id="visualizar" name="visualizar" value="<?php echo $cadastro['id'];?>" onclick='funcao1("visualizar",<?php echo $cadastro["id"];?>)'  class='btn btn-primary'>
            <span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span>
          </button> 
          <?php
 if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] == $nivel_necessario)) {?>
          <button type='reset' id="excluir" name="excluir" value="<?php echo $cadastro['id'];?>"onclick='funcao1("excluir_cadastro",<?php echo $cadastro["id"];?>)'  class='btn btn-danger'>
            <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
          </button>
          <?php }?>
            </td>
            </tr>
            </tbody>
      <?php }
      } ?>
      </table>
      <a type='submit' id="cad_cliente" name="cad_cliente" value="<?php echo $id;?>"onclick='funcao1("cadastro",<?php echo $id;?>)'  class='btn btn-primary'>Cadastrar Cliente</a>
  
      <?php
      if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] == $nivel_necessario)) {?>
         <a type="submit" href="usuarios.php" target="_self" class="btn btn-primary send-btn">Voltar</a>
          <?php }?>
  
    <script>
      var clientId = <?php echo $id ?>;
    </script>
  </body>
  </div>
</html>

