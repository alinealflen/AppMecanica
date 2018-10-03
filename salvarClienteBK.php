<?php

    //conectar no banco de dados - incluir o arquivo do banco
    

if($_POST){

    

    if (isset($_POST["salvar"])) {

        include "conecta.php";

    //pega as variaveis vindas do formulario
    $nome = ($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $telefone = trim($_POST["telefone"]);
    $modelo = trim($_POST["modelo"]);
    $aro = trim($_POST["aro"]);
    $cor = trim($_POST["cor"]);
    
   

    // para validar os campos em branco.
    if (empty($nome)) {
        //se o login estiver em branco exibe esta mensagem: "preencha o login"
        echo "<script>alert('Preencha o nome');history.back();</script>";
    }
    if (empty($cpf)) {
       
        echo "<script>alert('Preencha o campo CPF');history.back();</script>";
    }
    if (empty($telefone)) {
       
        echo "<script>alert('Preencha o campo telefone');history.back();</script>";
    }
    if (empty($modelo)) {
       
        echo "<script>alert('Preencha o campo modelo');history.back();</script>";
    }
    if (empty($aro)) {
       
        echo "<script>alert('Preencha o campo aro');history.back();</script>";
    }
    if (empty($cor)) {
       
        echo "<script>alert('Preencha o campo cor');history.back();</script>";
    }
    else {
        $sql = "INSERT INTO cliente (nome, cpf, telefone, modelo, aro, cor)
         VALUES ('$nome', '$cpf', '$telefone', '$modelo','$aro','$cor')"; 
         mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
        //inserindo dados no banco
        mysqli_query($_SG['link'], $sql)
         or die ("<script>alert('Erro na gravação');history.back();</script>"); 

         echo "<script>alert('Cliente cadastrado');window.location.href='ordemServico.html';</script>";

        }
    }
    elseif(isset($_POST["excluir"])){
    echo "<script>alert('Excluir);history.back();</script>";
    }

}
?> 