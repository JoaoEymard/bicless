<?php

function add($bd, $nome, $fone1, $fone2, $email, $endereco, $referencia, $bairro, $cidade){
    
    $sql = $bd->prepare("INSERT INTO `cliente` (`nome`, `fone1`, `fone2`, `email`, `endereco`, `referencia`, `bairro`, `cidade`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bindValue(1, $nome);
    $sql->bindValue(2, $fone1);
    $sql->bindValue(3, $fone2);
    $sql->bindValue(4, $email);
    $sql->bindValue(5, $endereco);
    $sql->bindValue(6, $referencia);
    $sql->bindValue(7, $bairro);
    $sql->bindValue(8, $cidade);
    $sql->execute();
    
    return $sql;
}

function atualiza($bd, $nome, $fone1, $fone2, $email, $endereco, $referencia, $bairro, $cidade, $id){
    
    $sql = $bd->prepare("UPDATE `cliente` SET nome = ?, `fone1` = ?, `fone2` = ?, `email` = ?, `endereco` = ?, `referencia` = ?, `bairro` = ?, `cidade` = ? WHERE `cliente`.`id` = ?");
    $sql->bindValue(1, $nome);
    $sql->bindValue(2, $fone1);
    $sql->bindValue(3, $fone2);
    $sql->bindValue(4, $email);
    $sql->bindValue(5, $endereco);
    $sql->bindValue(6, $referencia);
    $sql->bindValue(7, $bairro);
    $sql->bindValue(8, $cidade);
    $sql->bindValue(9, $id);
    $sql->execute();
    
    return $sql;
}

function listar_todos($bd, $c){
    
    $sql = $bd->prepare("SELECT * FROM `cliente` WHERE nome LIKE ? ORDER BY nome ASC");
    $sql->bindValue(1, "%$c%");
    $sql->execute();
    
    return $sql;
}

function get_cliente_byId ($bd, $id_cliente){
    $sql = $bd->prepare("SELECT * FROM `cliente` WHERE id = ? LIMIT 1");
    $sql->bindValue(1, $id_cliente);
    $sql->execute();
    
    return $sql->fetch(PDO::FETCH_OBJ);
}

function remove_cliente_byId ($bd, $id_cliente){
    $sql = $bd->prepare("DELETE FROM `cliente` WHERE `cliente`.`id` = ?");
    $sql->bindValue(1, $id_cliente);
    
    return $sql->execute();
}