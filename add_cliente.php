<?php
require_once "./modelo/mensagem.php";
require_once "./include/conexao.php";
require_once "./modelo/banco_cliente.php";

if (!isset($_SESSION["login_sistem"])) {
    header("location: login.php");
}
if (isset($_GET['c']) || isset($_GET['a'])) {
    if (isset($_GET['c'])) {
        $nomeCliente = $_GET['c'];
    } else {
        $alterar = $_GET['a'];
        $cliente = get_cliente_byId(conexao(), $alterar);
    }
} else {
    header('location: listar_cliente.php');
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

                    <?php verifica_msg() ?>

                    <div class="title-page">
                        <h3>Cadastro de cliente</h3>
                        <span></span>
                    </div>

                    <form class="row form-add-cliente" method="post" <?php if (isset($nomeCliente)){
                            echo "action='include/cadastrar_cliente.php'";
                        }else{
                            echo "action='include/atualizar_cliente.php'";
                        }
                        ?>>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="nome" class="form-control" value="<?php
                                        if (isset($cliente->nome)){
                                            echo $cliente->nome;
                                        } else {
                                            echo $nomeCliente;
                                        }
                                    ?>" autocomplete="false" autofocus />
                                    <input type="text" name="id" class="hidden" value="<?php if(isset($cliente->id)){ echo $cliente->id; } ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="fone1" class="form-control tel" value="<?php if(isset($cliente->fone1)){ echo $cliente->fone1; } ?>" placeholder="(88) 9 9911-4867" required autocomplete='off' maxlength="15" />
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="fone2" class="form-control tel" value="<?php if(isset($cliente->fone2)){ echo $cliente->fone2; } ?>" placeholder="(88) 9 9911-4867" autocomplete='off' maxlength="15" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" value="<?php if(isset($cliente->email)){ echo $cliente->email; } ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco" class="form-control" value="<?php if(isset($cliente->endereco)){ echo $cliente->endereco; } ?>" placeholder="Rua Pero Coelho, 196" />
                                </div>
                                <div class="form-group">
                                    <label>Referência</label>
                                    <input type="text" name="referencia" class="form-control" value="<?php if(isset($cliente->referencia)){ echo $cliente->referencia; } ?>" placeholder="Rua principal" maxlength="255" />
                                </div>
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" class="form-control" value="<?php if(isset($cliente->bairro)){ echo $cliente->bairro; } ?>" placeholder="Centro" />
                                </div>
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" class="form-control" value="<?php if(isset($cliente->cidade)){ echo $cliente->cidade; } ?>" placeholder="Barbalha" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="text-right">
                                    <a href="javascript:history.back()" class="btn btn-default">Voltar</a>
                                    <?php if (isset($nomeCliente)){ ?>
                                        <input type="submit" class="btn btn-primary" value="Cadastrar cliente">
                                    <?php } else { ?>
                                        <input type="submit" class="btn btn-primary" value="Atualiza cadastro">
                                    <?php } ?>
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
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
        };

        $('.tel').mask(SPMaskBehavior, spOptions);
        </script>

    </body>
</html>
