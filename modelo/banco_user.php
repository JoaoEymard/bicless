<?php

require_once '../include/conexao.php';

function get_user($login, $senha){
    
    $sql = conexao()->prepare("SELECT * FROM user WHERE login = ? AND senha = ?");
    $sql->bindValue(1, $login);
    $sql->bindValue(2, $senha);
    $sql->execute();
    
    return $sql;
}