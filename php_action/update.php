<?php
    session_start();

    include_once("conexao.php");
    
    if(isset($_POST['btn-editar'])){
        $nome = pg_escape_string($oConexao, $_POST['nome']);
        $sobrenome = pg_escape_string($oConexao, $_POST['sobrenome']);
        $email = pg_escape_string($oConexao, $_POST['email']);
        $idade = pg_escape_string($oConexao, $_POST['idade']);

        $codigo = pg_escape_string($oConexao, $_POST['codigo']);
        
        $pge = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE codigo = '$codigo'";
         
        if(pg_query($oConexao, $pge)){
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../index.php');
        }else{
            $_SESSION['mensagem'] = "Falha na atualização! Tente novamente.";
            header('Location: ../index.php');
        }
        //se tiver erro é nessa porra aqui de baixo
        pg_close($oConexao);
        /*try{pg_query($oConexao, $pge);}
        catch(Exception $erro){
            echo $erro->getMessage();
        }
        */
    }


?>