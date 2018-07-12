<?php
$email = $_POST["email"];
$senha = $_POST["senha"];
include "database/conexao.php";

$resultados = mysqli_query($conexao, "SELECT * FROM `usuarios` WHERE email = '$email' AND senha = '$senha'"); 
$usuario = mysqli_fetch_assoc($resultados); 

if (isset($usuario)) {
  echo "Usuário logado.";
  session_start();
   $_SESSION['id'] = $usuario['id'];
   $_SESSION['email']=$usuario["email"];
   $_SESSION['nome']=$usuario["nome"];
   //echo "<meta http-equiv=refresh content='1;url=../index.php'>";
   echo "<meta http-equiv=refresh content='1;url=\\padang'>";
  } else {
  echo "Login ou senha inválidos. "; 
  }
?>