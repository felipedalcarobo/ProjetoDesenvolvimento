<?php
include '../Bd/ItemBd.php';
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

$app->post('/criarItem', function (Request $request, Response $response) {
    $il = $request->getParam('id_lista');
    $in = $request->getParam('itemNome');
    $qt = $request->getParam('quantidade');
    $iua = $request->getParam('id_usuario_add');
    $listas = criarItemBd($il, $in, $qt, $iua);
    echo json_encode(utf8ize($listas));
});

$app->put('/atualizarItem', function (Request $request, Response $response) {
    $ii = $request->getParam('id_item');
    $in = $request->getParam('itemNome');
    $qt = $request->getParam('quantidade');
    $ic = $request->getParam('item_comprado');
    $listas = atualizarItemBd($ii, $in, $qt, $ic);
    echo json_encode(utf8ize($listas));
});


$app->delete('/excluirItem', function (Request $request, Response $response) {
    $ii = $request->getParam('id_item');
    $listas = excluirItemBd($ii);
    echo json_encode(utf8ize($listas));
});
//rode a aplicação Slim 
$app->run();