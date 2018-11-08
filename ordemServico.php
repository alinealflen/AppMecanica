<?php
if(isset($_POST['buscar'])){
   //conectar no banco de dados - incluir o arquivo do banco
   include "conecta.php";
   //pega as variaveis vindas do formulario
   $cpf = trim($_POST["cpf"]);

  //busca os dados do cliente no bd
  $sql = "select nome, cpf, telefone, modelo, aro, cor from  cliente where cpf=$cpf"; 
   mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
   $result = mysqli_query($_SG['link'], $sql);

  $dados = mysqli_fetch_array($result);

if ($_POST && $dados!= null ) {

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
}else{
   $cpf = '';
   $nome ='';
   $telefone = '';
   $aro = '';
   $modelo = '';
   $cor =  '';
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

    <nav id="menu">
        <ul>
            <li><a href="agenda.html">Agenda</a></li>
            <li><a href="cadastro.html">Cadastro</a></li>
            <li><a class="active" href="ordemServico.php">Ordem de Serviço</a></li>
            <li><a href="cliente.php">Cliente</a></li>
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
                <button type="submit" name="buscar"><img src="icons/buscar.png"></button>
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
                <input type="text" name="numOS" id="numOS" class="campo1" />
                <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf;?>" />
				 <div class="button">
                    <button type="submit" name="buscar"><img src="icons/buscar.png"></button>	
				</div>
				<br />
                <!--<textarea rows="5" cols="50" maxlength="500"></textarea> -->
				<label for="cor">Mão de Obra R$:</label>
				<input type="text" name="valorMO" id="precos" />
				<label for="cor">Peças R$:</label>
				<input type="text" name="valorPecas" id="precos" />
                <br />
				<br />
				<div>
				<label for="total">Total R$:</label>
				<input type="text" name="valorTotal" id="precos" value="<?php echo $valorTotal;?>" />
				</div>
				<br />
				<textarea rows="5" cols="50" maxlength="500" name="descricaoServico" placeholder="Digite a descrição dos serviços e peças acima..."></textarea>
               <div class="button">
					<button type="submit" name="salvar"><img src="icons/ordem.png"></button>
					<button type="submit" name="excluir"><img src="icons/excluir4.png"></button>
					<button type="submit" name="editar"><img src="icons/Editar4.png"></button>
					<button type="submit" name="pdf"><img src="icons/PDF.png"></button>					
                </div>
            </fieldset>
        </form>
    </div>

</body>

<script>
function soma(){

var valorMO = document.getElementById("valorMO").value;
var valorPecas = document.getElementById("valorPecas").value;
document.getElementById("valorTotal").innerHTML = parseFloat(valorMO) +parseFloat(valorPecas);
}
</script>
</html> 
