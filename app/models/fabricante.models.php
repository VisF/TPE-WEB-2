<?php

require_once('model.php');
require_once('product.models.php');

class FabricanteModel extends Model {
    private $productModel;

    public function __construct()
    {   
        parent::__construct();
        $this->productModel = new ProductModel();

    }

    public function getFabricante() {
        
        $sql = "SELECT * FROM fabricante";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $fabricantes = $stm->fetchAll(PDO::FETCH_OBJ);

        return $fabricantes;
    }

    public function getUnFabricante($id_fabricante) {
        
        $sql = "SELECT * FROM fabricante
                WHERE id_fabricante = ? ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_fabricante]);

        $fabricante = $stm->fetch(PDO::FETCH_OBJ);

        return $fabricante;
    }


    public function insertarFabricante($nombre, $pais) {

        $sql = "INSERT INTO fabricante (descripcion, pais)
                VALUES (?, ?) ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$nombre, $pais]);

        return $stm;

    }
    public function actualizarfabricante($id_fabricante, $nombre, $pais) {

        $sql = "UPDATE fabricante  
                SET descripcion = ?, pais = ? WHERE id_fabricante = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$nombre, $pais, $id_fabricante]);

        return $stm;

    }
    public function quitarfabricante($id_fabricante) {
        if($this->productModel->buscarPorFabricante($id_fabricante)){
            return false;
        }
        $sql = "DELETE FROM fabricante 
                WHERE id_fabricante = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_fabricante]);

        return $stm;
    }
}