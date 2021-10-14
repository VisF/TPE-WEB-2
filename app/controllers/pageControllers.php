<?php

//todos nombrados en el router


require_once('app/models/fabricante.models.php');
require_once('app/models/product.models.php');
require_once('app/views/View.php');

class PageController {
    private $productModel;
    private $fabricanteModel;
    private $View;
    private $userModel;
    
    public function __construct(){
        $this->productModel = new ProductModel();
        $this->fabricanteModel = new FabricanteModel();
        $this->View = new View();
        $this->userModel = new UserModel();
        
    }

    private function checkSession(){
        if (!isset($_SESSION)){
			session_start();
		}
        if (!isset($_SESSION['email'])) {
            header('Location:'.LOGIN);
        }
    }
    public function showHome(){

        $productos = $this->productModel->getProducto();
        $fabricante = $this->fabricanteModel->getFabricante();

        $this->View->mostrarHome($productos, $fabricante);
    }

    
    public function showFabricante(){

        $fabricante = $this->fabricanteModel->getFabricante();

        $this->View->mostrarFabricante($fabricante);
    }


    public function verUnoFabricante($id_fabricante){

        $fabricante = $this->fabricanteModel->getUnFabricante($id_fabricante);
        $productos = $this->productModel->buscarPorFabricante($id_fabricante);

        $this->View->mostrarUnFabricante($fabricante, $productos);
    }


    public function verUnoProducto($id_producto){

        $productos = $this->productModel->getUnProducto($id_producto);
        $fabricante = $this->fabricanteModel->getFabricante();

        $this->View->mostrarProducto($productos, $fabricante);
    }

    public function verPorFabricante($id_fabricante){

        $productos = $this->productModel->buscarPorFabricante($id_fabricante);

        $this->View->mostrarPorFabricante($productos);
    }

    public function agregarProducto(){
        $this->checkSession();

        $descripcion = $_POST['nombre'];
        $precio = $_POST['precio'];
        $fabricante = $_POST['fabricante'];

        $this->productModel->insertarProducto($descripcion,$precio,$fabricante);

        header('Location: '.BASE_URL);
    }
    public function editarProducto($id_producto){
        $this->checkSession();

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $id_fabricante = $_POST['fabricante'];

        $this->productModel->actualizarProducto($id_producto, $nombre, $precio, $id_fabricante);
        
        header('Location: '.BASE_URL);
    }
    public function eliminarProducto($id_producto){
        $this->checkSession();

        
        $this->productModel->quitarProducto($id_producto);
        
        header('Location: '.BASE_URL);
    }
    public function agregarFabricante(){
        $this->checkSession();
        
        $descripcion = $_POST['descripcion'];
        $pais = $_POST['pais'];

        $this->fabricanteModel->insertarFabricante($descripcion, $pais);

        header('Location: '.BASE_URL. 'fabricantes');
    }
    public function editarFabricante($id_fabricante){
        $this->checkSession();

        $descripcion = $_POST['descripcion'];
        $pais = $_POST['pais'];

        $this->fabricanteModel->actualizarFabricante($id_fabricante, $descripcion, $pais);
        
        header('Location: '.BASE_URL. 'fabricantes');
    }
    public function eliminarFabricante($id_fabricante){
        $this->checkSession();

        $verificar = $this->fabricanteModel->quitarFabricante($id_fabricante);
        
        if($verificar){
            header('Location: '.BASE_URL. 'fabricantes');
        }
        else{
            $this->View->errorEliminar();
        }
       
    }
    


}