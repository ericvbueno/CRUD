function funcao1(acao,id = 0){
          const botao = acao
          const id_cadastro = id
          if(botao == 'cadastro'){
            console.log(id_cadastro);
            window.location.href=`formulario.php?id=${id_cadastro}`;
        }
          if(botao == 'editar'){
            switch(confirm("Deseja editar ?")){
            case true:
             window.location.href=`Editar.php?id=${id_cadastro}`;
              break;
              case false:
                break;
            }
          }
          if(botao == 'cancelar'){
            alert("Cancelado !");
            document.location.href = "/Projeto_CRUD/Lista.php";
          }
          if(botao == 'visualizar'){
            console.log(id_cadastro);
             window.location.href=`visualizar.php?id=${id_cadastro}`;
          }
          if(botao == 'endereco'){
              console.log(id_cadastro);
              window.location.href=`enderecos.php?id=${id_cadastro}`;
          }
          if(botao == 'editar_endereco'){
            console.log(id_cadastro);
            switch(confirm("Deseja editar o endereço?")){
            case true:
              window.location.href=`edit_endereco.php?id=${id_cadastro}`;
              break;
              case false:
                break;
            }
          }
          if(botao == 'excluir_endereco'){
            switch(confirm("Deseja realmente excluir o endereço?")){
            case true:
              window.location.href=`excluir_endereco.php?id=${id_cadastro}&clientId=${clientId}`;
              break;
              case false:
                break;
            }
          }
          if(botao == 'excluir_cadastro'){
            switch(confirm("Deseja realmente excluir o cadastro do cliente?")){
            case true:
              window.location.href=`excluir_cadastro.php?id=${id_cadastro}&clientId=${clientId}`;
              break;
              case false:
                break;
            }
          }
          if(botao == 'alterar'){
            switch(confirm("Deseja alterar as permissões de usuario?")){
            case true:
              window.location.href=`autorizacao.php?id=${id_cadastro}`;
              break;
              case false:
                break;
            }
          }
          if(botao == 'clientes_usuario'){
            console.log(id_cadastro);
             window.location.href=`clientes_usuario.php?id=${id_cadastro}`;
          }
        }

$("#cadastroform").submit(function(e) {
  
  alert('Usuário Cadastrado');
  document.location.href = "/Projeto_CRUD/Lista.php";
});
