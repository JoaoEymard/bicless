<?php
require_once "modelo/mensagem.php";
require_once "./include/conexao.php";
require_once "modelo/banco_cliente.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$filtro = '';
$page = '';
if (isset($_GET['c'])) {
    $filtro = $_GET['c'];
} else {
    $filtro = "";
}
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 0;
}

$clientes = listar_todos(conexao(), $filtro);
$qtd = $clientes->rowCount();

if ($qtd == 0) {
    header("location: ./add_cliente.php?c=$filtro");
} else if ($qtd == 1) {
    $c = $clientes->fetch(PDO::FETCH_OBJ);
    header("location: ./cliente.php?c=$c->id");
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
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="css/navbar_style.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body class="container-fluid">

        <?php require_once './include/aside.php'; ?>
        <section class="sessaoGeral">
            <?php require_once './include/navbar.php'; ?>

            <div class="row">
                <div class="col-md-12">

                    <?php verifica_msg(); ?>

                    <?php if (!empty($filtro)) { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <a href="add_cliente.php?c=<?= $filtro ?>" class="text-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Não achou!</strong> Adicione "<?= $filtro ?>" aos clientes!
                            </a>
                        </div>
                    <?php } ?>

                    <div class="title-page">
                      <h3>Lista de clientes</h3>
                      <span>Confira os seus últimos clientes cadastrados</span>
                    </div>

                    <div class="list-group card">
                        <div class="list-group-item">
                            <div class="col-xs-12 col-sm-6 title">Nome</div>
                            <div class="col-xs-0 col-sm-5 hidden-xs title">Telefone</div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        while ($c = $clientes->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <a href="cliente.php?c=<?= $c->id ?>" class="list-group-item">
                                <div class="col-xs-12 col-sm-6"><?= $c->nome ?></div>
                                <div class="col-xs-0 col-sm-5"><?= $c->fone1 ?></div>
                                <div class="clearfix"></div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <footer style="height: 50px;"></footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/navbar_pesquisa.js"></script>
    </body>
</html>
