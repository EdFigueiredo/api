<?php

if($acao == '' && $param == '') { echo json_encode(['Erro' => 'Caminho não encontrado']); die;}

if($acao == 'lista' && $param == '' ){
    $database = DB::connect();
    $consult = $database->prepare("SELECT * FROM clientes ORDER BY nome");
    $consult->execute();
    $object = $consult->fetchAll(PDO::FETCH_ASSOC);

    if($object) 
    {
        echo json_encode(["dados" => $object]);
    } else {
        echo json_encode(["dados" => 'Não existem dados a serem retornados']);
    }
}

if($acao == 'lista' && $param != '' ){
    $database = DB::connect();
    $consult = $database->prepare("SELECT * FROM clientes WHERE id={$param} ");
    $consult->execute();
    $object = $consult->fetchObject();

    if($object) 
    {
        echo json_encode(["dados" => $object]);
    } else {
        echo json_encode(["dados" => 'Não existem dados a serem retornados']);
    }
}