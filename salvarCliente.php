<?php

    //conectar no banco de dados - incluir o arquivo do banco
    
if($_POST){


        include "conecta.php";

	if(isset($_POST['salvar'])){
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
		}//fecha o if nome
		if (empty($cpf)) {
       
			echo "<script>alert('Preencha o campo CPF');history.back();</script>";
		}//fecha o if cpf
		if (empty($telefone)) {
       
			echo "<script>alert('Preencha o campo telefone');history.back();</script>";
		}//fecha o if telefone
		if (empty($modelo)) {
       
			echo "<script>alert('Preencha o campo modelo');history.back();</script>";
		}//fecha o if modelo
		if (empty($aro)) {
       
			echo "<script>alert('Preencha o campo aro');history.back();</script>";
		}//fecha o if aro
		if (empty($cor)) {
       
			echo "<script>alert('Preencha o campo cor');history.back();</script>";
		}//fecha o if cor
		else {
			$sql = "INSERT INTO cliente (nome, cpf, telefone, modelo, aro, cor)
			VALUES ('$nome', '$cpf', '$telefone', '$modelo','$aro','$cor')"; 
			mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
			//inserindo dados no banco
			mysqli_query($_SG['link'], $sql)
			or die ("<script>alert('Erro na gravação');history.back();</script>"); 

			echo "<script>alert('Cliente cadastrado');window.location.href='ordemServico.html';</script>";

        }//fecha o else que salva

	}//fecha i if  isset salvar
	
	if(isset($_POST['excluir'])){
		$cpf = trim($_POST["cpf"]);
		$sql = "DELETE FROM cliente WHERE cpf='$cpf'";
		mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
		//excluindo dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Cliente excluído!');window.location.href='cliente.php';</script>";
	}//fecha i if  isset excluir
	
	if(isset($_POST['editar'])){
		
		$nome = ($_POST["nome"]);
		$cpf = trim($_POST["cpf"]);
		$telefone = trim($_POST["telefone"]);
		$modelo = trim($_POST["modelo"]);
		$aro = trim($_POST["aro"]);
		$cor = trim($_POST["cor"]);
	
		$sql = "UPDATE cliente SET nome='$nome', telefone='$telefone', modelo='$modelo', aro='$aro', cor='$cor' where cpf='$cpf'";
		mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Cliente atualizado');window.location.href='ordemServico.html';</script>";
	
	}//fecha o if editar
	

}//fecha o if POST

?> 