<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$id = $_POST['idCliente'];
$array = get_os_byCliente(conexao(), $id)->fetchAll();
$size = count($array);

for ($c = 0; $c < $size; $c++) {
    $iguais[] = $array[$c]["id"];
}
$iguais = array_count_values($iguais);

for ($c = 0; $c < $size; $c++) {
    $salto = $iguais[$array[$c]["id"]] - 1;
    if ($salto > 0) {
        $returno[] = array(
            'id' => $array[$c]["id"],
            'nome' => $array[$c]["servicoNome"] . " + " . $salto,
            'valor' => $array[$c]["valor"],
            'valor_view' => $array[$c]["valor_view"],
            'data' => $array[$c]["data"],
            'status' => $array[$c]["status"]
        );
        $c += $salto;
    } else {
        $returno[] = array(
            'id' => $array[$c]["id"],
            'nome' => $array[$c]["servicoNome"],
            'valor' => $array[$c]["valor"],
            'valor_view' => $array[$c]["valor_view"],
            'data' => $array[$c]["data"],
            'status' => $array[$c]["status"]
        );
    }
}

print json_encode($returno);

die();
