<?php
require_once "./modelo/mensagem.php";
require_once "./modelo/banco_servico.php";
require_once "./include/conexao.php";
require_once "./include/numero_extenso.php";

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

  <?php
  if (isset($_GET['s'])) {
    $consulta = visualizar_servico(conexao(), $_GET['s']);
    $os = $consulta->fetch(PDO::FETCH_OBJ);
    ?>

    <div class="box-recibo">
      <div class="row cabecalho">
        <img src='img/logo.png' alt="" class="img-logo" />

        <p class="localizacao pull-right">
          Rua Pero Coelho, 196 - Barbalha/CE<br />
          Contato: (88) 9 9911-4867/ (88) 9 9639-6886<br />
          www.cheype.com.br
        </p>
      </div>

      <div class="row">
        <h1 class="col-xs-8 text-center">RECIBO</h1>
        <div class="box-recibo-valor col-xs-4">
          <div>
            <sup>R$</sup>
            <span class="pull-right"><?= $os->valor ?>,00</span>
          </div>
        </div>
      </div>

      <div class="row texto">
        <div class="col-xs-12">
          <p>&emsp;Afirmo ter recebido do Sr. (Empresa) <span class="sublinado"><?= $os->nome ?></span> a quantia de <span class="sublinado">R$ <?= $os->valor ?>,00 (<?php echo extenso($os->valor); ?> )</span>, referente aos serviços listados abaixo:
</p>
        </div>
      </div>
    </div>

    <?php
  } ?>

</body>
</html>
