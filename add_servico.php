<?php
require_once "./modelo/mensagem.php";
require_once './include/conexao.php';
require_once './include/exibe_cliente.php';

$bd = conexao();

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}
if (!isset($_GET['c'])) {
    header("location: listar_cliente.php");
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
            <div class="row">
                <div class="col-md-12">

                    <form class="form-group" method="post" action="include/add_servico.php">
                        <div class="col-md-12">
                            <?php verifica_msg() ?>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="title-block">
                                    <h3 class="title">Detalhes do serviço</h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 conteudo">
                                        <div><strong>Cliente</strong></div>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?= $os->nome ?>" disabled />
                                                <a class="input-group-addon" href="cliente.php?c=<?= $os->id ?>"><i class="fa fa-user" aria-hidden="true"></i></a>
                                            </div>
                                            <input type="hidden" name="cliente" class="form-control" value="<?= $os->id ?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 conteudo">
                                        <div><strong>Valor</strong></div>
                                        <div>
                                          <div class="input-group campo-valor-os">
                                            <a class="input-group-addon">R$ </a>
                                            <input type="text" name="valor_view" class="form-control editavel preValor" />
                                          </div>
                                          <input type="hidden" name="valor" class="valor" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 conteudo">
                                        <div><strong>Problema do cliente</strong></div>
                                        <textarea class="form-control" name="problema" rows="4" ></textarea>
                                    </div>
                                    <div class="col-sm-6 conteudo">
                                        <div><strong>Suporte realizado</strong></div>
                                        <textarea class="form-control" name="suporte" rows="4" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-list-servico">
                                <div class="title-block">
                                    <h3 class="title">Escolha o serviço</h3>
                                </div>
                                <div class="list_servicos"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="text-right">
                                    <a href="javascript:window.history.go(-1)" type="submit" class="btn btn-default">Voltar</a>
                                    <input type="submit" class="btn btn-primary" value="Cadastrar serviço" />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <footer style="height: 50px;"></footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/navbar_pesquisa.js"></script>
        <script>
            $.ajax({
                url: "include/getServicos.php",
                cache: false,
                async: false,

                success: (function ($r) {
                    $itens = JSON.parse($r);

                    for ($c = 0; $c < $itens.length; $c++) {
                        $(".list_servicos").append("<label class='item-servico'><input type='checkbox' name='servico[]' value='" + $itens[$c]["id"] + "' > " + $itens[$c]["nome"] + "</label>");
                    }
                })
            });

            $(".preValor").mask("#.##0,00", {reverse: true});
            $(".preValor").change(function(){
                $(".valor").html("").unmask();
                $(".valor").attr("value", function(){
                    return $(".preValor").cleanVal();
                }).mask("#0.00", {reverse: true});
            });

        </script>

    </body>
</html>
