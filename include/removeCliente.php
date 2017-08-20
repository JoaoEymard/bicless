<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";
require_once "../modelo/banco_cliente.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$id = $_GET['c'];
$bd = conexao();

$array = get_os_byCliente($bd, $id)->fetchAll();
$size = count($array);

for ($c = 0; $c < $size; $c++) {
    $iguais[] = $array[$c]["id"];
}
$iguais = array_count_values($iguais);

for ($c = 0; $c < $size; $c++) {
    $salto = $iguais[$array[$c]["id"]] - 1;

    removeServico_os_By_Id_os($bd, $array[$c]["id"]);
    removeOs_By_Id($bd, $array[$c]["id"]);
    $c += $salto;
}
remove_cliente_byId($bd, $id);

header("location: ../");

die();
