<?php
$login = $_POST["login"];
$senha2 = $_POST["senha2"];
include "configcadastro.php";




$confirmacao = mysql_query("SELECT * FROM t_cliente WHERE LOGIN = '$login'AND SENHA = '$senha2'"); 
$contagem = mysql_num_rows($confirmacao); 

if ( $contagem == 1 ) {
  setcookie ("login", $login); 
  setcookie ("senha", $senha2); 
  echo "Usuário logado.";
  session_start();
            $_SESSION['login']=$login;
            $_SESSION['senha']=$senha2;
           echo "<meta http-equiv=refresh content='1;url=../index.php'>";
  } else {
  echo "Login ou senha inválidos. "; 
  }
?>