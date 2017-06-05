<?php

class Item {
    
    public $id;
    public $nome;
    public $quantidade;
    public $lista;
    public $item_comprado;
    public $id_usuario_add;

    public function __construct($id, $nome, $quantidade, $item_comprado, $lista, $id_usuario_add) {
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->lista = $lista;
        $this->item_comprado = $item_comprado;
        $this->id_usuario_add = $id_usuario_add;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLista() {
        return $this->lista;
    }

    public function setLista($lista) {
        $this->lista = $lista;
    }
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getIdUsuarioAdd() {
        return $this->id_usuario_add;
    }

    public function setIdUsuarioAdd($id_usuario_add) {
        $this->id_usuario_add = $id_usuario_add;
    }
    
    public function getItemComprado() {
        return $this->item_comprado;
    }

    public function setItemComprado($item_comprado) {
        $this->item_comprado = $item_comprado;
    }
}