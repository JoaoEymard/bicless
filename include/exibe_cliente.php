<?php

require_once "modelo/mensagem.php";
require_once "modelo/banco_cliente.php";
require_once "modelo/banco_servico.php";
require_once "include/conexao.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$os = get_cliente_byId(conexao(), $_GET['c']);

