<?php

session_start();

        // os inputs devem ter names para o metodo funcionar

        $titulo = str_replace('#','-', $_POST['titulo']); //substitui qualquer # escrito por um - pq senão não vai ter como usar o # para a classificação do texto
        $categoria = str_replace('#','-', $_POST['categoria']);
        $descricao = str_replace('#','-', $_POST['descricao']);
        $usuario_id = $_SESSION['id'];

        // também poderia ter sido usado o implode('#', $_POST);

        $texto = $usuario_id.'#'. $titulo .'#'. $categoria .'#'. $descricao . PHP_EOL;

        $arquivo = fopen('arquivo.hd', 'a'); // 2 parametros: ('nome do arquivo que queremos abrir(senaoexistir vai ser criado)','indicar oque quer fazer com o arquivo(consultar documentação PHP)')
        // 'a' vai abrir o arquivo para escrita

        
        //escrevendo no arquivo
        fwrite($arquivo, $texto); // 2 parametro: ('referencia do arquivo aberto', 'oque vai ser escrito no arquivo');


        //fechando o arquivo
        fclose($arquivo);

        header('Location: abrir_chamado.php')


?>