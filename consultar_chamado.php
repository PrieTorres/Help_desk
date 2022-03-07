<?php
  require_once('validador.php')
?>

<?php

//chamados
$chamados = [];
//abrir o arquivo.hd
$arquivo = fopen('arquivo.hd', 'r'); // 'r' indica que o arquivo será lido

//enquanto houver registros para se recuperar-->
while(!feof($arquivo)){// feof le enquanto não indentifica o fim do arquivo, quando terminar retorna true, por isso o '!'
  //linhas
  $registro = fgets($arquivo);//fgets pega cada linha
  $chamados[] = $registro;
}

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <? foreach($chamados as $chamado){ //cada item em chamados recebe o apelido chamado?>
              
                <?php
                  $chamado_dados = explode('#', $chamado);//retorna um array, a cada # em chamado é um novo valor nesse array

                  if($_SESSION['perfil_id'] == 2){// se o usuario for usuário padrão --->
                    //só vai exibir chamados criados pelo próprio usuário
                    if($_SESSION['id'] != $chamado_dados[0]){// se o id é diferente do idi do usuário logado atualmente
                      continue;//vai ignorar todas as próximas instruções
                    }
                  }
                  if(count($chamado_dados) < 3){
                    continue;
                  }
                ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">
                    <?= $chamado_dados[1]?>
                  </h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?= $chamado_dados[2]?>
                  </h6>
                  <p class="card-text">
                  <?= $chamado_dados[3]?>
                  </p>
                </div><!--fim do card-->

                
              </div>
              <? } ?>

              </div>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>