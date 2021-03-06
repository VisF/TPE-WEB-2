<?php

require_once('libs/Smarty.class.php');
require_once('app/controllers/pageControllers.php');

class View{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    private function getActiveEmail(){
        if (!isset($_SESSION)){
			session_start();
		}
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $rol = $_SESSION['admin'];
        }
            
        else{
            $email = 'invitado';
            $rol = '0';
        }
        
        return array ($email, $rol);
        
        
    }
    public function mostrarHome($productos, $fabricante){
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('fabricantes', $fabricante);
        $this->smarty->assign('user', $this->getActiveEmail());
        
        $this->smarty->display('templates/productos.tpl');

    }
    public function mostrarProducto($productos, $fabricantes){ 
        $this->smarty->assign('producto',$productos);
        $this->smarty->assign('fabricantes',$fabricantes);
        $this->smarty->assign('user', $this->getActiveEmail());

        $this->smarty->display('templates/vermas.tpl');
    }
    public function mostrarPorFabricante($productos){
        $this->smarty->assign('producto',$productos);
        $this->smarty->assign('user', $this->getActiveEmail());
    }
    public function mostrarLogin($mensaje = '') {
        $this->smarty->assign('titulo','Inicie sesion');
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('user', $this->getActiveEmail());
        $this->smarty->display('templates/iniciosesion.tpl');

    }

    public function mostrarFabricante($fabricante){
        $this->smarty->assign('fabricantes',$fabricante);
        $this->smarty->assign('user', $this->getActiveEmail());

        $this->smarty->display('templates/fabricantes.tpl');
    }
    public function mostrarUnFabricante($fabricante, $productos){
        $this->smarty->assign('productos',$productos);
        $this->smarty->assign('fabricante',$fabricante);
        $this->smarty->assign('user', $this->getActiveEmail());

        $this->smarty->display('templates/fabricante.tpl');
    }
    public function errorEliminar(){
        $this->smarty->assign('user', $this->getActiveEmail());
        $this->smarty->display('templates/errorEliminar.tpl');
    }
    public function controlAdmin($usuarios, $mensaje){
        $this->smarty->assign('usuarios',$usuarios);
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->assign('user', $this->getActiveEmail());

        $this->smarty->display('templates/admin.tpl');   
    }
    public function formularioRegistro($mensaje){
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->assign('user', $this->getActiveEmail());

        $this->smarty->display('templates/form.tpl');   
    }

}