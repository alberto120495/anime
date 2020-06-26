<?php
class Serie
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $fecha;
    private $imagen;
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

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    //******************************METODOS********************************************* */
    public function obtenerTodas()
    {
        $series = $this->db->query("SELECT * FROM series ORDER BY id DESC");
        return $series;
    }

    public function obtenerRandom($limit){
        $series = $this->db->query("SELECT series.id, series.categoria_id, series.nombre, series.descripcion, series.imagen, categorias.nombre as 'titulo' FROM series INNER JOIN categorias where series.categoria_id = categorias.id ORDER BY RAND () LIMIT $limit");
        return $series;
    }
    public function obtenerPorCategoria(){
        $series = $this->db->query("SELECT series.*, categorias.nombre as 'titulo' FROM series INNER JOIN categorias on series.categoria_id = categorias.id WHERE series.categoria_id = '{$this->categoria_id}'");
        return $series;
    }

    public function obtenerUno()
    {
        $series = $this->db->query("SELECT * FROM series WHERE id = '{$this->getId()}'");
        return $series->fetch_object();
    }

    public function save()
	{
		//?Guardar la info del objeto en la bd
		$sql = "INSERT INTO series VALUES(NULL,'{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}',CURDATE(),'{$this->getImagen()}')";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
    }

    public function edit()
	{
		//?Guardar la info del objeto en la bd
		$sql = "UPDATE series SET nombre ='{$this->getNombre()}', descripcion ='{$this->getDescripcion()}', categoria_id ='{$this->getCategoria_id()}'";
        
        if($this->getImagen() != null){
        $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= "WHERE id = '{$this->getId()}';";
        
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
    }
    
    
    public function delete(){
        $sql = "DELETE FROM series WHERE id = '{$this->getId()}'";
        $delete = $this->db->query($sql);
        $result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
    }

    public function buscar(){
        $series = $this->db->query("SELECT * FROM series WHERE nombre LIKE '%{$this->getNombre()}%'");
        return $series;
    }
}
