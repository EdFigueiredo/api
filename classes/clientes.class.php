<?php

class Clientes
{
    public function listarTodos()
    {
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

    public function listarId($param)
    {
        var_dump("Parametro:" . $param);
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

    public function inserir()
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

    public function atualizar($param)
    {
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

    public function deletar()
    {
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
}