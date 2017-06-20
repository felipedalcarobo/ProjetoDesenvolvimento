<?php

require_once "ConfigBd.php";
include '../Bean/ListaBean.php';
include '../Bean/UsuarioBean.php';
include '../Bean/ItemBean.php';

$con = new PDO($CONFIG['DB']['STRING'], $CONFIG['DB']['USER'], $CONFIG['DB']['SENHA']);

function criarUsuario($nome, $email) {
    global $con;

    $sql = "INSERT INTO usuario (nome, email)VALUES ('" . $nome . "', '" . $email . "')";

    try {
        if ($con->query($sql)) {
            return $con->lastInsertId();
        } else {
            return -10;
        }
    } catch (PDOException $e) {
        return -10;
    }

    $con->close();
}

function buscarUsuario($usuario) {
    global $con;


    if (filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
        $us = $con->query("SELECT id_usuario, nome, email FROM usuario where email = '" . $usuario . "'");
    } else {
        $us = $con->query("SELECT id_usuario, nome, email FROM usuario where nome = '" . $usuario . "'");
    }


    while ($row = $us->fetch(PDO::FETCH_OBJ)) {
        $usuario = new Usuario($row->id_usuario, $row->nome, $row->email, "");
    }
    
    return $usuario;
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
