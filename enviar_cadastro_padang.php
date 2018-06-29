<?php
 //aqui inserimos as váriaveis da página de configuração
$login = $_POST["login"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$dataNascimento = $_POST["dataNascimento"];
$sexo = $_POST["sexo"];
$telefone = $_POST["telefone"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$senha2=$_POST["senha2"];
$cep=$_POST["cep"];
$cep=$_POST["cep"];
$identificacao=$_POST["identificacao"];
$endereco=$_POST["endereco"];
$numero=$_POST["numero"];
$bairro=$_POST["bairro"];
$cidade=$_POST["cidade"];
$estado=$_POST["estado"];
$complemento=$_POST["complemento"];
include "configcadastro.php";

 $sql = mysql_query("INSERT INTO t_cliente(NOME, EMAIL, TELEFONE, SEXO,DATA_NASCIMENTO, CPF, SENHA,IDENTIFICACAO,ENDERECO,BAIRRO,NUMERO,CIDADE,ESTADO,CEP,COMPLEMENTO,LOGIN)VALUES('$nome','$email','$telefone','$sexo','$dataNascimento', '$cpf', '$senha2','$identificacao','$endereco','$bairro','$numero','$cidade','$estado','$cep','$complemento','$login')");
?>
<html>
  <head>
    <meta charset="UTF-8"/>
  </head>
    <body>
    <div id="interface">    
      <header id="cabecalho">

      </header>
      <hr class="linha">
      <section id="corpo">
        <div id="meio">
                <div id="info_usuario">                  
                  <div id="confirmacao"> 
                                    
                       <?php
                            if($sql){
                             echo "<span class='sucess'>Cadastro Realizado com sucesso</span>";
                             echo "<meta http-equiv=refresh content='1;url=..\\index.html'>";
                             }else{
                                echo "Falha ao realizar o cadastro";
                                echo "<meta http-equiv=refresh content='1;url=cadastro_padang.html'>";
                                }
                            ?>   
                                        
                    </div>
                  
                </div>
        </div>
      </section>
      <aside id="lateral">
        
      </aside>
      <footer id="rodape">
      <hr class="linha">
       
      </footer>
        </div>
    </body>
</html>