<?php
    require_once 'config.php';
    require_once 'classes/Noticia.php';

	$n = new Noticia();

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $n->excluirNoticia($_GET['id']);
    }

header("Location: index.php");