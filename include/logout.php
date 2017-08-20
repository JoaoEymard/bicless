<?php

session_start();
require_once '../modelo/mensagem.php';

session_unset($_SESSION["login_sistem"]);

msg("success", "Deslogado com Sucesso");
header("location: ../login.php");
die();
