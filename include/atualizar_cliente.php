<?php

require_once "../modelo/mensagem.php";
require_once "./conexao.php";
require_once "../modelo/banco_cliente.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$bd = conexao();

$nome = $_POST['nome'];
$fone1 = $_POST['fone1'];
$fone2 = $_POST['fone2'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$referencia = $_POST['referencia'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$id = $_POST['id'];

if (atualiza($bd, $nome, $fone1, $fone2, $email, $endereco, $referencia, $bairro, $cidade, $id)){
    msg('success', 'Cadastro Atualizado!');
    header("location: ../cliente.php?c=$id");
}
