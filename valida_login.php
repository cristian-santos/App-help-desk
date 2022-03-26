<?php
    session_start();

    // $_SESSION['x'] = 'Oi sou um valor de sessão';
    // print_r($_SESSION);
    // echo '<hr>';

    // verifica a autenticação
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    // Perfis
    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    // Usuários do sistema
    $usuarios_app = array(
        array('id' => 1 , 'email' => 'adm@teste.com.br', 'senha' => 'adm', 'perfil_id' => 1),
        array('id' => 2 , 'email' => 'user@teste.com.br', 'senha' => 'user', 'perfil_id' => 1),
        array('id' => 3 , 'email' => 'jose@teste.com.br', 'senha' => 'jose', 'perfil_id' => 2),
        array('id' => 4 , 'email' => 'paulo@teste.com.br', 'senha' => 'paulo', 'perfil_id' => 2),
    );

    // echo '<pre>';
    // print_r($usuarios_app);
    // echo '<pre>'

    foreach($usuarios_app as $user) {
        // echo 'Usuário app: ' .$user['email']. '/' .$user['senha'];
        // echo '<br>';
        // echo 'Usuário form: ' .$_POST['email']. '/' .$_POST['senha'];

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

        if($usuario_autenticado) {
            echo 'Usuário autenticado';
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil_id'] = $usuario_perfil_id;
            header('location: home.php');
        } else {
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro');
        }






    // print_r($_GET);
    // echo '<br>';
    // echo $_GET['email'];
    // echo '<br>';
    // echo $_GET['senha'];

    // print_r($_POST);
    // echo '<br>';
    // echo $_POST['email'];
    // echo '<br>';
    // echo $_POST['senha'];
?>