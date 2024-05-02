<?php

if($acao == '' && $param == ''){ echo json_encode(['Erro' => 'Caminho não encontrado']); exit; }

if($acao == 'delete' && $param == '') { echo json_encode(['Erro' => 'É necessário informar um cliente']); exit; }

if($acao == 'delete' && $param != '') {

    $database = DB::connect();
    $deleteQuery = $database->prepare("DELETE FROM clientes WHERE id={$param}");
    $execDelete = $deleteQuery->execute();
    if($execDelete)
    {
        echo json_encode(["dados" => 'Dados removidos com sucesso!']);
    } else {
        echo json_encode(["dados" => 'Erro ao removidos dados.']);
    }
}
