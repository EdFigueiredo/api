<?php

if($acao == '' && $param == '') {  echo json_encode(['Erro' => 'Caminho não encontrado']); die;}

if($acao == 'update' && $param == '') { echo json_encode(['Erro' => 'É necessário informar um cliente']); die;}

if($acao == 'update' && $param != '') {

    array_shift($_POST);

    $query = "UPDATE clientes SET ";
    $cont = 1;
    foreach (array_keys($_POST) as $indice) {
        if(count($_POST) > $cont)
        {
            $query .= "{$indice} = '{$_POST[$indice]}', ";
        }
        else
        {
            $query .= "{$indice} = '{$_POST[$indice]}' ";
        }
        $cont++;
    }
    $query .= "WHERE id= {$param}";

    $database = DB::connect();
    $updateQuery = $database->prepare($query);
    $execUpdate = $updateQuery->execute();
    if($execUpdate)
    {
        echo json_encode(["dados" => 'Dados atualizados com sucesso!']);
    } else {
        echo json_encode(["dados" => 'Erro ao atualizar dados.']);
    }
}