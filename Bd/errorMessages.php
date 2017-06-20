<?php

$array = array(
    -10 => "Item não pode ser inserido.",
    -20 => "Item não pode ser apagado.",
    -30 => "Usuario não encontrado ou não pode ser adicionado a lista."
);

function errorMessage($codigoErro) {
            return $array[$codigoErro];
}

