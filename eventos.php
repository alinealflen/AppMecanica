<?php
    //Conectando ao banco de dados
    include "conecta.php";
    
    $sql = "SELECT * FROM servicos;"; 
    mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
   $result = mysqli_query($_SG['link'], $sql);
   
     while($aux = mysqli_fetch_assoc($result)) { { 
        echo "NumOs: {$aux['title']}" ;
        $vetor[] = $aux;
     }

    echo json_encode($vetor);
    
?>
