<?php

/*
 *
  SELECT `os`.id, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.status, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS data, `cliente`.nome, `servico`.nome AS servicoNome FROM `os_servico`
  INNER JOIN `os` ON `os_servico`.id_os = `os`.id
  INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
  INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id
 *
 */

function get_os_byId($bd, $id) {
    $sql = $bd->prepare("SELECT `os`.id, `os`.id_cliente, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.valor_view, `os`.status, `os`.`data`, `cliente`.nome, `servico`.nome AS servicoNome, `servico`.id AS servicoId FROM `os_servico`
                        INNER JOIN `os` ON `os_servico`.id_os = `os`.id
                        INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
                        INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id
                        WHERE `os`.id = ?");
    $sql->bindValue(1, $id);
    $sql->execute();

    return $sql;
}
function get_os_all($bd) {
    $sql = $bd->prepare("SELECT `os`.id, `os`.id_cliente, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.valor_view, `os`.status, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS data, `cliente`.nome, `servico`.nome AS servicoNome FROM `os_servico`
                        INNER JOIN `os` ON `os_servico`.id_os = `os`.id
                        INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
                        INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id");
    $sql->execute();

    return $sql;
}
function get_os_byCliente($bd, $clienteId) {
    $sql = $bd->prepare("SELECT `os`.id, `os`.id_cliente, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.valor_view, `os`.status, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS data, `cliente`.nome, `servico`.nome AS servicoNome FROM `os_servico`
                        INNER JOIN `os` ON `os_servico`.id_os = `os`.id
                        INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
                        INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id
                        WHERE `cliente`.id = ?");
    $sql->bindValue(1, $clienteId);
    $sql->execute();

    return $sql;
}

function set_os($bd, $cliente, $valor, $valor_view, $problema, $suporte) {
    try {
        $bd->beginTransaction();

        $sql = $bd->prepare("INSERT INTO `os` (`id_cliente`,`text_problema`,`text_suporte`,`valor`,`valor_view`,`data`,`status`) VALUES (?,?,?,?,?,NOW(),1)");
        $sql->bindValue(1, $cliente);
        $sql->bindValue(2, $problema);
        $sql->bindValue(3, $suporte);
        $sql->bindValue(4, $valor);
        $sql->bindValue(5, $valor_view);
        if ($sql->execute() === true) {
            $sql = $bd->prepare("SELECT * FROM `os` ORDER BY `id` DESC LIMIT 1");
            $sql->execute();
            $item = $sql->fetch(PDO::FETCH_OBJ);
            $bd->commit();
            return $item->id;
        }
    } catch (PDOException $e) {
        $bd->rollBack();
        return false;
    }
}

function addServico_os($bd, $id_os, $id_servico) {
    $sql = $bd->prepare("INSERT INTO `os_servico` (`id_os`,`id_servico`) VALUES (?,?)");
    $sql->bindValue(1, $id_os);
    $sql->bindValue(2, $id_servico);

    return $sql->execute();
}

function removeServico_os($bd, $id_os, $id_servico){
    $sql = $bd->prepare("DELETE FROM `os_servico` WHERE `os_servico`.`id_os` = ? AND `os_servico`.`id_servico` = ?");
    $sql->bindValue(1, $id_os);
    $sql->bindValue(2, $id_servico);

    return $sql->execute();
}

function removeServico_os_By_Id_os($bd, $id_os){
    $sql = $bd->prepare("DELETE FROM `os_servico` WHERE `os_servico`.`id_os` = ?");
    $sql->bindValue(1, $id_os);

    return $sql->execute();
}

function removeOs_By_Id($bd, $id_os){
    $sql = $bd->prepare("DELETE FROM `os` WHERE `id` = ?");
    $sql->bindValue(1, $id_os);

    return $sql->execute();
}




function visualizar_servico($bd, $id) {
    $sql = $bd->prepare("SELECT `cliente`.nome, `os`.*, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS novaData FROM `os` INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id WHERE `os`.id = ? LIMIT 1");
    $sql->bindValue(1, $id);
    $sql->execute();

    return $sql;
}

function add_os($bd, $cliente, $valor, $problema, $suporte) {
    $sql = $bd->prepare("INSERT INTO `os` (`id_cliente`,`text_problema`,`text_suporte`,`valor`,`valor_view`,`data`,`status`) VALUES (?,?,?,?,?,NOW(),1)");
    $sql->bindValue(1, $cliente);
    $sql->bindValue(2, $problema);
    $sql->bindValue(3, $suporte);
    $sql->bindValue(4, $valor);
    $sql->bindValue(5, $valor_view);
    $sql->execute();

    return $sql;
}

function atualiza_servico($bd, $problema, $suporte, $valor, $valor_view, $data, $id) {
    $sql = $bd->prepare("UPDATE `os` SET `text_problema` = ?, `text_suporte` = ?, `valor` = ?, `valor_view` = ?, `data` = ? WHERE `os`.`id` = ?");
    $sql->bindValue(1, $problema);
    $sql->bindValue(2, $suporte);
    $sql->bindValue(3, $valor);
    $sql->bindValue(4, $valor_view);
    $sql->bindValue(5, $data);
    $sql->bindValue(6, $id);
    $sql->execute();

    return $sql;
}

function os_finalizadaPaga($bd, $id, $ns) {
    $sql = $bd->prepare("UPDATE `os` SET `status` = ? WHERE `os`.`id` = ?");
    $sql->bindValue(1, $ns);
    $sql->bindValue(2, $id);
    $sql->execute();

    return $sql;
}

function listar_os($bd, $tipo) {
    $sql = $bd->prepare("SELECT `os`.id, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.valor_view, `os`.status, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS data, `cliente`.nome, `servico`.nome AS servicoNome FROM `os_servico`
                          INNER JOIN `os` ON `os_servico`.id_os = `os`.id
                          INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
                          INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id
                         WHERE `os`.status = ?
                         ORDER BY `os`.data DESC");
    $sql->bindValue(1, $tipo);
    $sql->execute();

    return $sql;
}

function listar_os_data($bd, $tipo, $data1, $data2) {
    $sql = $bd->prepare("SELECT `os`.id, `os`.text_problema, `os`.text_suporte, `os`.valor, `os`.valor_view, `os`.status, DATE_FORMAT(`os`.`data`,'%d/%m/%Y') AS data, `cliente`.nome, `servico`.nome AS servicoNome FROM `os_servico`
                          INNER JOIN `os` ON `os_servico`.id_os = `os`.id
                          INNER JOIN `cliente` ON `os`.id_cliente = `cliente`.id
                          INNER JOIN `servico` ON `os_servico`.id_servico = `servico`.id
                         WHERE `os`.status = ? AND `os`.data <= ? AND `os`.data >= ?
                         ORDER BY `os`.data DESC");
    $sql->bindValue(1, $tipo);
    $sql->bindValue(2, $data1);
    $sql->bindValue(3, $data2);
    $sql->execute();

    return $sql;
}

function listar_nome_servicos($bd) {
    $sql = $bd->prepare("SELECT * FROM `servico`");
    $sql->execute();

    return $sql;
}

function remove_nome_servicos($bd, $id) {
    $sql = $bd->prepare("DELETE FROM `servico` WHERE `id` = ? LIMIT 1");
    $sql->bindValue(1, $id);
    $sql->execute();

    return $sql;
}

function adiciona_nome_servicos($bd, $nome) {
    $sql = $bd->prepare("INSERT INTO `servico` (`nome`) VALUES (?)");
    $sql->bindValue(1, $nome);
    $sql->execute();

    return $sql;
}
