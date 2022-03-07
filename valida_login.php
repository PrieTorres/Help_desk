<?php

    session_start();//deve sempre ser executada antes de qualquer emisao de dados no navegador
    //$SESSION é um array, os valores sao armazenados no lado do servidor, ou seja qualquer valor definido aqui também poderá ser acessado pelo index.php, home.php e todos os demais, porque os scripts estão compartilhando a variável de sessão criada para essa instância


    //o método $GET recupera os parametros da página, caso o form esteja com o method GET

    /*
    $_GET['email']; //porque em index.php o 'name' colocado no input que guarda o email é email
    $_GET['senha']; //^^^^^^^^^^

    */
    //verificado de autentificação
    $user_autenticado = false;
    $usuario_id = null;

    $perfis = array(
        1 => 'Admintrativo',
        2 => 'Usuario'
    );

    //usuarios do app
    $usuario_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
    );
    
    foreach($usuario_app as $user){

        if($user['email'] == $_POST['email'] && $user
        ['senha'] == $_POST['senha']){ // se o usuario e senha informados forem iguais a algum encontrado no banco de dados
            $user_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    };

    if($user_autenticado){
        echo'usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); // volta para a pagina index.php e informa o parametro login como erro
    }


?>