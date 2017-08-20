<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_cliente.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();

$sql = $bd->prepare("SELECT id, nome FROM `servico`");
$sql->execute();

print json_encode($sql->fetchAll());

die();
