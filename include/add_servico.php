<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();

$cliente = "";
$servico = "";
$valor = "";
$valor_view = "";
$problema = "";
$suporte = "";

$cliente = $_POST['cliente'];
$servico = $_POST['servico'];
$valor = $_POST['valor'];
$valor_view = "R$ " . $_POST['valor_view'];
$problema = $_POST['problema'];
$suporte = $_POST['suporte'];

if (empty($servico)){
    msg("danger", "Informe pelo menos um serviço.");
    echo("<script>history.back();</script>");
}else{
    $id = set_os($bd, $cliente, $valor, $valor_view, $problema, $suporte);

    if ($id !== false){
        for ($c = 0; $c < count($servico); $c++){
            addServico_os($bd, $id, $servico[$c]);
        }
    }

    header("location: ../cliente.php?c=$cliente");
}
