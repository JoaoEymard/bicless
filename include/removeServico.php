<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();

if (remove_nome_servicos($bd, $_GET['id'])){
  msg("success", "Serviço removido");
}

header("location: ../crud_servicos.php");

die();
