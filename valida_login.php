<?php
    session_start();

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


    foreach($usuarios_app as $user) {
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

?>