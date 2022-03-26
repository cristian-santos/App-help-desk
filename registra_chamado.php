<?php

    session_start();

    // Trabalhanddo na montagem do texto
    $titulo     = str_replace('#', '-', $_POST['titulo']);
    $categoria  = str_replace('#', '-', $_POST['categoria']);
    $descrição  = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id']. '#' . $titulo . '#' . $categoria . '#' . $descrição . PHP_EOL;

    // Abrindo o arquivo
    $arquivo = fopen('arquivo.txt', 'a');
    // Escrevendo o texto
    fwrite($arquivo, $texto);
    // Fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php');

    

?>