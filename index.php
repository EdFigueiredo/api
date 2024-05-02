<?php
// Este cabeçalho permite que vários domínios acessem a mesma API (com o caractere *)
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");


if(isset($_GET['path'])) 
{
    $path = explode("/", $_GET['path']);
}else
{
    echo 'Nenhum caminho fornecido';
    exit;
}

if(isset($path[0])){ $api = $path[0]; }else { echo 'Caminho não existe'; exit; }
if(isset($path[1])){ $acao = $path[1]; }else { $acao = ''; }
if(isset($path[2])){ $param = $path[2]; }else { $param = ''; }


$method = $_SERVER['REQUEST_METHOD'];


$GLOBALS['secretJWT'] = '123456';

include_once "classes/db.class.php";
include_once "classes/jwt.class.php";
include_once "classes/usuarios.class.php";

include_once "api/usuarios/usuarios.php";
include_once "api/clientes/clientes.php";


