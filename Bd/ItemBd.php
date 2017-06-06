<?php

require_once "ConfigBd.php";
include '../Bean/ListaBean.php';
include '../Bean/UsuarioBean.php';
include '../Bean/ItemBean.php';

$con = new PDO($CONFIG['DB']['STRING'], $CONFIG['DB']['USER'], $CONFIG['DB']['SENHA']);


function itensListaBd($id_lista) {
    global $con;

    $rs = $con->query("SELECT id_item, nome, quantidade, item_comprado, id_lista, id_usuario_add FROM item WHERE id_lista = " . $id_lista);

    $itens = array();

    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $item = new Item($row->id_item, $row->nome, $row->quantidade, $row->item_comprado, null, $row->id_usuario_add);

        array_push($itens, $item);
    }

    return $itens;
}

function criarItemBd($id_lista, $itemNome, $quantidade, $idUsuarioAdd) {
    global $con;
    
        $sql = "INSERT INTO item (id_lista, nome, quantidade, id_usuario_add) VALUES (".$id_lista.", '".$itemNome."', ".$quantidade.", ".$idUsuarioAdd.")";

        if ($con->query($sql)) {
            return $con->lastInsertId();
        } else {
            return "FALHOU";
        }
   $con->close();
}

function atualizarItemBd($idItem, $itemNome, $quantidade, $itemComprado) {
    global $con;
    
    $sql = "UPDATE item set nome = '".$itemNome."', quantidade = ".$quantidade;

    if(isset($itemComprado)) {
        $sql .= ", item_comprado = " . $itemComprado;
    }

    $sql .= " where id_item = " . $idItem;

    if ($con->query($sql)) {
        return $sql;
    } else {
        return $sql;
    }
   $con->close();
}

function excluirItemBd($idItem) {
    global $con;
    
    $sql = "delete from item where id_item = ". $idItem;

    if ($con->query($sql)) {
        return $sql;
    } else {
        return "FALHOU";
    }
   $con->close();
}