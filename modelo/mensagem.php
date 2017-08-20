<?php

session_start();

function verifica_msg() {
    if (isset($_SESSION['danger'])) {
        echo "<p class='alert alert-danger text-center'>" . $_SESSION['danger'] . "</p>";
        unset($_SESSION['danger']);
    }
    if (isset($_SESSION['success'])) {
        echo "<p class='alert alert-success text-center'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
}

function msg($tipo, $msg) {
    $_SESSION[$tipo] = $msg;
}