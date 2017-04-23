<?php

require_once "config.php";

$con = new PDO($CONFIG['DB']['STRING'],$CONFIG['DB']['USER'],$CONFIG['DB']['SENHA']);

function salvar() {
	$stmt = $con->prepare("INSERT INTO item(nome, email) VALUES(?,?)");
	$v1 = "Pedro";
	$stmt->bindParam(1, $v1);
	$v2 = "email@email.com";
	$stmt->bindParam(2, $v2);
	$stmt->execute();
}

function listar() {
	global $con;
	$rs = $con->query("SELECT iditem, nome, email FROM item");
	
	while($row = $rs->fetch(PDO::FETCH_OBJ)) {
		echo $row->idpessoa."<br/>";
		echo $row->nome."<br/>";
		echo $row->email."<br/>";
	}
}

listar();