<?php
	//conexao com o banco ( servidor, usuario, senha);
	//mysqli_connect("localhost:3306","root","alflen1104","oficina");
	$_SG['servidor'] = 'localhost:3306';    // Servidor MySQL
	$_SG['usuario'] = 'root';          // Usuário MySQL
	$_SG['senha'] = 'alflen1104';                // Senha MySQL
	$_SG['banco'] = 'oficina';            // Banco de dados MySQ
	$_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) 
		or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");

	//conexao com o banco  (nome do banco de dados) ou mensagem de erro (mensagem de erro);
	mysqli_select_db($_SG['link'], $_SG['banco']) 
		or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

?>