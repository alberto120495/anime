<?php
class Capitulo
{
	private $id;
	private $nombre;
	private $capitulo;
	private $opcion1;
	private $opcion2;
	private $id_rel;
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
		$this->nombre = $nombre;
	}

	public function getCapitulo()
	{
		return $this->capitulo;
	}

	public function setCapitulo($capitulo)
	{
		$this->capitulo = $capitulo;
	}

	public function getOpcion1()
	{
		return $this->opcion1;
	}

	public function setOpcion1($opcion1)
	{
		$this->opcion1 = $opcion1;
	}

	public function getOpcion2()
	{
		return $this->opcion2;
	}

	public function setOpcion2($opcion2)
	{
		$this->opcion2 = $opcion2;
	}

	public function getId_rel()
	{
		return $this->id_rel;
	}

	public function setId_rel($id_rel)
	{
		$this->id_rel = $id_rel;
	}
	//******************************METODOS********************************************* */
	public function obtenerCapitulos()
	{
		$capitulos = $this->db->query("SELECT *, capitulos.nombre from series INNER join capitulos on capitulos.id_rel = series.id_cap Where series.id = '{$this->getId()}' ");
		return $capitulos;
	}

	public function verCapitulo()
	{

		$capitulo = $this->db->query("SELECT * FROM capitulos WHERE id_rel='{$this->getId_rel()}' AND capitulo='{$this->getCapitulo()}' ");
		return $capitulo->fetch_object();
	}

	public function numCapitulos(){
		$numCapitulos = $this->db->query("SELECT COUNT(capitulo) as 'total' FROM capitulos where id_rel = '{$this->getId_rel()}' ");
		return $numCapitulos->fetch_object();
	}

}
