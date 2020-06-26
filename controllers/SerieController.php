<?php
require_once 'models/serie.php';
require_once 'models/capitulo.php';
class SerieController
{

    public function index()
    {
        $serie = new Serie();
        $series = $serie->obtenerRandom(6);
        require_once 'views/serie/destacados.php';
    }
    public function gestion()
    {
        Utils::isAdmin();
        $serie = new Serie();
        $series = $serie->obtenerTodas();
        require_once 'views/serie/gestion.php';
    }
    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/serie/crear.php';
    }
    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($titulo && $descripcion && $categoria) {
                $serie = new Serie();
                $serie->setNombre($titulo);
                $serie->setDescripcion($descripcion);
                $serie->setCategoria_id($categoria);

                //?Guardar la imagen
                if (isset($_FILES['imagen'])) {
                    $archivo = $_FILES['imagen'];
                    $fileName = $archivo['name'];
                    $type = $archivo['type'];
                    if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif") {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/' . $fileName);
                        $serie->setImagen($fileName);
                    }
                }
                //?Comprobacion para editar
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $serie->setId($id);
                    $save = $serie->edit();
                } else {
                    $save = $serie->save();
                }

                if ($save) {
                    $_SESSION['serie'] = "complete";
                } else {
                    $_SESSION['serie'] = "failed";
                }
            } else {
                $_SESSION['serie'] = "failed";
            }
        } else {
            $_SESSION['serie'] = "failed";
            header("Location:" . baseUrl . 'serie/gestion');
        }
        header("Location:" . baseUrl . 'serie/gestion');
    }
    public function editar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $serie = new Serie();
            $serie->setId($id);
            $ser = $serie->obtenerUno();
            require_once 'views/serie/crear.php';
        } else {
            header("Location:" . baseUrl . 'serie/gestion');
        }
    }
    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $serie = new Serie();
            $serie->setId($id);
            $delete = $serie->delete();
            if ($delete) {
                $_SESSION['delete'] = "complete";
            } else {
                $_SESSION['delete'] = "failed";
            }
        } else {
            $_SESSION['delete'] = "failed";
        }
        header("Location:" . baseUrl . 'serie/gestion');
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $serie = new Serie();
            $serie->setId($id);
            $ser = $serie->obtenerUno();
            $capitulo = new Capitulo();
            $capitulo->setId($id);
            $capitulos = $capitulo->obtenerCapitulos();
        }
        require_once 'views/serie/ver.php';
    }
    public function busqueda()
    {
        if (isset($_POST)) {
            $busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : false;
            if ($busqueda) {
                $buscar = new Serie();
                $buscar->setNombre($busqueda);
                $busquedas = $buscar->buscar();
                require_once 'views/serie/busqueda.php';
            } else {
                header("Location:".baseUrl);
            }
        }else{
            header("Location:".baseUrl); 
        }
    }
}
