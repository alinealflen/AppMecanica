<?php

 
    //verificar se os dados vieram de um POST
    if ($_POST) {
        //conectar no banco de dados - incluir o arquivo do banco
        include "conecta.php";
        //recuperar a variaveis vindas do formulario
        $login = trim($_POST["login"]);
        $senha = trim($_POST["senha"]);
        //caso o usuario deixe espaços em branco, o trim retira espaços em branco
 
        
        if (empty($login)) {
            //se o login estiver em branco exibe esta mensagem: "preencha o login"
            echo "<script>alert('Preencha o Login');history.back();</script>";
        }
        else if (empty($senha)) {
            
            echo "<script>alert('Preencha o campo senha');history.back();</script>";
        }
        else {
           
            /*comando sql - consulta para verificar se o
            usuario existe no banco */
            $sql = "select * from usuario where login = '$login'";
            //executar e guardar o resultado em uma variavel
            $resultado = mysqli_query($_SG['link'],$sql);
            //separar os resultados
            $linha = mysqli_fetch_array($resultado);
            $login2 = $linha["login"];
            $senha2 = $linha["senha"];
            //criptografar senha
            $senha = ($senha);
            //verificar se o usuario existe
            if (empty($login2)) {
                echo "<script>alert('Usuario nao existe');history.back();</script>";
            } else if ($senha != $senha2) {
                //se a senha digitada for diferente da senha do banco
                echo "<script>alert('Senha inválida');history.back();</script>";
            } else if($senha == "admin01" && $login== "adm"){
                header("Location: cadastro.html");
            }

            else {
                //se existir gravar os dados na sessao e enviar
                //para a proxima pagina 
                $_SESSION["usuario"] = array("id"=>$linha["id"],
                                                    "login"=>$linha["login"],
                                                    "senha"=>$linha["senha"],
                                                    "nome"=>$linha["nome"]);
                //redirecionar para o arquivo 
                header("Location: agenda.html");
 
            }
 
        }
        // se tiver com o login e a senha erradas exibe esta mensagem: Requisicao invalida!
    } else {
        echo "Requisicao invalida!";
        exit;
    }
?>
