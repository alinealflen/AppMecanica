<?php
    include "seguranca.php";
    include "conecta.php";
    //include "verifica.php";


    if (isset($_POST['busca'])){

    $nome = ($_POST["nome"]);
    $sql = "select nome, cpf, telefone from  cliente WHERE nome like '$nome%'";//UPPER(nome) like '$nome'% order by nome asc"; 
    mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
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
    <a href="http://www.worldbikesmecanica.tk/sair.php"><img src="css/img/icons/sair.png"></a>

    <nav id="menu">
        <ul>
            <li><a href="http://www.worldbikesmecanica.tk/agenda.php">Agenda</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php">Funcionários</a></li>
            <li><a href="http://www.worldbikesmecanica.tk/ordemServico.php">Ordem de Serviço</a></li>
            <li><a class="active" href="http://www.worldbikesmecanica.tk/cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Clientes</h1>
    <a href="cadastroCliente.html"><button type="submit"><img src="css/img/icons/addCliente.png"></button></a>
    
    <form id="form4" method="post" action="">
        <input type="text" name="nome" id="nome" class="campo1" />
		<div class="button">
           <button type="submit" name="busca"><img src="css/img/icons/buscar.png"></button>
        </div>
    </form>
               
    <!--<form method="post" action="buscaCliente2.php">-->
    <form>
		<table id="tabelaLista" width="800" cellpadding="30";>
			<thead>
			 <!--Linha da tabela-->
                <tr>
					<th id="tabela2">Nome </th> <!--Coluna da tabela-->
					<th id="tabela2">Telefone </th>
					<th id="tabela2">CPF </th>
				</tr>
			</thead>
        <tbody>

		<?php

			if (isset($_POST['busca'])) {

				while($aux = mysqli_fetch_assoc($result)) { 
			
		?>
            
			<tr id="hover">
				<td id="tabela2"><?php echo $aux["nome"];?></td>
				<td id="tabela2"><?php echo $aux["telefone"];?></td>
				<td id="tabela2"><input type="text" name="cpf" id="input" value="<?php echo $aux["cpf"];?>"></td>
				<td id="tabela2"><a href= "http://www.worldbikesmecanica.tk/buscaCliente2.php?cpf=<?php echo $aux["cpf"];?>" > <img src="css/img/icons/cliente.png"></a></td>
		<?php
			
				}//fecha while 
			}//fecha if
			else{
                
				include "conecta.php";
				$sql = "select nome, cpf, telefone from  cliente order by nome asc ";//UPPER(nome) like '$nome'% order by nome asc"; 
				mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
				$result = mysqli_query($_SG['link'], $sql);
                
				while($aux = mysqli_fetch_assoc($result)){
			?>
                <a href= "http://www.worldbikesmecanica.tk/buscaCliente2.php?cpf=<?php echo $aux["cpf"];?>" > 
				<tr id="hover"> 
					<td id="tabela2"><?php echo $aux["nome"];?></td>
					<td id="tabela2"><?php echo $aux["telefone"];?></td>
					<td id="tabela2"><input type="text" name="cpf" id="input" value="<?php echo $aux["cpf"];?>"></td>
                   
                    
				</tr> </a>
    <?php  
            }//fecha while
        }//fecha o else
    
    ?>
			</tbody>
		</table>
	</form>

</body>

</html>