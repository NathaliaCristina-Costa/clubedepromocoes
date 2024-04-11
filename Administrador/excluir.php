<?php

    require_once 'Classes/Produtos.php';

    $p = new Produtos();

    if (isset($_GET['id'])) {
        $id = addslashes($_GET['id']);

        $p->excluir($id);

        header('location: produtos.php');
    }