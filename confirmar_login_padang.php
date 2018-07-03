<?php
$email = $_POST["email"];
$senha = $_POST["senha"];
include "/database/conexao.php";




$confirmacao = mysql_query("SELECT * FROM usuarios WHERE email = '$email'AND senha = '$senha'"); 
$contagem = mysql_num_rows($confirmacao); 

if ( $contagem == 1 ) {
  setcookie ("email", $email); 
  setcookie ("senha", $senha); 
  echo "Usuário logado.";
  session_start();
            $_SESSION['email']=$email;
            $_SESSION['senha']=$senha;
           echo "<meta http-equiv=refresh content='1;url=../index.php'>";
  } else {
  echo "Login ou senha inválidos. "; 
  }
?>