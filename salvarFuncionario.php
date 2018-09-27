<?php

if ($_POST) {
    //conectar no banco de dados - incluir o arquivo do banco
    include "conecta.php";
    //pega as variaveis vindas do formulario
    $login = trim($_POST["login"]);
    $senha = trim($_POST["senha"]);
    $nome = ($_POST["nome"]);
   

    // para validar os campos em branco.
    if (empty($login)) {
        //se o login estiver em branco exibe esta mensagem: "preencha o login"
        echo "<script>alert('Preencha o Login');history.back();</script>";
    }
    if (empty($senha)) {
       
        echo "<script>alert('Preencha o campo senha');history.back();</script>";
    }
    if (empty($nome)) {
       
        echo "<script>alert('Preencha o campo nome');history.back();</script>";
    }
    else {
        $sql = "INSERT INTO usuario (nome, login, senha)
         VALUES ('$nome', '$login', '$senha')"; 
         mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
        //inserindo dados no banco
        mysqli_query($_SG['link'], $sql)
         or die ("<script>alert('Erro na gravação');history.back();</script>"); 

         echo "<script>alert('Funcionário cadastrado');history.back();</script>";

        }
    }

?> 