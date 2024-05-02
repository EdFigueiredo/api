<?php

if($acao == '' && $param == '') { echo json_encode(['Erro' => 'Caminho não encontrado']); die;}

if($acao == 'login' && $param == '')
{
    Usuarios::login($_POST['login'],$_POST['senha']);
    exit;
}