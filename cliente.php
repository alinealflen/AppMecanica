<?php

    include "conecta.php";

    
    $sql = "select nome, cpf, telefone from  cliente order by nome asc"; 
    mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
    $result = mysqli_query($_SG['link'], $sql);

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
            <li><a href="cadastro.html">Cadastro</a></li>
            <li><a href="ordemServico.html">Ordem de Serviço</a></li>
            <li><a class="active" href="cliente.php">Cliente</a></li>
        </ul>
    </nav>

    <hr style="background-color: #33c208">

    <h1 id="titulo">Clientes</h1>
    <form method="post" action="buscaCliente.php">
        <input type="text" name="cpf" id="cpf" class="campo1" />
         <div class="button">
         <input src="icons/buscar.png" type="image">
        </div>
    </form>


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

    while($aux = mysqli_fetch_assoc($result)) { 
    ?>
     <tr>
        <td id="tabela2"><?php echo $aux["nome"];?></td>
        <td id="tabela2"><?php echo $aux["telefone"];?></td>
        <td id="tabela2"><?php echo $aux["cpf"];?></td>
    </tr>
    <?php
    }
    
    ?>
    </tbody>
</table>
</body>

</html>