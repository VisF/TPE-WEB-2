<?php

require_once('model.php');

class UserModel extends Model {
    
    public function getUsuario($email) {
        
        $sql = "SELECT * FROM usuario WHERE email = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$email]);

        $usuario = $stm->fetchAll(PDO::FETCH_OBJ);

        if (count($usuario) > 0) {
            return $usuario[0];    
        }
        
        return null;
    }
    public function registrarUsuario($email, $pass){

        $verificar = $this->getUsuario($email);
        if(!$verificar){
            $sql = "INSERT INTO usuario (`email`, `pass`, `admin`)
                VALUES (?, ?, ?)";

            $stm = $this->pdo->prepare($sql);

            $stm->execute([$email, $pass, '0']);

            return $this->pdo->lastInsertId();
        }
        else{
            return null;
        }
        
    }   
    public function eliminarUsuario($id){
        $sql = "DELETE FROM usuario WHERE id_usuario = ? ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id]);

        return $stm;
    }

    public function obtenerListaUsuarios(){
        $sql = "SELECT * FROM usuario";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $usuario = $stm->fetchAll(PDO::FETCH_OBJ);

        return $usuario;
    }

    public function cambiarPermiso($mail){
        $usuario = $this->getUsuario($mail);

        if($usuario->admin){
            $esAdmin = false;
        }
        else{
            $esAdmin = true;
        }
        $sql = "UPDATE usuario SET admin = ? WHERE email = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$esAdmin, $mail]);


    }
}


