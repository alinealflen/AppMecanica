<?php

    include "conecta.php";
    //include "verifica.php";


    if (isset($_POST['buscar'])){

    $nome = ($_POST["nome"]);
    $sql = "select nome, cpf, telefone from  cliente WHERE nome like '$nome%'";//UPPER(nome) like '$nome'% order by nome asc"; 
    mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
    $result = mysqli_query($_SG['link'], $sql);
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Area Cliente - World Bikes</title>
   
   
    <link href="css/fundo.css" rel="stylesheet" type="text/css">

</head>

<body id="fundo">
    <img src="css/img/logo.png" alt="World Bikes" width="10%">

    <nav id="menu">
        <ul>
            <li><a href="agenda.html">Agenda</a></li>
            <li><a href="funcionario.php">Funcionários</a></li>
            <li><a href="ordemServico.html">Ordem de Serviço</a></li>
            <li><a class="active" href="cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Clientes</h1>
    <a href="cadastroCliente.html"><button type="submit"><img src="icons/addCliente.png"></button></a>
    <form id="form4" method="post" action="">
        <input type="text" name="nome" id="nome" class="campo1" />
		<div class="button">
           <button type="submit" name="buscar"><img src="icons/buscar.png"></button>
        </div>
    </form>
               
    <form method="post" action="buscaCliente2.php">
		<table id="tabelaLista" width="800" cellpadding="30";>
			<thead>
				<tr> <!--Linha da tabela-->
					<th id="tabela2">Nome </th> <!--Coluna da tabela-->
					<th id="tabela2">Telefone </th>
					<th id="tabela2">CPF </th>
				</tr>
			</thead>
        <tbody>

		<?php
		   /*<?php outra maneira de usar matriz
 
// Uma matriz associativa
$valor = array(
    'Cor'           => array( 'Vermelho', 'Branco', 'Prata' ),
    'Capacidade'    => array( '4GB', '8GB', '16GB' ),
    'Interface'     => array( 'Windows', 'Mac', 'Linux' ),
);
 
// Esta linha printa 'Vermelho' na tela
echo $valor['Cor'][0];
 
//Coluna 'cor' e o ítem zero '0' desta coluna*/
		// $arrayEmails[] = $row["campo_que_contem_o_email"];
			if (isset($_POST['buscar'])) {

				while($aux = mysqli_fetch_assoc($result)) { 
				//while para pegar o cpf por linha, não ficar sempre atribuindo um valor a uma variável
					$arrayClientes = array[
					$aux['nome'] => array[$aux['cpf'], $aux['telefone']];
					}//fecha while 
					$i = 0;
					$x = 0;
				while(	$arrayClientes){
				
		?>
			<tr>
				<td id="tabela2"><?php echo$arrayClientes[$i];?></td>
				<td id="tabela2"><?php echo $arrayClientes[$i[$x+1]];?></td>
				<td id="tabela2"><input type="text" name="cpf" id="input" value="<?php echo $arrayClientes[$i[$x]];?>"></td>
				<td id="tabela2"><button type="submit" name="buscar"><img src="icons/cliente.png"></button>
			</tr>
		<?php
				if ($x==1){
					$x = 0;
				}else{
				$x= $x+1;
				$i = $i+1;
					}//fecha else
				}//fecha while 
			}//fecha if
			else{
				include "conecta.php";
				$sql = "select nome, cpf, telefone from  cliente ";//UPPER(nome) like '$nome'% order by nome asc"; 
				mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
				$result = mysqli_query($_SG['link'], $sql);
				while($aux = mysqli_fetch_assoc($result)){
			?>
				<tr>
					<td id="tabela2"><?php echo $aux["nome"];?></td>
					<td id="tabela2"><?php echo $aux["telefone"];?></td>
					<td id="tabela2"><input type="text" name="cpf" id="input" value="<?php echo $aux["cpf"];?>"></td>
					<td id="tabela2"><button type="submit" name="buscar"><img src="icons/cliente.png"></button>
				</tr>
    <?php  
            }//fecha while
        }//fecha o else
    
    ?>
			</tbody>
		</table>
	</form>

</body>

</html>