<?php
require_once "modelo/mensagem.php";
require_once "./include/conexao.php";
require_once "modelo/banco_servico.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}

$d1 = date('Y-m-31');
$d2 = date('Y-m');

if (isset($_GET['d2'])) {
    $d1 = date($_GET['d2']."-31");
    $d2 = date($_GET['d2']);
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

                    <div class="title-page">
                        <h3>Histórico dos serviços finalizados
                        </h3>
                        <span>Lista completa de todos os serviços relacionados ao status escolhido.</span>
                    </div>

                    <div class="text-right form-group">
                      <form class="form-inline">
                        <div class="form-group">
                          <span>Selecione o mês:</span>
                          <input type="month" class="form-control" name="d2" value="<?= $d2 ?>"/>
                        </div>
                        <input type="submit" value="Filtrar" class="btn btn-default"/>
                      </form>
                    </div>

                    <div class="list-group list-cliente">
                        <div class="list-group-item">
                            <div class="col-xs-6 col-sm-5">Nome</div>
                            <div class="col-xs-6 col-sm-3">Servico</div>
                            <div class="col-xs-0 col-sm-2 text-center hidden-xs">Valor</div>
                            <div class="col-xs-0 col-sm-2 hidden-xs">Data</div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        $clientes = listar_os_data(conexao(), 0, $d1, $d2);
                        $id = '';
                        if($clientes->rowCount() == 0){
                          echo "<p class='text-center text-danger'>Nada encontrado nesse período.</p>";
                        }

                        while ($c = $clientes->fetch(PDO::FETCH_OBJ)) {
                            if ($id == $c->id) {
                                $c = $clientes->fetch(PDO::FETCH_OBJ);
                            }else{
                            ?>
                            <a href="view_servico.php?s=<?= $c->id ?>" class="list-group-item">
                                <div class="col-xs-6 col-sm-5"><?= $c->nome ?></div>
                                <div class="col-xs-6 col-sm-3"><?= $c->servicoNome ?></div>
                                <div class="col-xs-6 col-sm-2"><?= $c->valor_view ?></div>
                                <div class="col-xs-6 col-sm-2"><?= $c->data ?></div>
                                <div class="clearfix"></div>
                            </a>
                            <?php $id = $c->id ?>
                            <?php }
                            }
                        ?>
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
