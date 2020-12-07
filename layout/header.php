<?php 
    require_once 'config.php'; 

    // redirecionar caso o usuario queira filtrar em uma pagina diferente da index.
    if(!empty($_GET['filtrar']) && !stripos($_SERVER['REQUEST_URI'],'index')){ 
        setcookie('filtrar', $_GET['filtrar'], time() + 2); // cookie com duração de 3 segundos
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Albert Teste</title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<script src='script.js'></script>
	</head>
	<body>  
    <header>
        <div class="header container">
            <div class="menu-logo">
                <a href="index.php">LOGO</a>	
            </div>
            <nav class="menu-nav">
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="cadastrar-noticia.php">cadastrar notícia</a></li>
                    <li><a href="cadastrar-categoria.php">cadastrar categoria</a></li>
                </ul>
                <form method="GET" class="menu-nav--buscar">
                    <input type="text" name="filtrar" id="busca"/>
                    <input type="submit" id="lupa" value="Buscar" />
                </form>
            </nav>
        </div>
    </header>
    <section>
