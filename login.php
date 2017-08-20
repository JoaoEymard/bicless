<?php
require_once './modelo/mensagem.php';

if (isset($_SESSION['login_sistem'])) {
    header("location: ./");
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
        <link href="css/login_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body class="container-fluid">

        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <form class="form-group-lg" method="post" action="include/login.php">
                            <img src="img/logo.png" width="200px" class="center-block" />

                            <?php verifica_msg(); ?>

                            <label>Login:</label>
                            <input type="text" name="login" class="form-control" maxlength="50" autofocus />
                            <br />

                            <label>Senha:</label>
                            <input type="password" name="senha" class="form-control" />
                            <br />

                            <input type="submit" class="btn btn-info" />

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer style="height: 50px;"></footer>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
