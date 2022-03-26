<?php
session_start();
/*
    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";


    // Remover índices do array por sessão
    // unset()

    unset($_SESSION['x']); // só remove o índice se ele existir
    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";

    // destruir a váriavel de sessão
    // session destroy()

    session_destroy(); //Será destruída
    //Usar o redirect para que seja atualizado e desapareça
    echo "<pre>";
    print_r($_SESSION);
    echo "<pre>";
    */

    session_destroy();
    header('Location: index.php');
?>