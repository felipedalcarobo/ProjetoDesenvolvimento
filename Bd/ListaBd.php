<?php

require_once "configBd.php";
include '../Bean/ListaBean.php';
include '../Bean/UsuarioBean.php';
include '../Bean/ItemBean.php';

$con = new PDO($CONFIG['DB']['STRING'], $CONFIG['DB']['USER'], $CONFIG['DB']['SENHA']);

function salvar() {
    $stmt = $con->prepare("INSERT INTO pessoa(nome, email) VALUES(?,?)");
    $v1 = "Pedro";
    $stmt->bindParam(1, $v1);
    $v2 = "email@email.com";
    $stmt->bindParam(2, $v2);
    $stmt->execute();
}

function listarListaBd() {
    global $con;
    $rs = $con->query("SELECT id_lista, nome, id_admin_lista FROM lista");

    $listas = array();

    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        
        $lista = new Lista($row->id_lista, $row->nome,NULL, [],[]);
        
        $ua = $con->query("SELECT id_usuario, nome, email FROM usuario WHERE id_usuario = " . $row->id_admin_lista);
        while ($row1 = $ua->fetch(PDO::FETCH_OBJ)){
            $usuario = new Usuario($row1->id_usuario, $row1->nome, $row1->email, "");
            $lista->usuarioAdmin = $usuario;
        }
        
        $ia = $con->query("SELECT id_item, nome, quantidade FROM item WHERE id_lista = " . $row->id_lista);
        while ($row2 = $ia->fetch(PDO::FETCH_OBJ)){
            $item = new Item($row2->id_item, $row2->nome, $row2->quantidade, null);
            $lista->itens[] = $item;
        }
        
        $us = $con->query("SELECT u.id_usuario idusuario, nome, email FROM usuario u, rul WHERE u.id_usuario = rul.id_usuario and rul.id_lista =" . $row->id_lista);
        while ($row3 = $us->fetch(PDO::FETCH_OBJ)){
            $usuario = new Usuario($row3->idusuario, $row3->nome, $row3->email, "");
            $lista->usuario[] = $usuario;
        }
        
        array_push($listas, $lista);
        
    }
    
    return $listas;
}

function listasUsuarioBd($usuarioLogado) {
    global $con;
    $rs = $con->query("SELECT id_lista, nome, id_admin_lista FROM lista where id_admin_lista = ".$usuarioLogado);

    $listas = array();

    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        
        $lista = new Lista($row->id_lista, $row->nome,NULL, [],[]);
        
        $ua = $con->query("SELECT id_usuario, nome, email FROM usuario WHERE id_usuario = " . $row->id_admin_lista);
        while ($row1 = $ua->fetch(PDO::FETCH_OBJ)){
            $usuario = new Usuario($row1->id_usuario, $row1->nome, $row1->email, "");
            $lista->usuarioAdmin = $usuario;
        }
        
        $ia = $con->query("SELECT id_item, nome, quantidade FROM item WHERE id_lista = " . $row->id_lista);
        while ($row2 = $ia->fetch(PDO::FETCH_OBJ)){
            $item = new Item($row2->id_item, $row2->nome, $row2->quantidade, null);
            $lista->itens[] = $item;
        }
        
        $us = $con->query("SELECT u.id_usuario idusuario, nome, email FROM usuario u, rul WHERE u.id_usuario = rul.id_usuario and rul.id_lista =" . $row->id_lista);
        while ($row3 = $us->fetch(PDO::FETCH_OBJ)){
            $usuario = new Usuario($row3->idusuario, $row3->nome, $row3->email, "");
            $lista->usuario[] = $usuario;
        }
        
        array_push($listas, $lista);
        
    }
    
    return $listas;
}


function criarListaBd($usuarioLogado, $nomeLista) {
    global $con;
    
        $sql = "INSERT INTO lista (nome, id_admin_lista)
                VALUES (".$nomeLista.", ".$usuarioLogado.")";
        
        

        if ($conn->query($sql) === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    
}