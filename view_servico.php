<?php
require_once "./modelo/mensagem.php";
require_once './include/conexao.php';
require_once "./modelo/banco_servico.php";

$bd = conexao();

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}
if (!isset($_GET["s"])) {
    header("location: listar_cliente.php");
}

$servico = get_os_byId($bd, $_GET["s"]);
$item = $servico->fetch(PDO::FETCH_OBJ);
$os = $item;
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
                    <div class="col-md-12 msg-erro">
                        <?php verifica_msg() ?>
                    </div>

                    <form class="form-group" method="post">

                        <div class="col-md-9">
                            <div class="card">
                                <div class="title-block">
                                    <h3 class="title">Detalhes do serviço</h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 conteudo">
                                        <div><strong>Cliente</strong></div>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?= $os->nome ?>" disabled />
                                                <a class="input-group-addon" href="cliente.php?c=<?= $os->id_cliente ?>"><i class="fa fa-user" aria-hidden="true"></i></a>
                                            </div>
                                            <input type="text" name="cliente" class="form-control hidden" value="<?= $os->id_cliente ?>" />
                                            <input type="text" name="id" class="form-control hidden" value="<?= $os->id ?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 conteudo">
                                        <div><strong>Valor</strong></div>
                                        <div>
                                            <div class="input-group campo-valor-os">
                                              <a class="input-group-addon">R$ </a>
                                              <input type="text" name="valor_view" class="form-control editavel preValor" value="<?= str_replace("R$ ", "", $os->valor_view) ?>" />
                                            </div>
                                            <input type="hidden" name="valor" class="valor" value="0" value="<?= $os->valor ?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 conteudo">
                                        <div><strong>Data</strong></div>
                                        <div>
                                            <input type="date" name="data" class="form-control editavel" value="<?= $os->data ?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 conteudo">
                                        <div><strong>Problema do cliente</strong></div>
                                        <textarea class="form-control editavel" name="problema" rows="4" ><?= $os->text_problema ?></textarea>
                                    </div>
                                    <div class="col-sm-6 conteudo">
                                        <div><strong>Suporte realizado</strong></div>
                                        <textarea class="form-control editavel" name="suporte" rows="4" ><?= $os->text_suporte ?></textarea>
                                    </div>

                                    <div class="col-sm-12 conteudo">
                                        <?php
                                        if ($os->status == 0) {
                                            echo "<p><span class='glyphicon glyphicon-ok text-success' ></span> Serviço Finalizado e Pago</p>";
                                        }
                                        if ($os->status == 1) {
                                            echo "<p><span class='glyphicon glyphicon-wrench text-warning' ></span> Serviço Ativo</p>";
                                        }
                                        if ($os->status == 2) {
                                            echo "<p><span class='glyphicon glyphicon-usd text-danger' ></span> Esperando pagamento</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card card-list-servico">
                                <div class="title-block">
                                    <h3 class="title">Serviço</h3>
                                </div>
                                <div class="list_servicos">
                                    <?php do { ?>
                                        <p class='item-servico remove'><span class="name-item-servico"><?= $item->servicoNome ?></span><span id="<?= $item->servicoId ?>" class='pull-right' onclick="remove(this)"><i class="fa fa-times text-danger" aria-hidden="true"></i></span></p>

                                    <?php } while ($item = $servico->fetch(PDO::FETCH_OBJ)); ?>
                                    <p class='separador'></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="pull-left">
                                    <a href="include/removeOs.php?id=<?= $os->id ?>&c=<?= $os->id_cliente ?>" class="btn btn-excluir">Excluir <i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                                <div class="text-right">
                                    <a href="javascript:window.history.go(-1)" type="submit" class="btn btn-default">Voltar</a>
                                    <?php if ($os->status != 0) { ?>
                                        <a href="" type="submit" class="btn btn-success" data-toggle="modal" data-target="#finalizandoservico">Finalizar servico</a>
                                        <input type="submit" class="btn btn-primary btn-atualizar" formaction="include/atualiza_servico.php" value="Salvar alterações" disabled="" style="display: none" />
                                    <?php } else { ?>
                                        <a href="include/os_finalizadaPaga.php?id=<?= $os->id ?>&c=<?= $os->id_cliente ?>&ns=1" type="submit" class="btn btn-danger">Reativar Serviço</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="finalizandoservico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Finanlizando Serviço</h4>
                        </div>
                        <div class="modal-body text-center" style="padding-top: 50px; padding-bottom: 50px">
                            <?php if ($os->status == 1) { ?>
                                <a href="include/os_finalizadaPaga.php?id=<?= $os->id ?>&c=<?= $os->id_cliente ?>&ns=0" class="btn btn-lg btn-primary">Finalizado e Pago</a>
                                <a href="include/os_finalizadaPaga.php?id=<?= $os->id ?>&c=<?= $os->id_cliente ?>&ns=2" class="btn btn-lg btn-default">Esperando Pagamento</a>
                            <?php } else if ($os->status == 2) { ?>
                                <a href="include/os_finalizadaPaga.php?id=<?= $os->id ?>&c=<?= $os->id_cliente ?>&ns=0" class="btn btn-lg btn-primary">Pagamento Realizado</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <footer style="height: 50px;"></footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/navbar_pesquisa.js"></script>
        <script>
            $('.editavel').change(function () {
                $('.btn-atualizar').removeAttr('disabled').fadeIn(300);
            });

            $.ajax({
                url: "include/getServicos.php",
                cache: false,
                async: false,

                success: (function ($r) {
                    $itens = JSON.parse($r);
                    ul = document.getElementsByClassName("name-item-servico");

                    for ($c = 0; $c < $itens.length; $c++) {
                        $iqual = true;
                        for ($i = 0; $i < ul.length; $i++) {
                            if ($itens[$c]['nome'].indexOf(ul[$i].innerHTML) > -1) {
                                $iqual = false;
                            }
                        }

                        if ($iqual) {
                            $(".list_servicos").append("<p class='item-servico'><span class='name-item-servico'>" + $itens[$c]['nome'] + "</span><span id='" + $itens[$c]['id'] + "' class='pull-right' onclick='add(this)'><i class='fa fa-plus text-success' aria-hidden='true'></i></span></p>");
                        }
                    }
                })

            });

            function remove (obj){
                $osId = <?= $os->id ?>;
                $dados = {"os": $osId.toString(), "s": $(obj).prop('id')};
                if ($('.remove').length > 1){
                    $.ajax({
                        url: "include/removeServicoOs.php",
                        cache: "false",
                        data: $dados,
                        method: "POST",

                        success: (function($r){
                            $(obj).html("<span class='pull-right'><i class='fa fa-check text-primary' aria-hidden='true'></i></span>");
                            $(obj).parent('.remove').removeClass('remove');
                        })
                    });
                }else{
                    $('.msg-erro').html("<p class='alert alert-danger text-center'>Proibido excluir o último serviço.</p>");
                }
            }
            function add (obj){
                $osId = <?= $os->id ?>;
                $dados = {"os": $osId.toString(), "s": $(obj).prop('id')};

                $.ajax({
                    url: "include/addServicoOs.php",
                    cache: "false",
                    data: $dados,
                    method: "POST",

                    success: (function($r){
                        $(obj).html("<span class='pull-right'><i class='fa fa-check text-primary' aria-hidden='true'></i></span>");
                    })
                });
            }

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
