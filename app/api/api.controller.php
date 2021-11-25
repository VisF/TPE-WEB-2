<?php

require_once('app/models/product.models.php');
require_once('app/models/fabricante.models.php');
require_once('app/models/comentarios.Model.php');
require_once('api.view.php');

class ApiController{
    private $comentarioModel;
    private $view;
    private $data;

    public function __construct(){
        $this->comentarioModel = new ComentarioModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function checkSession(){
        if (!isset($_SESSION)){
			session_start();
		}
        if (!isset($_SESSION['email'])) {
            $this->view->response('', 403);
            die;
        }
    }


    public function get_data() {
        return json_decode($this->data);
    }

    public function mostrarComentarios($params = ''){
        if(!empty($params)){
            $id_producto = $params[':ID_PRODUCTO'];
            $comentarios = $this->comentarioModel->obtenerComentarios($id_producto);
            if(!empty($comentarios)){
                $this->view->response($comentarios, 200);
            }
            else{
                $this->view->response($comentarios, 404);
            }
        }
        else{
            $this->view->response('', 404);
        }
    }
    public function agregarComentario($params = ''){
        $this->checkSession();
        if(!empty($params)){
            $id_producto = $params[':ID_PRODUCTO'];
            $comentario = $this->get_data();
            if(($comentario->contenido)&&($comentario->calificacion)){
                $verificar = $this->comentarioModel->agregarComentario($comentario->contenido, $comentario->calificacion, $id_producto);
                if($verificar){
                    $this->view->response($comentario, 200);
                }
                else{
                    $this->view->response('', 404);
                }
            }
            else{
                $this->view->response('', 404);
            }
        }
        else{
            $this->view->response('', 404);
        }
    }
    public function eliminarComentario($params = ''){
        $esAdmin = $this->isAdmin();
        if($esAdmin){
            if(!empty($params)){
                $id_comentario = $params[':ID_COMENTARIO'];

                $verificar =  $this->comentarioModel->eliminarComentario($id_comentario);
                if($verificar){
                    $this->view->response(TRUE, 200);
                }
                else{
                    $this->view->response('', 404);
                }
                
            }
            else{
                $this->view->response('', 404);
            }
        }
        else{
            $this->view->response('', 403);
        }
    }

    public function isAdmin(){
        $this->checkSession();
        return $_SESSION['admin'];
    }
}
