<?php
require_once 'models/usuario.php';
class usuarioController
{

    public function index()
    {
        echo "Controlador Usuario, Accion Index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
    //?Registro de Usuario
    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
            header("Location:" . baseUrl . 'usuario/registro');
        }
        header("Location:" . baseUrl . 'usuario/registro');
    }

    //?Login Usuario
    public function login()
    {
        if (isset($_POST)) {
            //?Identidicar al usuario
            //?Consulta a la bd para verificar credenciales
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();
            //?Crear una sesion
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['errorLogin'] = 'Identificacion fallida!';
            }
        }
        header("Location:" . baseUrl);
    }
    //?Cerrar sesion
    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            Utils::deleteSession('identity');
        }
        if (isset($_SESSION['admin'])) {
            Utils::deleteSession('admin');
        }
        header("Location:" . baseUrl);
    }
}
