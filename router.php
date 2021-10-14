<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('HOME', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/home');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

require_once('app/controllers/pageControllers.php');
require_once('app/controllers/userControllers.php');

$pageControllers = new PageController();
$userControllers = new UserController();


if (!empty($_GET['action'])){
    $accion = $_GET['action'];
}
else {
    $accion = 'home';
}

$params = explode('/',$accion);

switch ($params[0]){
    case 'login':
        $userControllers->showLogin();
        break;   
    case 'verificar':
        $userControllers->verificar();
        break;    
    case 'logout':
        $userControllers->logout();
        break;               
    case 'home':
        $pageControllers->showHome();
        break;
    case 'productos':
        if(isset($params[1])){
            if(isset($params[2])){
                switch($params[2]){
                    case 'editar':
                        $pageControllers->editarProducto($params[1]);
                    break;
                    case 'borrar':
                        $pageControllers->eliminarProducto($params[1]);
                    break;
                }
            }
            else{
                $pageControllers->verUnoProducto($params[1]);
            }  
        }
        else{
            $pageControllers->showHome();
        }
        break;
        case 'fabricantes':
            if(isset($params[1])){
                if(isset($params[2])){
                    switch($params[2]){
                        case 'editar':
                            $pageControllers->editarFabricante($params[1]);
                        break;
                        case 'borrar':
                            $pageControllers->eliminarFabricante($params[1]);
                        break;
                    }
                }
                else{
                    $pageControllers->verUnoFabricante($params[1]);
                }  
            }
            else{
                $pageControllers->showFabricante();
            }
            break;
    case 'agregarProducto':
        $pageControllers->agregarProducto();
        break;
    case 'agregarFabricante':
        $pageControllers->agregarFabricante();
        break;
    default:
        echo('404 page not found');
        break;
}

