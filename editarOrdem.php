<?php

    include "seguranca.php";

 $idOrdem = trim($_GET["idOrdem"]);
 
    include "conecta.php";
 
  $sql = "select * from ordemServico where idOrdem='$idOrdem'"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $resultCliente = mysqli_query($_SG['link'], $sql);

   $dadosOrdem = mysqli_fetch_array($resultCliente);
    
    $cpfCliente = $dadosOrdem['cpfCliente'];
    //busca os dados do cliente no bd
  $sql = "select nome, cpf, telefone, modelo, aro, cor from  cliente where cpf='$cpfCliente'"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $result = mysqli_query($_SG['link'], $sql);

  $dados = mysqli_fetch_array($result);

if ($dados != null ) {

   $cpf = $dados['cpf'];
   $nome = $dados['nome'];
   $telefone = $dados['telefone'];
   $aro = $dados['aro'];
   $modelo = $dados['modelo'];
   $cor = $dados['cor'];
}else{
       echo "<script>alert('ERROOOO');window.location.href='ordemServico.php';</script>";
	 
}

    if(isset($_POST['salvar'])){
		
        include "conecta.php";
    
         if($valorTotal==null){
            $statusOrdem = "Aguardando Orçamento";
        } 
        
        if ($valorTotal > 0 && $status =! "Agendado"){
            $statusOrdem = "Aguardando execução do serviço";
        }else {
           $statusOrdem = "Agendado"; 
        }
        
    	$cpf = trim($_POST["cpf"]);
		$valorMO = ($_POST["valorMO"]);
		$valorPecas = ($_POST["valorPecas"]);
		$valorTotal = ($_POST["valorTotal"]);
		$descricaoServico = ($_POST["descricaoServico"]);
	
		$sql = "UPDATE ordemServico SET cpfCliente='$cpf', statusOrdem='$statusOrdem', valorMO='$valorMO', valorPecas='$valorPecas',
					valorTotal='$valorTotal', descricaoServico='$descricaoServico' where idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço atualizada');window.location.href='ordemServico.php';</script>";
	
	}//fecha o if editar


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
                <div class="button">
                <button type="submit" name="buscar"><img src="css/img/icons/buscar.png"></button>
                </div>
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
                <label for="servico" class="campo1">OS nº:</label>
                <input type="text" name="idOrdem" id="numOS" class="campo1" value="<?php echo $idOrdem?>"/> 
                <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf;?>" />
				 <div class="button">
                  <a href="http://www.worldbikesmecanica.tk/buscaOrdem.php?idOrdem"> <img src="css/img/icons/buscar.png"></a>	
				</div>
				<br />
                <!--<textarea rows="5" cols="50" maxlength="500"></textarea> -->
                <label for="cor">Status OS :</label>
				<input type="text" name="statusOS" id="numOS" />
                <br />
				<label for="cor">Mão de Obra R$:</label>
				<input type="text" name="valorMO" id="precos" />
				<label for="cor">Peças R$:</label>
				<input type="text" name="valorPecas" id="precos" />
                <br />
				<br />
				<div>
				<label for="total">Total R$:</label>
				<input type="text" name="valorTotal" id="precos" />
				</div>
				<br />
				<textarea rows="5" cols="50" maxlength="500" name="descricaoServico" placeholder="Digite a descrição dos serviços e peças acima..."></textarea>
               <div class="button">
					<button type="submit" name="editar"><img src="css/img/icons/Editar4.png"></button>
					<button type="submit" name="excluir"><img src="css/img/icons/excluir4.png"></button>
					<button type="submit" name="pdf"><img src="css/img/icons/PDF.png"></button>					
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html> 
