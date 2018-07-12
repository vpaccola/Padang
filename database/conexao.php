<?php

    $host = "localhost";
    $dbname = "padang";
    $user = "root";
    $password = "";
    $conexao = mysqli_connect($host,$user,$password);
    if(!$conexao){
        die('Nao foi possivel conectar ao Banco!'. mysqli_connect_error());    
    }
    $bancodedados = mysqli_select_db($conexao, $dbname);
    
    if(!$bancodedados){
    die('Nao foi possivel Estabelecer Conexao com o banco de dados'. mysqli_error());
    }
?> 

