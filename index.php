<?php
// Este cabeçalho permite que vários domínios acessem a mesma API (com o caractere *)
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

$GLOBALS['secretJWT'] = '123456';

# Autoload
include_once "classes/autoload.class.php";
new Autoload();

# Rotas 
$rota = new Rotas();
$rota->add('POST', '/usuarios/login', 'Usuarios::login', false);
$rota->add('GET', '/clientes/listar', 'Clientes::listarTodos', true);
$rota->add('GET', '/clientes/listar/[PARAM]', 'Clientes::listarId', true);
$rota->add('PUT', '/clientes/atualizar/[PARAM]', 'Clientes::atualizar', true);
$rota->ir($_GET['path']);



