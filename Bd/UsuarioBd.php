<?php

require_once "ConfigBd.php";
include '../Bean/ListaBean.php';
include '../Bean/UsuarioBean.php';
include '../Bean/ItemBean.php';

$con = new PDO($CONFIG['DB']['STRING'], $CONFIG['DB']['USER'], $CONFIG['DB']['SENHA']);

function criarUsuario($nome, $email) {
    global $con;

    $sql = "INSERT INTO usuario (nome, email)VALUES ('" . $nome . "', '" . $email . "')";

    if ($con->query($sql) === TRUE) {
        return $sql;
    } else {
        return $sql;
    }
    $con->close();
}

function buscarUsuario() {
    global $con;
    $rs = $con->query("SELECT idpessoa, nome, email FROM pessoa");
}

function buscarPreferencias($usuario) {
    global $con;
    $preferencias = array();

    $pre = $con->query("SELECT nome_produto FROM preferencia WHERE id_usuario = " . $usuario . " ORDER BY relevancia desc limit 10");
    while ($row3 = $pre->fetch(PDO::FETCH_OBJ)) {
        array_push($preferencias, $row3->nome_produto);
    }
    
    return $preferencias;
}
