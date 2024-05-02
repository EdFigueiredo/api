<?php

if($acao == '' && $param == '') { echo json_encode(['Erro' => 'Caminho não encontrado']); die;}

if($acao == 'adiciona' && $param == '')
{
    $query = "INSERT INTO clientes (";
    $cont = 1;
    foreach (array_keys($_POST) as $indice) {
        if(count($_POST) > $cont)
        {
            $query .= "{$indice},";
        }
        else
        {
            $query .= "{$indice}";
        }
        $cont++;
    }
    $query .= ") VALUES (";

    $cont = 1;
    foreach (array_values($_POST) as $valor) {
        if(count($_POST) > $cont)
        {
            $query .= "'{$valor}',";
        }
        else
        {
            $query .= "'{$valor}'";
        }
        $cont++;
    }
    $query .= ");";
    $database = DB::connect();
    $insertQuery = $database->prepare($query);
    //var_dump($insertQuery); die;
    $execInsert = $insertQuery->execute();
    //var_dump($execInsert); die;
    if($execInsert)
    {
        echo json_encode(["dados" => 'Dados inseridos com sucesso!']);
    } else {
        echo json_encode(["dados" => 'Erro ao inserir dados.']);
    }
}