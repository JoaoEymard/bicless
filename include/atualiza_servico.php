<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();

$cliente = "";
$problema = "";
$suporte = "";
$valor = "";
$valor_view = "";
$data = "";
$id = "";

$cliente = $_POST['cliente'];
$problema = $_POST['problema'];
$suporte = $_POST['suporte'];
$valor = $_POST['valor'];
$valor_view = "R$ " . $_POST['valor_view'];
$data = $_POST['data'];
$id = $_POST['id'];

if (atualiza_servico($bd, $problema, $suporte, $valor, $valor_view, $data, $id)){
    msg('success', 'Serviço Atualizado!');
    header("location: ../cliente.php?c=$cliente");
}
