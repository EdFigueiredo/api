<?php
// Este cabeçalho permite que vários domínios acessem a mesma API (com o caractere *)
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

$GLOBALS['secretJWT'] = '123456';

// Verificar se a URL acessada é apenas o diretório raiz
if ($_SERVER['REQUEST_URI'] === '/api/') {
    // Verificar se o usuário está autenticado
    if (!isset($_SESSION['usuario_autenticado'])) {
        // Usuário não está autenticado, redirecionar para a página de login
        header("Location: login.php");
        exit();
    } else {
        // Usuário está autenticado, redirecionar para a página inicial
        header("Location: pagina-inicial.php");
        exit();
    }
}
# Autoload
include_once "classes/autoload.class.php";
new Autoload();

# Rotas 
$rota = new Rotas();
$rota->add('POST', '/usuarios/login', 'Usuarios::login', false);
$rota->add('GET', '/clientes/listar', 'Clientes::listarTodos', true);
$rota->add('GET', '/clientes/listar/[PARAM]', 'Clientes::listarId', true);
$rota->add('POST', '/clientes/adiciona', 'Clientes::adiciona', true);
$rota->add('PUT', '/clientes/atualizar/[PARAM]', 'Clientes::atualizar', true);
$rota->add('DELETE', '/clientes/deletar/[PARAM]', 'Clientes::deletar', true);
$rota->ir($_GET['path']);



