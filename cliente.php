<?php
require_once "./modelo/mensagem.php";
require_once './include/exibe_cliente.php';

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

        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="./css/navbar_style.css" rel="stylesheet" type="text/css"/>
        <link href="./css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body class="container-fluid">

        <?php require_once './include/aside.php'; ?>
        <section class="sessaoGeral">
            <?php require_once './include/navbar.php'; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="title-page">
                        <h3>cliente <b><?= $os->nome ?></b></h3>
                        <span></span>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <strong>Status:</strong> <span style='margin-left: 15px;'></span>

                        <span class="info-status"></span>

                        <div href="" style="float: right" >
                            <a href="add_servico.php?c=<?= $os->id ?>" class="text-success" ><strong>Novo Serviço</strong></a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="card" style="padding: 15px;">
                                <div class="title-block">
                                    <h3 class="title">Informações do cadastro</h3>
                                </div>
                                <table class="table table-striped visible-md visible-lg visible-sm">
                                    <tr>
                                        <td class="col-sm-3 col-xs-12"><strong>Telefones</strong></td>
                                        <td class="col-sm-9 col-xs-12"><?= $os->fone1 ?> / <?= $os->fone2 ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-3 col-xs-12"><strong>Cidade</strong></td>
                                        <td class="col-sm-9 col-xs-12"><?= $os->cidade ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-3"><strong>Endereço</strong></td>
                                        <td class="col-sm-9"><?= $os->endereco ?> - <?= $os->bairro ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-3"><strong>Referência</strong></td>
                                        <td class="col-sm-9"><?= $os->referencia ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-3"><strong>Email</strong></td>
                                        <td class="col-sm-9"><?= $os->email ?></td>
                                    </tr>
                                </table>

                                <ul class="list-group list-exibe-cliente visible-xs">
                                    <li class="list-group-item">
                                        <p><strong>Telefones</strong><br /><?= $os->fone1 ?> / <?= $os->fone2 ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p><strong>Cidade</strong><br /><?= $os->cidade ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p><strong>Endereço</strong><br /><?= $os->endereco ?> - <?= $os->bairro ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p><strong>Referência</strong><br /><?= $os->referencia ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <p><strong>Email</strong><br /><?= $os->email ?></p>
                                    </li>
                                </ul>

                                <div class="text-right">
                                    <a href="include/removeCliente.php?c=<?= $os->id ?>" class="btn btn-excluir">Excluir <i class="fa fa-times" aria-hidden="true"></i></a>
                                    <a href="./add_cliente.php?a=<?= $os->id ?>" class="btn btn-editar">Editar cadastro <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <?php verifica_msg(); ?>

                            <div class="list-group listaServicos">
                                <div class='list-group-item' style="background-color: #455A64;color: #fff;font-size: 20px;padding-top: 15px;padding-bottom: 15px;">
                                    <div class='row'>
                                        <div class='col-sm-6'>Serviço</div>
                                        <div class='col-sm-3 hidden-xs'>Valor</div>
                                        <div class='col-sm-2 hidden-xs'>Data</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer style="height: 50px;"></footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/navbar_pesquisa.js"></script>

        <script>
            $serAt = 0;
            $debito = 0;
            $listCompleta = "";

            function verificaStatus($c) {
                if ($c === "1" && $serAt === 0) {
                    if ($debito === 1) {
                        $(".info-status").append("<span style='margin-left: 15px; border-left: 1px solid #000; padding-right: 15px'></span>");
                    }
                    $(".info-status").append("<span class='glyphicon glyphicon-wrench text-warning' ></span> Serviço ativo");
                    $serAt = 1;
                }
                if ($c === "2" && $debito === 0) {
                    if ($serAt === 1) {
                        $(".info-status").append("<span style='margin-left: 15px; border-left: 1px solid #000; padding-right: 15px'></span>");
                    }
                    $(".info-status").append("<span class='glyphicon glyphicon-usd text-danger' ></span> Em débito");
                    $debito = 1;
                }
            }

            function exibeRegistro($id, $servico, $valor, $data, $icon) {
                $ul = "";
                $ul += "<a href='view_servico.php?s=" + $id + "' class='list-group-item'>";
                $ul += "<div class='row'>";
                $ul += "<div class='col-sm-6 col-xs-6'>" + $servico + "</div>";
                $ul += "<div class='col-sm-3 col-xs-6 valor'>" + $valor + "</div>";
                $ul += "<div class='col-sm-2 col-xs-6'>" + $data + "</div>";
                $ul += $icon;
                $ul += "</div></a>";

                $(".listaServicos").append($ul);
            }

            $.ajax({
                url: "include/cliente_servicos.php",
                async: true,
                cache: false,
                data: {"idCliente": <?= $os->id ?>},
                method: "POST",
                success: (function ($r) {
                    $s = JSON.parse($r);
                    $listCompleta = $s;

                    for ($i = 0; $i < $s.length && $i < 8; $i++) {

                        switch ($s[$i]["status"]){
                            case "1":
                                $icon = "<span class='glyphicon glyphicon-wrench text-warning pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            case "2":
                                $icon = "<span class='glyphicon glyphicon-usd text-danger pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            case "0":
                                $icon = "<span class='glyphicon glyphicon-ok text-success pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            default:
                                $icon = "";
                                break;
                        }

                        exibeRegistro($s[$i]['id'], $s[$i]['nome'], $s[$i]['valor_view'], $s[$i]['data'], $icon);
                        verificaStatus($s[$i]['status']);
                    }
                    if ($s.length > 8){
                        $(".listaServicos").append("<a class='list-group-item text-center listarTodos'>Exibir todos os " + $s.length + " serviços</a>");
                        for ($i = 8; $i < $listCompleta.length; $i++) {
                            verificaStatus($s[$i]['status']);
                        }
                    }else{
                        $(".listaServicos").append("<a class='list-group-item text-center'>Total: " + $s.length + " serviços</a>");
                    }
                    if ($serAt === 0 && $debito === 0) {
                        $(".info-status").append("<span class='glyphicon glyphicon-ok text-success' ></span> OK");
                    }
                })
            });

            $(window).load(function(){
                $(".listarTodos").click(function(){
                    $(this).remove();
                    for ($i = 8; $i < $listCompleta.length; $i++) {

                        switch ($s[$i]["status"]){
                            case "1":
                                $icon = "<span class='glyphicon glyphicon-wrench text-warning pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            case "2":
                                $icon = "<span class='glyphicon glyphicon-usd text-danger pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            case "0":
                                $icon = "<span class='glyphicon glyphicon-ok text-success pull-right' style='margin: 2px 10px 0 0' ></span>";
                                break;
                            default:
                                $icon = "";
                                break;
                        }

                        exibeRegistro($s[$i]['id'], $s[$i]['nome'], $s[$i]['valor_view'], $s[$i]['data'], $icon);
                    }
                    $(".listaServicos").append("<a class='list-group-item text-center'>Total: " + $listCompleta.length + " serviços</a>");
                });
            });

        </script>

    </body>
</html>
