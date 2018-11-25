<?php

   //conectar no banco de dados - incluir o arquivo do banco
   include "seguranca.php";
   include "conecta.php";
   //pega as variaveis vindas do formulario
  $cpf = trim($_GET["cpf"]);
  //busca os dados do cliente no bd
  $sql = "select nome, cpf, telefone, modelo, aro, cor from  cliente where cpf=$cpf"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $result = mysqli_query($_SG['link'], $sql);

  $dados = mysqli_fetch_array($result);

if ( $dados != null ) {

   $cpf = $dados['cpf'];
   $nome = $dados['nome'];
   $telefone = $dados['telefone'];
   $aro = $dados['aro'];
   $modelo = $dados['modelo'];
   $cor = $dados['cor'];
    }
    else {
        echo "<script>alert('Cliente não cadastrado');window.location.href='cadastroCliente.html';</script>";
    }


?> 

 <html>

<head>
    <meta charset="utf-8">
    <title>Area cadastro do Cliente - World Bikes</title>
    <link href="css/ordemstyle.css" rel="stylesheet" type="text/css">
    <link href="css/fundo.css" rel="stylesheet" type="text/css">
</head>

<body id="fundo">
    <img src="css/img/logo.png" alt="World Bikes" width="20%">
    <a heref="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>

    <nav id="menu">
        <ul>
            <li><a href="http://www.worldbikesmecanica.tk/agenda.php">Agenda</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php">Funcionários</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/ordemServico.php">Ordem de Serviço</a></li>
            <li><a class="active" href="http://www.worldbikesmecanica.tk/cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Area do Cliente</h1>

    <div id=form4>
    <form method="POST" action="salvarCliente.php">
            <fieldset id=borda>
                <label for="cpf">CPF: </label>
                <br />
                <input type="text" name="cpf" id="cpf" value="<?php echo $cpf;?>" />
                <br />
                <label for="name">Nome do cliente:</label>
                <br />
                <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" />
                <br />
                <label for="telefone">Telefone:</label>
                <br />
                <input type="text" name="telefone" id="telefone" value="<?php echo $telefone;?>" />
                <br />
                <label for="modelo">Modelo da bicicleta:</label>
                <br />
                <input type="text" name="modelo" id="modelo" value="<?php echo $modelo;?>"/>
                <br />
                <label for="aro">Aro da bicicleta: </label>
                <br />
                <input type="text" name="aro" id="aro" value="<?php echo $aro;?>"/>
                <br />
                <label for="cor">Cor da bicicleta:</label>
                <br />
                <input type="text" name="cor" id="cor" value="<?php echo $cor;?>" />
                <br />
                <div class="button">
					<button type="submit" name="salvar"><img src="css/img/icons/Salvar2.png"></button>
					<button type="submit" name="excluir"><img src="css/img/icons/excluir4.png"></button>
					<a href="http://www.worldbikesmecanica.tk/editar.php?cpf=<?php echo $cpf; ?>"><img src="css/img/icons/Editar4.png"></a>
                </div>
            </fieldset>
        </form>
    </div>
    

</body>


</html> 
