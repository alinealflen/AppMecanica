<?php

    //conectar no banco de dados - incluir o arquivo do banco
    
if($_POST){


        include "conecta.php";

	if(isset($_POST['salvar'])){
        
        //pega as variaveis vindas do formulario
        $numOS = ($_POST["idOrdem"]);
        $cpf = trim($_POST["cpf"]);
        $valorMO = ($_POST["valorMO"]);
        $valorPecas = ($_POST["valorPecas"]);
        $valorTotal = ($_POST["valorTotal"]);
        $descricaoServico = ($_POST["descricaoServico"]);
        
      if($numOS == null){  
        
        if($valorTotal==null){
            $statusOrdem = "Orçamento";
        } else if ($valorTotal > 0){
            $statusOrdem = "Agendar serviço";
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
			mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
			//inserindo dados no banco
			mysqli_query($_SG['link'], $sql)
			or die ("<script>alert('Erro na gravação');history.back();</script>"); 

			echo "<script>alert('OS emitida');window.location.href='ordemServico.php';</script>";

        }//fecha o else que salva
        
      } else{
          
            if($valorTotal==null){
            $statusOrdem = "Orçamento";
            } 
        
            if ($valorTotal > 0 && $status =! "Agendado"){
                $statusOrdem = "Agendar";
            }else {
            $statusOrdem = "Agendado"; 
            }
        
    
		$sql = "UPDATE ordemServico SET cpfCliente='$cpf', statusOrdem='$statusOrdem', valorMO='$valorMO', valorPecas='$valorPecas',
					valorTotal='$valorTotal', descricaoServico='$descricaoServico' where idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço atualizada');window.location.href='ordemServico.php';</script>";
        }   

    }//fecha o if  isset salvar
	
	if(isset($_POST['excluir'])){
        
		$numOS = ($_POST["idOrdem"]);
		$sql = "DELETE FROM ordemServico WHERE idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//excluindo dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 
        
        //exclui os evntos do calendário
        $sql =  "DELETE FROM servicos WHERE title='$numOS'";
        
        mysqli_query($_SG['link'], $sql)
    	or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço excluída!');window.location.href='cliente.php';</script>";
	}//fecha i if  isset excluir
	
	if(isset($_POST['editar'])){
        
        $numOS = ($_POST["idOrdem"]);
		
        if($valorTotal==null){
            $statusOrdem = "Aguardando Orçamento";
        } 
        
        if ($valorTotal > 0 && $status =! "Agendado"){
            $statusOrdem = "Aguardando execução do serviço";
        }else {
           $statusOrdem = "Agendado"; 
        }
        
		$cpf = trim($_POST["cpf"]);
		$valorMO = ($_POST["valorMO"]);
		$valorPecas = ($_POST["valorPecas"]);
		$valorTotal = ($_POST["valorTotal"]);
		$descricaoServico = ($_POST["descricaoServico"]);
	
		$sql = "UPDATE ordemServico SET cpfCliente='$cpf', statusOrdem='$statusOrdem', valorMO='$valorMO', valorPecas='$valorPecas',
					valorTotal='$valorTotal', descricaoServico='$descricaoServico' where idOrdem='$numOS'";
		mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 

		echo "<script>alert('Ordem de serviço atualizada');window.location.href='ordemServico.php';</script>";
	
	}//fecha o if editar


}//fecha o if POST

?> 