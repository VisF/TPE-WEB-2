<?php

require_once('app/models/config.php');

class Model {
    
    protected $pdo;

    public function __construct()
    {
        $this->conectar();
    }

    /**
     * Conecta a la base de datos
     */
    private function conectar() {
        global $parametros;

        $host = $parametros['host'];
        $port = $parametros['port'];;
        $db = $parametros['db'];
        $user = $parametros['user'];
        $password = $parametros['password'];

        $dsn = "mysql:host=$host:$port;dbname=$db;charset=UTF8";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
 
}


