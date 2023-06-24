<?php
    session_start();

    include_once("conexao.php");
    
    if(isset($_POST['btn-deletar'])){
       
        $codigo = pg_escape_string($oConexao, $_POST['codigo']);
        
        $pge = "DELETE FROM clientes WHERE codigo = '$codigo'";
         
        if(pg_query($oConexao, $pge)){
            $_SESSION['mensagem'] = "Deletado com sucesso!";
            header('Location: ../index.php');
        }else{
            $_SESSION['mensagem'] = "Não foi possível excluir! Tente novamente.";
            header('Location: ../index.php');
        }

        /*try{pg_query($oConexao, $pge);}
        catch(Exception $erro){
            echo $erro->getMessage();
        }
        pg_close($oConexao)*/
    }


?>