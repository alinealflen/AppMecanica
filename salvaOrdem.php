<?php

    //conectar no banco de dados - incluir o arquivo do banco
    
if($_POST){


        include "conecta.php";

	if(isset($_POST['salvar'])){
    //pega as variaveis vindas do formulario
   // $numOS = ($_POST["idOrdem"]); auto incrementat floatval ( mixed $var )
    $cpf = trim($_POST["cpf"]);
    $valorMO = floatval($_POST["valorMO"]);
    $valorPecas = floatval($_POST["valorPecas"]);
    $valorTotal = floatval($_POST["valorTotal"]);
    $descricaoServico = ($_POST["descricaoServico"]);
    
    if($valorTotal==null){
        $statusOrdem = "Aguardando Orçamento";
    } else if ($valorTotal > 0){
        $statusOrdem = "Aguardando execução do serviço";
    }
   
    // para validar os campos em branco.

		if (empty($cpf)) {
       
			echo "<script>alert('Preencha o campo CPF');history.back();</script>";
        }//fecha o if cpf
        if (empty($descricaoServico)) {
       
			echo "<script>alert('Descreva o serviço!');history.back();</script>";
		}
		else {

			$sql = "INSERT INTO ordemServico (cpfCliente, statusOrdem, valorMO, valorPecas, valorTotal,
             descricaoServico)
			VALUES ('$cpf', '$statusOrdem', '$valorMO', '$valorPecas','$valorTotal','$descricaoServico')"; 
			mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
			//inserindo dados no banco
			mysqli_query($_SG['link'], $sql)
			or die ("<script>alert('Erro na gravação');history.back();</script>"); 

			echo "<script>alert('OS emitida');window.location.href='ordemServico.php';</script>";

        }//fecha o else que salva

	}//fecha o if  isset salvar
	
/*	if(isset($_POST['excluir'])){
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
*/	

}//fecha o if POST

?> 