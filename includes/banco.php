<?php
    $banco = new mysqli("localhost", "Riquelme_admin", "12345678", "bd_games");

    if($banco->connect_errno) {
        echo "<p>Encontrei um erro $banco->errno --> 
        $banco->connect_error</p>";
        die();
    }

    // $banco->query("SET NAMES 'utf-8'");
    // $banco->query("SET character_set_connection=utf8");
    // $banco->query("SET character_set_client=utf-8");
    // $banco->query("SET character_set_results=utf8"); comandos para deixar a linguagem com acentos, porem VS nao é necessário

    // $busca = $banco->query("select * from generos");
    // if(!$busca){
    //     echo "<p>Falha na busca! $banco->error</p>";
    // } else{
    //       while($reg = $busca->fetch_object()){
    //         print_r($reg);
    //       }          
    // }   exemplo de query para mostrar todos os registros da tabela genero, para deixa mais organizado, coloque um <pre> no começo do código

