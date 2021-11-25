<?php

require_once('model.php');
require_once('product.models.php');

class ComentarioModel extends Model {


    public function obtenerComentarios($id_producto) {
        
        $sql = "SELECT * FROM comentario 
                WHERE id_producto = ? ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_producto]);

        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }
    public function agregarComentario($contenido, $calificacion, $id_producto) {

        $sql = "INSERT INTO comentario (contenido, calificacion, id_producto)
                VALUES (?, ?, ?) ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$contenido, $calificacion, $id_producto]);

        return $stm;

    }
    public function eliminarComentario($id_comentario) {

        $sql = "DELETE FROM comentario 
                WHERE id_comentario = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_comentario]);

        return $stm;

    }

}

/*
$noticias = $this->_db->query("SELECT * FROM noticias ORDER BY id DESC LIMIT :inicio, :fin");
$noticias->bindValue(':inicio', 0, PDO::PARAM_INT);
$noticias->bindValue(':fin', 2, PDO::PARAM_INT);
return $noticias->fetchall(); 
*/