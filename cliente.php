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
    <link href="css/ordemstyle.css" rel="stylesheet" type="text/css">
    <link href="css/fundo.css" rel="stylesheet" type="text/css">

</head>

<body id="fundo">
    <img src="css/img/logo.png" alt="World Bikes" width="20%">

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
    if (isset($_POST['buscar'])) {

        while($aux = mysqli_fetch_assoc($result)) { 
    ?>
     <tr>
        <td id="tabela2"><?php echo $aux["nome"];?></td>
        <td id="tabela2"><?php echo $aux["telefone"];?></td>
        <td id="tabela2"><input type="text" name="cpf" id="cpf2" value="<?php echo $aux["cpf"];?>"></td>
        <td id="tabela2"><button type="submit" name="buscar"><img src="icons/cliente.png"></button>
    </tr>
    <?php
    }//fecha while //disabled="disabled"
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
            <td id="tabela2"><input type="text" name="cpf" id="cpf2" value="<?php echo $aux["cpf"];?>"></td>
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