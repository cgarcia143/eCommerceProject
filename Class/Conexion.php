<?php

class Conexion
{
    
    private $user = 'root';
    private $password = 'Azpgl/w5q34vlNum';
    private $path = "mysql:host="."localhost".";dbname="."sigeprop"."";
    private $conexion = null;
    private $stmt;
    private $error;


    public function __construct()
    {

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {

            $this->conexion = new PDO(
                $this->path,
                $this->user,
                $this->password,
                $options
            );

            $this->conexion->exec('set names utf8');

        } catch (PDOException $e) {

            $this->error = $e->getMessage();
            echo $this->error;

        }

    }

    public function query($sql)
    {
        $this->stmt = $this->conexion->prepare($sql);
    }

    public function bind($parameter, $value, $type = null)
    {

        if (is_null($type)) {

            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }

        }
        $this->stmt->bindValue($parameter,$value,$type);
    }

    // ejecuta la sentencia
    public function execute()
    {
        return $this->stmt->execute();
    }

    // retorna todos los registros
    public function getLogs()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // retorna un unico registro
    public function getRegistration(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // retorna cantidad de filas
    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }
}