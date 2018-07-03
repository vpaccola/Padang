<?php

    $host = "localhost";
    $dbname = "padang";
    $user = "root";
    $password = "secret";
    $conexao = @mysql_connect($host,$user,$password);
    if(!$conexao){
        die('Nao foi possivel conectar ao Banco!'. mysql_error());    
    }
    $bancodedados = mysql_select_db('padang',$conexao);
    
    if(!$bancodedados){
    die('Nao foi possivel Estabelecer Conexao com o banco de dados'. mysql_error());
    }
?> 

