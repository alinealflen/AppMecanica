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
	
	if(isset($_POST['excluir'])){
		$numOS = ($_POST["idOrdem"])
		$sql = "DELETE FROM ordemServico WHERE idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
		//excluindo dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço excluída!');window.location.href='cliente.php';</script>";
	}//fecha i if  isset excluir
	
	if(isset($_POST['editar'])){
		
		$cpf = trim($_POST["cpf"]);
		$valorMO = floatval($_POST["valorMO"]);
		$valorPecas = floatval($_POST["valorPecas"]);
		$valorTotal = floatval($_POST["valorTotal"]);
		$descricaoServico = ($_POST["descricaoServico"]);
	
		$sql = "UPDATE ordemServico SET cpfCliente='$cpf', statusOrdem='$statusOrdem', valorMO='$valorMO', valorPecas='$valorPecas',
					valorTotal='$valorTotal', descricaoServico='$descricaoServico' where idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"oficina") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço atualizada');window.location.href='ordemServico.html';</script>";
	
	}//fecha o if editar
	if (isset($_POST['buscar'])){
		$cpf = trim($_POST["cpf"]);
	}

}//fecha o if POST

?> 