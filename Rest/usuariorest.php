<?php

include '../Bd/UsuarioBd.php';
require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v){
            $d[$k] = utf8ize($v);
        }
    } else if (is_object($d)) {
        foreach ($d as $k => $v) {
            $d->$k = utf8ize($v);
        }
    } else {
        return utf8_encode($d);
    }
    return $d;
}

//instancie o objeto
$app = new \Slim\App();

//defina a rota
$app->get('/', function () {
    echo "Hello, World!";
});

$app->get('/buscarPreferencias/{usuario}', function (Request $request, Response $response) {
    $one = $request->getAttribute('usuario');
    $preferencias = buscarPreferencias($one);
    echo json_encode(utf8ize($preferencias));
});

$app->get('/buscarUsuario/{usuario}', function (Request $request, Response $response) {
    $one = $request->getAttribute('usuario');
    $usuario = buscarUsuario($one);
    echo json_encode(utf8ize($usuario));
});

$app->post('/criarUsuario', function (Request $request, Response $response) {
    $no = $request->getParam('nome');
    $em = $request->getParam('email');
    $usuario = criarUsuario($no, $em);
    echo json_encode(utf8ize($usuario));
});

//rode a aplicação Slim 
$app->run();
