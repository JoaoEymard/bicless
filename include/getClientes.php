<?php
require_once "./conexao.php";
require_once "../modelo/banco_cliente.php";

$bd = conexao();

$sql = listar_todos($bd, "");

print json_encode($sql->fetchAll());

die();
