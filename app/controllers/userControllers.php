<?php

require_once('app/models/user.model.php');
require_once('app/views/View.php');


class UserController{
    private $userModel;
    private $View;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->View = new View();
    }
    public function logout() {
        if (!isset($_SESSION)){
			session_start();
		}
        session_destroy();
        header('Location: '.LOGIN);
    }
    public function showLogin($mensaje = '') {

        $this->View->mostrarLogin($mensaje);
    }
    private function verificaUsuarioPass($userMail, $userPass){

        $user = $this->userModel->getUsuario($userMail);

        if (!empty($user) && password_verify($userPass, $user->pass))
        {
            if (!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $user->id_usuario;
            $_SESSION['email'] = $user->email;
            $_SESSION['admin'] = $user->admin;
            return true;
        } else {
            return false;
        }
    }
    public function verificar() { //se llama desde el router
        $userMail = $_POST['email'];
        $userPass = $_POST['pass'];

        if ($this->verificaUsuarioPass($userMail, $userPass))
        {
            header('Location:'.HOME);
        } else 
        {
            $this->showLogin('Error de login');
        }

    }
    public function registrarUsuario(){
        if (!isset($_SESSION)){
            if(isset($_POST['email'])&&isset($_POST['pass'])){
                $userMail = $_POST['email'];
                $userPass = $_POST['pass'];
                if($userMail&&$userPass){
                    $id = $this->userModel->registrarUsuario($userMail, password_hash($userPass, PASSWORD_DEFAULT));
                    if($id){
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['email'] = $userMail;
                        $_SESSION['admin'] = false;
                        header('Location:'.HOME);
                    }
                    else{
                        $this->formularioRegistro('Usuario ya registrado');
                    }
                }
                else{
                    $this->formularioRegistro('Faltan datos obligatorios');
                }
            }
            else{
                $this->formularioRegistro('Faltan datos obligatorios');
            }
        }
    }
    public function formularioRegistro($mensaje = ''){

        $this->View->formularioRegistro($mensaje);
    }

    public function eliminarUsuario(){
        if (!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['admin']){
            $id_user = $_POST['id_user'];
            $verificar = $this->userModel->eliminarUsuario($id_user);
            if($verificar){
                $this->controlAdmin('Usuario eliminado');
            }
            else{
                $this->controlAdmin('Usuario no eliminado');
            }
        }
    }
    public function controlAdmin($mensaje = ''){
        if (!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['admin']){
            $usuarios = $this->userModel->obtenerListaUsuarios();

            $this->View->controlAdmin($usuarios, $mensaje);
        }
        else{
            header('Location:'.HOME);
        }
    }


    public function administrarRoles(){
        if (!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['admin']){
            $mail = $_POST['mail'];
            $this->userModel->cambiarPermiso($mail);
            header('Location:'.'admin');
        }
    }
}