<?php

class Noticia {
    public function retornarNoticias($filtrar, $offset, $limit) {
        try {
            global $pdo;

            $sql = "SELECT 
                noticias.id as id, 
                noticias.titulo as titulo,
                noticias.conteudo as conteudo,
                categorias.nome as nome_categoria
                FROM noticias 
                INNER JOIN categorias 
                ON categorias.id = noticias.categoria_id"
            ;
            
            if(!empty($filtrar)) {
                $sql .= " WHERE titulo LIKE ? ORDER BY id DESC LIMIT $offset, $limit";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(1, "%$filtrar%");
                $sql->execute();
            }else{
                $sql = $pdo->query($sql. " ORDER BY id DESC LIMIT $offset, $limit");
            }

            return $sql->fetchAll();

        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
            exit;
        }
    }

    /**
     * Retorna true em caso de sucesso.
     */
    public function adicionarNoticia($titulo, $categoria_id, $conteudo) {
        try {
            if(!empty($titulo) && !empty($categoria_id) && !empty($conteudo)){
                global $pdo;

                $sql = $pdo->prepare("INSERT INTO noticias SET titulo = :titulo, categoria_id = :categoria_id, conteudo = :conteudo");
                $sql->bindValue(":titulo", $titulo);
                $sql->bindValue(":categoria_id", $categoria_id);
                $sql->bindValue(":conteudo", $conteudo);
                $sql->execute();

                return true;
            }else{
                return false;
            }
            
        } catch(PDOException $e) {
            echo "Erro ao cadastrar notícia: ".$e->getMessage();
        }
    }

    public function retornarNoticia($id) {
		try {
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM noticias WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return $sql->fetch();
        }catch(PDOException $e) {
            echo "Erro ao buscar notícia: ".$e->getMessage();
            exit;
        }
    }
    
    public function editarNoticia($titulo, $categoria_id, $conteudo, $id) {
        try {
            if(!empty($titulo) && !empty($categoria_id) && !empty($conteudo) && !empty($id)){
                global $pdo;

                $sql = $pdo->prepare("UPDATE noticias SET titulo = :titulo, categoria_id = :categoria_id, 
                    conteudo = :conteudo WHERE id = :id")
                ;
                $sql->bindValue(":titulo", $titulo);
                $sql->bindValue(":categoria_id", $categoria_id);
                $sql->bindValue(":conteudo", $conteudo);
                $sql->bindValue(":id", $id);
                $sql->execute();

                return true;
            }else {
                return false;
            }
            
        } catch(PDOException $e) {
            echo "Erro ao cadastrar notícia: ".$e->getMessage();
            exit;
        }
    }

    public function excluirNoticia($id) {
        try {
            global $pdo;

            $sql = $pdo->prepare("DELETE FROM noticias WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } catch(PDOException $e) {
            echo "Erro ao deletar notícia: ".$e->getMessage();
            exit;
        }
    }

    public function totalNoticias($filtrar){
        global $pdo;

        $sql = "SELECT count(*) as total FROM noticias";


        if(!empty($filtrar)) {
            $sql .= " WHERE titulo LIKE ?";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(1, "%$filtrar%");
            $sql->execute();
        }else{
            $sql = $pdo->query($sql);
        }
        
        $sql = $sql->fetch();
        
        return $sql['total'];
    }
}