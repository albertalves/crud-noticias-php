<?php
    require_once  'layout/header.php';
    require_once  'classes/Categoria.php';
    require_once  'classes/Noticia.php';

    $c = new Categoria();
    $n = new Noticia();

    $dpdCategorias = $c->retornarCategorias();

    $categoria      = null;
    if(isset($_POST['titulo']) && isset($_POST['categoria']) && isset($_POST['conteudo']) ){

        $titulo         = addslashes($_POST['titulo']);
        $categoria_id   = addslashes($_POST['categoria']);
        $conteudo       = addslashes($_POST['conteudo']);
        $categoria      = $n->adicionarNoticia($titulo, $categoria_id, $conteudo);
    }
?>

    <div class="container">
        <div class="form--cadastrar">
            <h1>Cadastro de Notícias</h1>
            <form method="POST" name="cadastrar">
                <input type="text" name="titulo" placeholder="Titulo da noticia" class="input--titulo"/>
                <select name="categoria" class="select--categoria">
                    <option>Selecione uma categoria</option>
                    <?php foreach ($dpdCategorias as $item): ?>
                        <option value="<?php echo $item['id']?>">
                            <?php echo $item['nome'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <textarea name="conteudo" placeholder="Conteúdo da notícia" class="textarea--conteudo"></textarea>
                <div class="botoes">
                    <a type="submit" class="btn btn-default" href="index.php">Voltar</a>
                    <a class="btn btn-success ml-10" href='javascript:cadastrar.submit()'>Cadastrar</a>
                </div>
            </form>
            <?php if ($categoria): ?>
            <div class="container alerta sucesso">
                Produto cadastrado com sucesso!
            </div> 
            <?php endif; ?>
            <?php if (!is_null($categoria) && !$categoria): ?>
                <div class="container alerta erro">
                    Preencha todos os campos!
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php require_once  'layout/footer.php'; ?>