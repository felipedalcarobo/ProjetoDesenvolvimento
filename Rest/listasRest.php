<?php

include '../Bd/ListaBd.php';
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

$app->get('/todos', function () {
    $listas = listarListaBd();
    echo json_encode(utf8ize($listas));
});

$app->get('/listasUsuario/{usuario}', function (Request $request, Response $response) {
    $one = $request->getAttribute('usuario');
    $listas = listasUsuarioBd($one);
    echo json_encode(utf8ize($listas));
});

$app->post('/criarLista', function (Request $request, Response $response) {
    
    $input = $request->getParsedBody();
    $listas = criarListaBd($input['id_usuario'], $input['nomeLista']);
    echo json_encode(utf8ize($listas));
});


//rode a aplicação Slim 
$app->run();
