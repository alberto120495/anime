<?php
require_once 'models/categoria.php';
require_once 'models/serie.php';

class categoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->conseguirAllCategorias();
        require_once 'views/categoria/index.php';
    }
    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    public function save()
    {
        Utils::isAdmin();
        //?Guardar la categoria en la bd
        if (isset($_POST)  && isset($_POST['nombre'])) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            if ($nombre) {
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $save = $categoria->save();
                if ($save) {
                    $_SESSION['categoria'] = "complete";
                } else {
                    $_SESSION['categoria'] = "failed";
                }
            } else {
                $_SESSION['categoria'] = "failed";
            }
        }
        header("Location:" . baseUrl . "/categoria/index");
    }
    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //?Conseguir Ctegoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->obtenerUno();

            //?Conseguir Serie
            $serie = new Serie();
            $serie->setCategoria_id($id);
            $series = $serie->obtenerPorCategoria();
        }
        require_once 'views/categoria/ver.php';
    }
}
