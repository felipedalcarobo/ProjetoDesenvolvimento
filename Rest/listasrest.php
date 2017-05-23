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

$app->get('/listasPesquisa/{lista}', function (Request $request, Response $response) {
    $one = $request->getAttribute('lista');
    $listas = listasPesquisaBd($one);
    echo json_encode(utf8ize($listas));
});

$app->post('/criarLista', function (Request $request, Response $response) {
    $iu = $request->getParam('id_usuario');
    $nl = $request->getParam('nomeLista');
    $listas = criarListaBd($iu, $nl);
    echo json_encode(utf8ize($listas));
});

$app->put('/atualizarLista', function (Request $request, Response $response) {
    $il = $request->getParam('id_lista');
    $nl = $request->getParam('nomeLista');
    $listas = atualizarListaBd($il, $nl);
    echo json_encode(utf8ize($listas));
});

$app->delete('/excluirLista', function (Request $request, Response $response) {
    $il = $request->getParam('id_lista');
    $listas = excluirListaBd($il);
    echo json_encode(utf8ize($listas));
});

//rode a aplicação Slim 
$app->run();
