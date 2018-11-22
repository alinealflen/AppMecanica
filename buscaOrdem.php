<?php

    include "seguranca.php";
   //conectar no banco de dados - incluir o arquivo do banco
   include "conecta.php";
    
   //pega as variaveis vindas do formulario

    $idOrdem = $_GET['idOrdem']; 

 

if($idOrdem != null){
    
   $sql = "select idOrdem, statusOrdem, valorTotal, valorMO, valorPecas, descricaoServico, cpfCliente from ordemServico where idOrdem='$idOrdem'"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $resultOrdem = mysqli_query($_SG['link'], $sql);
    
   $dadosOrdem = mysqli_fetch_array($resultOrdem);


   $idOrdem = $dadosOrdem['idOrdem'];
   $status = $dadosOrdem['statusOrdem'];
   $valorTotal = $dadosOrdem['valorTotal'];
   $valorMO = $dadosOrdem['valorMO'];
   $valorPecas = $dadosOrdem['valorPecas'];
   $descricao = $dadosOrdem['descricaoServico'];
   $cpf = $dadosOrdem['cpfCliente'];
   
   //busca os dados do cliente no bd
   $sql = "select nome, cpf, telefone, modelo, aro, cor from  cliente where cpf='$cpf'"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
    $result = mysqli_query($_SG['link'], $sql);
   
   $dados = mysqli_fetch_array($result);
   
    $cpf = $dados['cpf'];
    $nome = $dados['nome'];
    $telefone = $dados['telefone'];
   $aro = $dados['aro'];
   $modelo = $dados['modelo'];
   $cor = $dados['cor'];
   
    }
    else {
        echo "<script>alert('Ordem de serviço não cadastrada');window.location.href='agenda.php';</script>";
    }
?> 

<html>

<head>
    <meta charset="utf-8">
    <title>Ordem de serviço - World Bikes</title>
 
    <link href="css/fundo.css" rel="stylesheet" type="text/css">
</head>

<body id="fundo">
    <img src="css/img/logo.png" alt="World Bikes" id="logo">
    <a href="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>

    <nav id="menu">
        <ul>
            <li><a href="http://www.worldbikesmecanica.tk/agenda.php">Agenda</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php">Funcionários</a></li>
            <li><a class="active" href="http://www.worldbikesmecanica.tk/ordemServico.php">Ordem de Serviço</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Ordem de Serviço</h1>

    <div id=form4>
    <form method="POST" action="">
            <fieldset id=borda>
                <label for="cpf">CPF: </label>
                <br />
                <input type="text" name="cpf" id="cpf" class="campo1" value="<?php echo $cpf;?>"  />
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
            </fieldset>
        </form>
    </div>
    <div>
        <form id=form3 method="post" action="salvaOrdem.php">
            <fieldset id=borda>
                <label for="servico" class="campo1"  >OS nº:</label>
                <input type="text" name="idOrdem" id="numOS" class="campo1" value="<?php echo $idOrdem;?>" />
                <br />
                <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf;?>" />
				<br />
                <!--<textarea rows="5" cols="50" maxlength="500"></textarea> -->
                <label for="cor">Status OS :</label>
				<input type="text" name="statusOS" id="numOS" value="<?php echo $status;?>" />
                <br />
				<label for="cor">Mão de Obra R$:</label>
				<input type="text" name="valorMO" id="precos1" value="<?php echo $valorMO;?>" />
                <br />
				<label for="cor">Peças R$:</label>
				<input type="text" name="valorPecas" id="precos2" value="<?php echo $valorPecas;?>" />
                <br />
				<br />
				<div>
				<label for="total">Total R$:</label>
				<input type="text" name="valorTotal" id="precos3" value="<?php echo $valorTotal;?>" />
				</div>
				<br />
				<textarea rows="5" cols="50" maxlength="500" name="descricaoServico" ><?php echo $descricao;?></textarea>
               <div class="button">
					<button type="submit" name="salvar"><img src="css/img/icons/ordem.png"></button>
					<button type="submit" name="excluir"><img src="css/img/icons/excluir4.png"></button>
					<a href="http://www.worldbikesmecanica.tk/editarOrdem.php?idOrdem=<?php echo $idOrdem ;?>"><img src="css/img/icons/Editar4.png"></a>
				<a href="http://www.worldbikesmecanica.tk/pdf.php?idOrdem=<?php echo $idOrdem ;?>" target="blank"><img src="css/img/icons/PDF.png"></a>					
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html> 
