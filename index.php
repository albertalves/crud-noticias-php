<?php
session_start();
	require_once 'layout/header.php';
	require_once 'classes/Noticia.php';

	$n = new Noticia();

	$cookieFiltrar  = $_COOKIE['filtrar'] ?? null;
	$filtrar 		= $_GET['filtrar'] ?? null;
	$filtrar 		=   $cookieFiltrar  ?? $filtrar;
	
	// itens por pagina
	$limit = 6; 
	// pagina atual
	$paginaAtual = !empty($_GET['p']) ? intval($_GET['p']) : 1; 
	//a partir de qual item começará a listagem
	$offset = ($paginaAtual * $limit) - $limit;
	//qntd de paginas necessarias para a paginação
	$qtdNoticias = $n->totalNoticias($filtrar);
	// quantidade de páginas
	$qtdPaginas = ceil($qtdNoticias/$limit);


	$noticias = $n->retornarNoticias($filtrar, $offset, $limit);
?>

<div class="container">
    <?php foreach ($noticias as $noticia) : ?>
        <div class="noticias--box">
            <h1><?php echo $noticia['titulo']; ?></h1>
            <p><?php echo $noticia['conteudo']; ?></p>
			<h3>Categoria: <?php echo $noticia['nome_categoria']; ?></h3>
			
			<a type="submit" class="btn btn--noticias" 
				href="editar-noticia.php?id=<?php echo $noticia['id']; ?>">
				Acessar
			</a>
        </div>
	<?php endforeach; ?>
</div>
<div class="container">
	<!---------- PAGINAÇÃO -------->
	<?php if($qtdPaginas > 1):?>
		<div class="conteiner_paginacao">
			<!-- Redireciona para a primeira página -->
			<a class="paginacao simbolo" href="index.php?p=1"><</a>

			<?php for($q=1; $q<=$qtdPaginas; $q++):?>
				<?php if($paginaAtual == $q):?>
					<a class="paginacao active" href="index.php?p=<?php echo $q;?>"><?php echo $q;?></a>
				<?php else:?>
					<a class="paginacao" href="index.php?p=<?php echo $q;?>"><?php echo $q;?></a>
				<?php endif; ?>
			<?php endfor ?>

			<!-- Redireciona para a última página -->
			<a class="paginacao simbolo" href="index.php?p=<?php echo $qtdPaginas;?>">></a>
		</div>
	<?php endif ?>
	<!---------- PAGINAÇÃO -------->
</div>

<?php require_once 'layout/footer.php'; ?>