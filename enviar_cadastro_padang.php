<?php
 //aqui inserimos as váriaveis da página de configuração
$nome = $_POST["nome"];
$email=$_POST["email"];
$senha=$_POST["senha"];
include "database/conexao.php";
//INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `admin`) VALUES (NULL, 'nome', 'email', 'senha', '0');
 $sql = mysqli_query($conexao, "INSERT INTO `usuarios` (`nome`,`email`,`senha`) VALUES('$nome','$email','$senha')");
  
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
							echo ($sql);
							echo (mysqli_error($conexao));
                            if($sql){
                             echo "<span class='sucess'>Cadastro Realizado com sucesso</span>";
                             echo "<meta http-equiv=refresh content='1;url=\\padang'>";
                             }else{
                                echo "Falha ao realizar o cadastro";
                                //echo "<meta http-equiv=refresh content='1;url=cadastro_padang.html'>";
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