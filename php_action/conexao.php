<?php
        $sHost = '127.0.0.1';
        $sPort = '5432';
        $sDbName = 'crud';
        $sUser = 'postgres';
        $sPassword = 'postgresql';
        
        $sConexao = 
        "host = $sHost
         port = $sPort
         dbname = $sDbName
         user=$sUser
         password=$sPassword";
    
        $oConexao = pg_connect($sConexao);
        // var_dump($oConexao);
         if(!$oConexao){
            die("Falha na conexão: ".mysqli_connect_error());
         }//else{
           // echo"Sucesso na conexão!>>>>>>>>";
        //}

?>