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

}