<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Listar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_usuario['id'] . "<br>";
			echo "Nome: " . $row_usuario['nome'] . "<br>";
			echo "RA: " . $row_usuario['ra'] . "<br>";
			echo "E-mail: " . $row_usuario['email'] . "<br>";
			echo "Sexo: " . $row_usuario['sexo'] . "<br>";
			echo "Turno: " . $row_usuario['turno'] . "<br>";
			echo "Curso: " . $row_usuario['curso'] . "<br>";
			echo "Semestre: " . $row_usuario['semestre'] . "<br>";

  $row_usuario['semestre'] = $row_usuario['semestre'] ;
  $row_usuario['curso'] = $row_usuario['curso'] ;
 if($row_usuario['curso'] == 'TADS' && $row_usuario['semestre'] == 1) {
echo "
<ul>
<li>Serviços e Infraestrutura de Redes</li>
<li>Algoritmos e Lógica de Programação</li>
<li>Leitura e Produção de Textos</li>
<li>Matemática</li>
<li>Arquitetura de Computadores</li>
<li>Bancos de Dados I</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'TADS' && $row_usuario['semestre'] == 2) {
echo "
<ul>
<li>Sistemas Operacionais</li>
<li>Estatística</li>
<li>Programação Web I</li>
<li>Programação Orientada a Objetos I</li>
<li>Programação para Dispositivos Embarcados</li>
<li>Engenharia de Software</li>
<li>Bancos de Dados II</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'TADS' && $row_usuario['semestre'] == 3) {
echo "
<ul>
<li>Auditoria e Segurança de Sistemas</li>
<li>Empreendedorismo e Inovação</li>
<li>Políticas de Educação Ambiental</li>
<li>Programação para Dispositivos Móveis</li>
<li>Programação Web II</li>
<li>Programação Orientada a Objetos II</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'TADS' && $row_usuario['semestre'] == 4) {
echo "
<ul>
<li>Programação para Aplicações Desktop</li>
<li>Tópicos Avançados em Programação</li>
<li>Gestão de Projetos Aplicados à TI </li>
<li>Aplicação ao Mercado I </li>
<li>Trabalho de Conclusão de Curso I</li>
<li>Comunicação Empresarial</li>
<li>Gestão de Negócios</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'TADS' && $row_usuario['semestre'] == 5) {
echo "
<ul>
<li>Inteligência Artificial </li>
<li>Extração e Análise de Dados</li>
<li>Direito Aplicado à Informática </li>
<li>Aplicação ao Mercado II </li>
<li>Trabalho de Conclusão de Curso II</li>
<li>Práticas e Políticas da Gestão de Pessoas</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Gastronomia' && $row_usuario['semestre'] == 1) {
echo "
<ul>
<li>Microbiologia, Higiene Alimentar e Legislação</li>
<li>Fundamentos da Gastronomia </li>
<li>Habilidades de Cozinha I</li>
<li>Turismo e Hospitalidade </li>
<li>Ética e Cultura (Sociologia e História da Alimentação)</li>
<li>Linguagem Gastronômica</li>
<li>Ciência dos Alimentos e Nutrição</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Gastronomia' && $row_usuario['semestre'] == 2) {
echo "
<ul>
<li>Princípios Básicos da Nutrição</li>
<li>Administração e Logística de Serviços de Alimentação</li>
<li>Planejamento de Cardápios</li>
<li>Tecnologia de Alimentos - Panificação</li>
<li>Habilidades de Cozinha II</li>
<li>Empreendedorismo e Sustentabilidade</li>
<li>Biossegurança do Trabalho em Serviços de Alimentação</li>
<li>Plano de Negócios em Alimentação</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Gastronomia' && $row_usuario['semestre'] == 3) {
echo "
<ul>
<li>Garde Manger (Cozinha Fria)</li>
<li>Bebidas e Coquetelaria</li>
<li>Gestão de Negócios e Custos</li>
<li>Marketing e Planejamento dos Serviços de Alimentação</li>
<li>Gastronomia Regional Brasileira</li>
<li>Cozinha Dietética e Alternativa</li>
<li>Tecnologia de Alimentos - Confeitaria</li>
<li>Planejamento de Eventos Gastronômicos</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Gastronomia' && $row_usuario['semestre'] == 4) {
echo "
<ul>
<li>Enologia e Harmonização</li>
<li>Gastronomia Hospitalar</li>
<li>Gastronomia Internacional I (Portuguesa, Espanhola, Mediterrânea e Oriental)</li>
<li>Gastronomia Internacional II (Norte-Americana, Andina, Peruana, Mexicana,
Argentina e Uruguaia)</li>
<li>Gastronomia Francesa e Italiana</li>
<li>Contabilidade – Custos e Orçamentos</li>
<li>Cozinha Contemporânea e Tendências</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 1) {
echo "
<ul>
<li>Comunicação Empresarial</li>
<li>Introdução à Contabilidade</li>
<li>Teoria Econômica</li>
<li>Introdução à Sociologia</li>
<li>Matemática Básica</li>
<li>Teorias Administrativas I</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 2) {
echo "
<ul>
<li>Economia Brasileira</li>
<li>Contabilidade Geral</li>
<li>Informática Básica</li>
<li>Matemática Financeira</li>
<li>Sociologia Aplicada</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 3) {
echo "
<ul>
<li>Organização, Sistemas e Métodos</li>
<li>Análise e Gestão de Custos</li>
<li>Direito e Legislação I</li>
<li>Estatística Aplicada</li>
<li>Metodologia da Pesquisa Científica</li>
<li>Psicologogia Aplicada</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 4) {
echo "
<ul>
<li>Contabilidade Gerencial</li>
<li>Negócios Internacionais</li>
<li>Direito e Legislação II</li>
<li>Filosofia e Ética</li>
<li>Respons. Social e Contabilidade Ambiental</li>
<li>Gestão daTecnologia da Informação</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 5) {
echo "
<ul>
<li>Administração de Recursos Humanos I</li>
<li>Administração Financeira I</li>
<li>Administração Mercadológica I</li>
<li>Administração de Produção</li>
<li>Negociações e Vendas</li>
<li>Administração de Pequenos Negócios e Redes</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 6) {
echo "
<ul>
<li>Administração de Recursos Humanos II</li>
<li>Administração Financeira II</li>
<li>Administração Mercadológica II</li>
<li>Administração Orçamentária</li>
<li>Administração Estratégica I</li>
<li>Administração de Recursos Materiais e Patrimoniais</li>
<li>Atividades Complementares I</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 7) {
echo "
<ul>
<li>Pesquisa Operacional</li>
<li>Elaboração e Análise de Projetos</li>
<li>Administração Estratégica II</li>
<li>Logística Empresarial</li>
<li>Trabalho de Conclusão de Curso I</li>
<li>Estágio Supervisionado</li>
</ul>
 ";
}
 else if($row_usuario['curso'] == 'Administração' && $row_usuario['semestre'] == 8) {
echo "
<ul>
<li>Empreendedorismo</li>
<li>Gestão da Qualidade</li>
<li>Gestão de Carreiras e Competências</li>
<li>Seminário Avançado</li>
<li>Trabalho de Conclusão de Curso II</li>
<li>Atividades Complementares II</li>
</ul>
 ";
}
else{
echo"
<p style='color:red;'>ERRO este curso não possui este semestre</p>";
}
			echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";

		}

		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>