<?php

    include "seguranca.php";
   //conectar no banco de dados - incluir o arquivo do banco
   include "conecta.php";
   //pega as variaveis vindas do formulario
  
  $nome = $_GET['nome']; 
  //busca os dados do cliente no bd
  $sql = "select nome, login, senha from usuario where nome='$nome'"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $result = mysqli_query($_SG['link'], $sql);

  $dados = mysqli_fetch_array($result);

if ($dados != null ) {
   $nome = $dados['nome'];
   $login = $dados['login'];
   $senha = $dados['senha'];

    }
    else {
        echo "<script>alert('Funcionário não cadastrado');window.location.href='cadastro.html';</script>";
    }


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
        <form method="post" action="salvarFuncionario.php">
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
                <input type="text" name="login" id="login" value="<?php echo $login;?>" />
                <br />
                <label for="senha">Senha:</label>
                <br />
                <input type="password" name="senha" id="senha" value="<?php echo $senha;?>"/>
                <br />
                <div class="button">
					<button type="submit" name="salvar"><img src="css/img/icons/Salvar2.png"></button>
					<button type="submit" name="excluir"><img src="css/img/icons/excluir4.png"></button>
					<a href="http://www.worldbikesmecanica.tk/editarUsuario.php?nome=<?php echo $nome; ?>"><img src="css/img/icons/Editar4.png"></a>
                </div>
				
            </fieldset>
        </form>
    </div>

</body>

</html>