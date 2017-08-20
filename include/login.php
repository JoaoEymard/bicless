<?php

session_start();
require_once '../modelo/banco_user.php';
require_once '../modelo/mensagem.php';

$login = $_POST['login'];
$senha = md5($_POST['senha']);

if (get_user($login, $senha)->rowCount() > 0) {
    $_SESSION["login_sistem"] = "true";
    header("location: ../");
} else {
    msg("danger", "Dados não encontrados!");
    header("location: ../login.php");
}

die();
