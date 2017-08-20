<?php

function conexao(){
    $db_host = "mysql427.umbler.com";
    $db_nome = "bd_cheype";
    $db_usuario = "user_bd_cheype";
    $db_senha = ")F4/2Bk?9rR";

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_nome", $db_usuario, $db_senha);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES utf8');
        return $db;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
