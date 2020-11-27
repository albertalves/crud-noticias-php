<?php
    require_once  'layout/header.php';
    require_once  'classes/Categoria.php';

    $c = new Categoria();

    $categoria = null;
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $categoria = $c->adicionarCategoria($nome);
    }
?>

    <div class="container">
        <div class="form--cadastrar">
            <h1>Cadastro de Categorias</h1>
            <form method="POST" name="cadastrar">
                <input type="text" name="nome" placeholder="Nome da categoria" class="input--titulo"/>
         
                <div class="botoes">
                    <a type="submit" class="btn btn-default" href="index.php">Voltar</a>
                    <a class="btn btn-success ml-10" href='javascript:cadastrar.submit()'>Cadastrar</a>
                </div>
            </form>
            <?php if ($categoria): ?>
            <div class="container alerta sucesso">
                Categoria cadastrada com sucesso!
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