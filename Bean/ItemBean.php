<?php

class Item {
    
    public $id;
    public $nome;
    public $quantidade;
    public $lista;
    public $item_comprado;



    public function __construct($id, $nome, $quantidade, $item_comprado, $lista) {
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->lista = $lista;
        $this->item_comprado = $item_comprado;
    }

    public function getLista() {
        return $this->lista;
    }

    public function setLista($lista) {
        $this->lista = $lista;
    }

        public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


    
}