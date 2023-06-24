<?php
    session_start();

    include_once("conexao.php");
    
   /* function clear($input){
        global $oConexao;
        $var = pg_escape_string($oConexao, $input);
        $var = htmlspecialchars($var);
        return $var;
    }*/

    if(isset($_POST['btn-cadastrar'])){
        $nome = pg_escape_string($oConexao, $_POST['nome']);
        $sobrenome = pg_escape_string($oConexao, $_POST['sobrenome']);
        $email = pg_escape_string($oConexao, $_POST['email']);
        $idade = pg_escape_string($oConexao, $_POST['idade']);
        
        $pge = "INSERT INTO clientes(nome, sobrenome,  email, idade)
                VALUES('$nome', '$sobrenome', '$email', '$idade')";
         
         try {
            pg_query($oConexao, $pge);
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../index.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: ../index.php');
        }
        
        
         /*try{
            pg_query($oConexao, $pge);
            header('Location: ../index.php');
        }
        catch(Exception $erro){
            echo $erro->getMessage();
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: ../index.php');
        }
        if(pg_query($oConexao, $pge)){
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        }else{
            $_SESSION['mensagem'] = "Falha no cadastro! Tente novamente.";
        }*/

        /*try{pg_query($oConexao, $pge);}
        catch(Exception $erro){
            echo $erro->getMessage();
        }
        pg_close($oConexao)*/
    }


?>