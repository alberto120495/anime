<?php
class Categoria
{
    private $id;
    private $nombre;
	private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    //******************************METODOS****************************************************** */
    public function conseguirAllCategorias(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC");
        return $categorias;
    }
    public function obtenerUno(){
        $categorias = $this->db->query("SELECT * FROM categorias WHERE id = '{$this->getId()}'");
        return $categorias->fetch_object();
    }

    public function save(){
        //?Guardar la info del objeto en la bd
		$sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
    }
}
