<?php require_once "validador_acesso.php" ?>

<?php

  // Chamados
  $chamados = array();

  // Abrir o arquivo.txt
  $arquivo = fopen('arquivo.txt', 'r');

  // feof = testa pelo fim de um arquivo
  while(!feof($arquivo)) {
    $registro = fgets($arquivo);
    $chamados[] = $registro;

    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
     if($_SESSION['perfil_id'] == 2) {
    //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
        if($_SESSION['id'] != $chamado_dados[0]) {
          continue; // pula o item do loop
        } else {
          $chamados[] = $registro; // Adiciona o registro ao array $chamados
        }
      } else {
        $chamados[] = $registro; // Adiciona o registro ao array $chamados
      }
    }

  // Fechando o arquivo aberto
  fclose($arquivo);


?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../help_desk/assets/css/style.css">
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../help_desk/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">Sair</a>
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
            <?php foreach($chamados as $chamado) { ?>

              <?php $chamado_dados = explode('#', $chamado);

              if(count($chamado_dados) < 3) {
                continue;
              }
              ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>
                </div>
              </div>
              <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>