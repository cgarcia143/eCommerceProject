<?php 

class Debug
{
    public function __construct()
    {
        echo 'constructor' . '<br>';
    }

    public function defecto()
    {
        validarRol([1,3]);
        if (isset($_SESSION['usuario'])) {
            echo 'existe';               
        }else{
            
        }
    }
}