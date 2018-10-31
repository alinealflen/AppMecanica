<?php

    include "conecta.php";
    //include "verifica.php";


    if (isset($_POST['buscar'])){

    $nome = ($_POST["nome"]);
    $sql = "select nome from usuario where nome like '$nome%'";//UPPER(nome) like '$nome'% order by nome asc"; 
    mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
    $result = mysqli_query($_SG['link'], $sql);
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Area Funcionários - World Bikes</title>
    <link href="css/fundo.css" rel="stylesheet" type="text/css">

</head>

<body id="fundo">
    <img src="css/img/logo.png" alt="World Bikes" width="10%">

    <nav id="menu">
        <ul>
            <li><a href="agenda.html">Agenda</a></li>
            <li><a class="active" href="funcionario.php">Funcionários</a></li>
            <li><a href="ordemServico.php">Ordem de Serviço</a></li>
            <li><a href="cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Funcionários</h1>
    <a href="cadastro.html"><button type="submit"><img src="icons/addCliente.png"></button></a>
    <form id="form4" method="post" action="">
        <input type="text" name="nome" id="nome" class="campo1" />
		<div class="button">
           <button type="submit" name="buscar"><img src="icons/buscar.png"></button>
        </div>
    </form>
               
    <form method="post" action="buscaUsuario.php">
 <table id="tabelaLista" width="800" cellpadding="30";>
      <thead>
        <tr> <!--Linha da tabela-->
            <th id="tabela2">Nome </th> <!--Coluna da tabela-->
        </tr>
      </thead>
      <tbody>

    <?php
    if (isset($_POST['buscar'])) {

        while($aux = mysqli_fetch_assoc($result)) { 
    ?>
     <tr>
        <td id="tabela2"><input id="input" readonly="true" type="text" name="nome" value="<?php echo $aux["nome"];?>"></td>
        <td id="tabela2"><button type="submit" name="buscar"><img src="icons/cliente.png"></button>
    </tr>
    <?php
    }//fecha while //disabled="disabled"
  }//fecha if
    else{
    include "conecta.php";
    $sql = "select nome from  usuario where id>1";//UPPER(nome) like '$nome'% order by nome asc"; 
    mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
    $result = mysqli_query($_SG['link'], $sql);
        while($aux = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td id="tabela2"><input type="text" name="nome" id="cpf2" value="<?php echo $aux["nome"];?>"></td>
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