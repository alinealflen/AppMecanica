<?php

    include "seguranca.php";
   //conectar no banco de dados - incluir o arquivo do banco
   include "conecta.php";
   //pega as variaveis vindas do formulario
  
  $nome = $_GET['nome']; 
  //busca os dados do cliente no bd
      if(isset($_POST['salvar'])){
		
		//$nome = ($_POST["nome"]);
        $login = ($_POST["login"]);
        $senha = ($_POST["senha"]);
	
		$sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senha' where nome='$nome'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Usuário atualizado');history.back();</script>";
	
	}//fecha o if editar
?> 

<html>

<head>
    <meta charset="utf-8">
    <title>Cadastrar funcionário - World Bikes</title>

    <link href="css/ordemstyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/fundo.css" type="text/css">
</head>

<body id="fundo">

    <img src="css/img/logo.png" alt="World Bikes" width="20%">
    <a href="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>

    <nav id="menu">
        <ul>
            <li><a href="http://www.worldbikesmecanica.tk/agenda.php">Agenda</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php">Funcionários</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/ordemServico.php">Ordem de Serviço</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/cliente.php">Cliente</a></li>
        </ul>
        </nav>

        <hr style="background-color: #33c208">

    <h1 id="titulo">Cadastro de Usuário - World Bikes</h1>

    <div id=form2>
        <form method="post" action="">
            <fieldset id=borda>

                <label for="name">Nome:</label> 

                <br />
                <input type="text" name="nome" id="nome" value="<?php echo $nome;?>"/>
				<!--<div class="button">
                    <button type="submit" name="buscar"><img src="http://www.worldbikesmecanica.tk/icons/buscar.png"></button>
                    <input a href="buscaUsuario.php" src="http://www.worldbikesmecanica.tk/icons/buscar.png" type="image">
                </div>-->
        
                <br />
                <label for="login">Login: </label>
                <br />
                <input type="text" name="login" id="login"  />
                <br />
                <label for="senha">Senha:</label>
                <br />
                <input type="password" name="senha" id="senha" />
                <br />
                <div class="button">
					<button type="submit" name="salvar"><img src="css/img/icons/Salvar2.png"></button>
				
                </div>
				
            </fieldset>
        </form>
    </div>

</body>

</html>