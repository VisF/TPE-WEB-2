<?php


require_once('model.php');


class ProductModel extends Model{
    

    public function getProducto() {
        
        $sql = "SELECT * FROM producto JOIN fabricante ON producto.id_fabricante = fabricante.id_fabricante";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $productos = $stm->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
    public function getUnProducto($id_producto) {
        
        $sql = "SELECT * FROM producto JOIN fabricante ON producto.id_fabricante = fabricante.id_fabricante
                WHERE id_producto = ? ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_producto]);

        $productos = $stm->fetch(PDO::FETCH_OBJ);

        return $productos;
    }


    public function insertarProducto($descripcion, $precio, $id_fabricante) {

        $sql = "INSERT INTO producto (nombre, precio, id_fabricante)
                VALUES (?, ?, ?) ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$descripcion, $precio, $id_fabricante]);

        return $stm;

    }
    public function buscarPorFabricante($id_fabricante) {

        $sql = "SELECT * FROM producto 
                WHERE id_fabricante = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_fabricante]);

        $productos = $stm->fetchAll(PDO::FETCH_OBJ);

        return $productos;

    }
    public function actualizarProducto($id_producto, $descripcion, $precio, $id_fabricante) {

        $sql = "UPDATE producto 
                SET nombre = ?, precio = ?, id_fabricante = ? WHERE id_producto = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$descripcion, $precio, $id_producto, $id_fabricante]);

        return $stm;

    }
    public function quitarProducto($id_producto) {

        $sql = "DELETE FROM producto 
                WHERE id_producto = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_producto]);

        return $stm;

    }
}
