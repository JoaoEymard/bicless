<?php
require_once "./modelo/mensagem.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}
?>

<!DOCtype html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Sistema Cheype</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body class="container-fluid">

        <?php require_once './include/aside.php'; ?>
        <section class="sessaoGeral">
            <?php require_once './include/navbar.php'; ?>


            <footer style="height: 50px;"></footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/navbar_pesquisa.js"></script>

    </body>
</html>
