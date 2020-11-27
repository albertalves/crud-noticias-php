<?php

class Categoria {
    public function retornarCategorias() {
        global $pdo;

        $sql = "SELECT * FROM categorias";
        $sql = $pdo->query($sql);

        return $sql->fetchAll();
    }

    public function adicionarCategoria($nome){
        try {
            if(!empty($nome)){
                global $pdo;

                $sql = $pdo->prepare("INSERT INTO categorias SET nome = :nome");
                $sql->bindValue(":nome", $nome);
                $sql->execute();

                return true;
            }else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Erro ao cadastrar categoria: ".$e->getMessage();
        }
    }
}