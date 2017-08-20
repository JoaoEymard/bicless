<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$id = $_GET['id'];
$cliente = $_GET['c'];

removeServico_os_By_Id_os(conexao(), $id);
removeOs_By_Id(conexao(), $id);

header("location: ../cliente.php?c=$cliente");

die();
