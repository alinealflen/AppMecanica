<?php

include "conecta.php";

$cpf = trim($_GET["cpf"]);

$sql = "select nome,cpf,telefone,modelo,cor,aro from  cliente ;where cpf=$cpf"; 
mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
$resultado = mysqli_fetch_array( $sql);


?>