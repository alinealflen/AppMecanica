<?php
if($_POST){
   //conectar no banco de dados - incluir o arquivo do banco
   include "conecta.php";
   //pega as variaveis vindas do formulario
   $idOrdem = trim($_POST["title"]);
   $start = ($_POST["start"]);
   $end = ($_POST["end"]);
   

  //salva os eventos no bd
  $sql = "insert into servicos (title, start, end) values('$idOrdem', '$start', '$end')"; 
   mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   mysqli_query($_SG['link'], $sql)
        	or die ("<script>alert('Erro na gravação');history.back();</script>"); 
   echo "<script>alert('Ordem de serviço agendada!');window.location.href='agenda.php';</script>";
   
  $sql = "UPDATE ordemServico SET statusOrdem='Agendado' where idOrdem='$idOrdem'";
    	mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
		//atualizando dados no banco
		mysqli_query($_SG['link'], $sql)
		or die ("<script>alert('Erro na gravação');history.back();</script>"); 
}
?>
