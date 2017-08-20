<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();
$id = $_GET['id'];
$cliente = $_GET['c'];
$newStatus = $_GET['ns'];

if (os_finalizadaPaga($bd, $id, $newStatus)){
    msg('success', 'Status do serviço atualizado!');
    header("location: ../cliente.php?c=$cliente");
}