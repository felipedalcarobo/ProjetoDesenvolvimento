<?php

class Lista {

    public $id;
    public $nome;
    public $usuarioAdmin;
    public $usuarios = [];
    public $itens = [];

    public function __construct($id, $nome, $usuarioAdmin, $usuarios, $itens) {
        $this->id = $id;
        $this->nome = $nome;
        $this->usuarioAdmin = $usuarioAdmin;
        $this->usuarios = $usuarios;
        $this->itens = $itens;
    }
    
//    public function __construct($nome, $usuarioAdmin) {
//        $this->nome = $nome;
//        $this->usuarioAdmin = $usuarioAdmin;
//    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUsuarioAdmin() {
        return $this->usuarioAdmin;
    }

    public function getUsuarios() {
        return $this->usuarios;
    }

    public function getItens() {
        return $this->itens;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setUsuarioAdmin($usuarioAdmin) {
        $this->usuarioAdmin = $usuarioAdmin;
    }

    public function setUsuarios($usuarios) {
        $this->usuarios = $usuarios;
    }

    public function setItens($itens) {
        $this->itens = $itens;
    }



}