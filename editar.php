 <?php> 
 
    include "seguranca.php";
    $cpf = trim($_GET["cpf"]);

	if(isset($_POST['salvar'])){
		
        include "conecta.php";
        
		$nome = ($_POST["nome"]);
		$cpf = trim($_POST["cpf"]);
		$telefone = trim($_POST["telefone"]);
		$modelo = trim($_POST["modelo"]);
		$aro = trim($_POST["aro"]);
		$cor = trim($_POST["cor"]);
	
		$sql = "UPDATE cliente SET nome='$nome', telefone='$telefone', modelo='$modelo', aro='$aro', cor='$cor' where cpf='$cpf'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Cliente atualizado');window.location.href='ordemServico.php';</script>";
	
	}//fecha o if editar
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
    <a href="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>

    <nav id="menu">
        <ul>
            <li><a href="http://www.worldbikesmecanica.tk/agenda.php">Agenda</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php">Funcionarios</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/ordemServico.php">Ordem de Serviço</a></li>
            <li><a class="active" href="http://www.worldbikesmecanica.tk/cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Area do Cliente</h1>

    <div id=form4>
    <form method="POST" action="">
            <fieldset id=borda>
                <label for="cpf">CPF: </label>
                <br />
                <input type="text" name="cpf" id="cpf" value="<?php echo $cpf;?>" />
                <br />
                <label for="name">Nome do cliente:</label>
                <br />
                <input type="text" name="nome" id="nome" />
                <br />
                <label for="telefone">Telefone:</label>
                <br />
                <input type="text" name="telefone" id="telefone"  />
                <br />
                <label for="modelo">Modelo da bicicleta:</label>
                <br />
                <input type="text" name="modelo" id="modelo" />
                <br />
                <label for="aro">Aro da bicicleta: </label>
                <br />
                <input type="text" name="aro" id="aro" />
                <br />
                <label for="cor">Cor da bicicleta:</label>
                <br />
                <input type="text" name="cor" id="cor" />
                <br />
                <div class="button">
    				<button type="submit" name="salvar"><img src="css/img/icons/Salvar2.png"></button>
                </div>
            </fieldset>
        </form>
    </div>
    

</body>


</html> 
