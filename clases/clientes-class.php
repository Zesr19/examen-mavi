<?php
/**
* Clase de los clientes
**/

Class Clientes
{
	// Variables
	private $_nombre;
	private $_apellidop;
	private $_apellidom;
	private $_domicilio;
	private $_email;

	// Constructor para inicializar variables
	public function __construct($nombre, $apellidop, $apellidom, $domicilio, $email)
	{
		$this->_nombre = $nombre;
		$this->_apellidop = $apellidop;
		$this->_apellidom = $apellidom;
		$this->_domicilio = $domicilio;
		$this->_email = $email;
	}

	public function getNombre()
	{
		return $this->_nombre;
	}

	public function setNombre($nombre)
	{
		$this->_nombre = $nombre;
		return $this;
	}

	public function getApellidop()
	{
		return $this->_apellidop;
	}

	public function setApellidop($apellidop)
	{
		$this->_apellidop = $apellidop;
		return $this;
	}

	public function getApellidom()
	{
		return $this->_apellidom;
	}

	public function setApellidom($apellidom)
	{
		$this->_apellidom = $apellidom;
		return $this;
	}

	public function getDomicilio()
	{
		return $this->_domicilio;
	}

	public function setDomicilio($domicilio)
	{
		$this->_domicilio = $domicilio;
		return $this;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function setEmail($email)
	{
		$this->_email = $email;
		return $this;
	}

}
?>