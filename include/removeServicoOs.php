<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$servico = $_POST["s"];
$os = $_POST["os"];

removeServico_os(conexao(), $os, $servico);    

die();
