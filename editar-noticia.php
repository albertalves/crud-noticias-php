<?php
    require_once  'layout/header.php';
    require_once  'classes/Categoria.php';
    require_once  'classes/Noticia.php';


    $noticia_id = $_GET['id'];
    if(!isset($noticia_id)) {
        ?><script type="text/javascript">window.location.href="index.php";</script><?php
        exit;
    }

    $c = new Categoria();
    $n = new Noticia();

    $categoria = null;
    if(isset($_POST['titulo']) && isset($_POST['categoria']) && isset($_POST['conteudo'])){
        $titulo         = addslashes($_POST['titulo']);
        $categoria_id   = addslashes($_POST['categoria']);
        $conteudo       = addslashes($_POST['conteudo']);
        $categoria      = $n->editarNoticia($titulo, $categoria_id, $conteudo, $noticia_id);
    }

    $dpdCategorias  = $c->retornarCategorias();
    $noticia        = $n->retornarNoticia($noticia_id);
?>

    <div class="container">
        <div class="form--cadastrar">
            <h1>Cadastro de Notícias</h1>
            <form method="POST" name="editar">
                <input type="text" name="titulo" placeholder="Titulo da noticia" 
                    class="input--titulo" value="<?php echo $noticia['titulo']?>"/>
                <select name="categoria" class="select--categoria">
                    <?php foreach ($dpdCategorias as $item): ?>
                        <option value="<?php echo $item['id']?>"
                            <?php echo ($item['id'] == $noticia['categoria_id'])?'selected="selected"':''; ?>
                        ><?php echo $item['nome'] ?></option>
                    <?php endforeach ?>
                </select>
                <textarea name="conteudo" placeholder="Conteúdo da notícia" 
                    class="textarea--conteudo"><?php echo $noticia['conteudo']?></textarea>
                <div class="botoes">
                    <a type="submit" class="btn btn-danger mr-10" 
                        href="excluir-noticia.php?id=<?php echo $noticia['id']; ?>">Excluir</a>
                    <a type="submit" class="btn btn-default" href="index.php">Voltar</a>
                    <a class="btn btn-success ml-10" href='javascript:editar.submit()' ">Atualizar</a>
                </div>
            </form>
            <?php if ($categoria): ?>
            <div class="container alerta sucesso">
                Produto atualizado com sucesso!
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