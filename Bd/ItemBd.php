<?php

require_once "configBd.php";
include '../Bean/ListaBean.php';
include '../Bean/UsuarioBean.php';
include '../Bean/ItemBean.php';

$con = new PDO($CONFIG['DB']['STRING'], $CONFIG['DB']['USER'], $CONFIG['DB']['SENHA']);



function criarItemBd($id_lista, $itemNome, $quantidade, $idUsuarioAdd) {
    global $con;
    
        $sql = "INSERT INTO item (id_lista, nome, quantidade, id_usuario_add)VALUES (".$id_lista.", '".$itemNome."', ".$quantidade.", ".$idUsuarioAdd.")";

        if ($con->query($sql) === TRUE) {
            return $sql;
        } else {
            return $sql;
        }
   $con->close();
}

function atualizarItemBd($idItem, $itemNome, $quantidade, $itemComprado) {
    global $con;
    
        $sql = "UPDATE item set nome = '".$itemNome."', quantidade = ".$quantidade.", item_comprado= ".$itemComprado." where id_item = ".idItem;

        if ($con->query($sql) === TRUE) {
            return $sql;
        } else {
            return $sql;
        }
   $con->close();
}

function excluirItemBd($idItem) {
    global $con;
    
        $sql = "delete from item where id_item = ".idItem;

        if ($con->query($sql) === TRUE) {
            return $sql;
        } else {
            return $sql;
        }
   $con->close();
}