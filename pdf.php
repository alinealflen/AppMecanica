<?php
include "seguranca.php";
include "conecta.php";

	$idOrdem = $_GET['idOrdem'];
	
	$sql = "select * from ordemServico where idOrdem='$idOrdem'";
	
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		
		$result = mysqli_query($_SG['link'], $sql);
		
		$dados = mysqli_fetch_array($result);
		$cpfCliente = $dados['cpfCliente'];
		
		$sql1 ="select * from cliente where cpf='$cpfCliente'";
		$result1 = mysqli_query($_SG['link'], $sql1);
		$dados1 = mysqli_fetch_array($result1);
?>

<html>

  <link rel="stylesheet" href="css/fundo.css" type="text/css">
<a href="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>
<img alt="World Bikes" id="logo" src="css/img/logo.png" />

	<h1>Ordem de Serviço nº<?php echo $dados['idOrdem'];?></h1>
	
	<h3>	DADOS CLIENTE </h3>
	<h4>CPF:  <?php echo $dados1['cpf'];?></h4>
	<h4>Nome:  <?php echo $dados1['nome'];?></h4>
	<h4>Telefone:  <?php echo $dados1['telefone'];?></h4>
	
	<h3>BICICLETA</h3>
	<h4>Marca/Modelo:  <?php echo $dados1['modelo'];?></h4>
	<h4>Aro:  <?php echo $dados1['aro'];?></h4>
	<h4>Cor:  <?php echo $dados1['cor'];?></h4>
	
	<h3>DESCRIÇÃO DOS SERVIÇOS</h3>
	<h4>Valor Mão de Obra: R$  <?php echo  $dados['valorMO'];?></h4>
	<h4>Valor das Peças: R$  <?php echo  $dados['valorPecas'];?></h4>
	<h4>Valor Total: R$  <?php echo  $dados['valorTotal'];?></h4>
	<h4>Descrição dos serviços e peças:  <?php echo $dados['descricaoServico'];?></h4>
    
    <br />
    <br />
	
<p>Assinatura:________________________________________________________________</p>
                                <h6><?php echo $dados1['nome'];?></h6>

</html>