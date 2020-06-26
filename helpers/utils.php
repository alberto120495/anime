<?php
class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    //?Es Administrador
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".baseUrl);
        }else{
            return true;
        }
    }

    //?Ver categorias
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->conseguirAllCategorias();
        return $categorias;
    }
}