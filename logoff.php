<?php

    session_start();// toda vez que for usar a session em algum script devesse fazer isso

    // remover indices do array de session
    //unset() remove indices de qualquer array
    // remove o indice somente se ele existir


    //destruir a variavel session
    //session_destroy() remove todos os indices dentro de session
    // é necessario forçar um redirecionamento após o mesmo pois mesmo após o comando ainda é possivel o acesso aos indices, porém após o redirecionamento eles não existirão mais ------>
    
    session_destroy();
    header('location: index.php');
    

?>