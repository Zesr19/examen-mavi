<?php
// Clase de la configuración de la BD
Class Configuracion
{
	// Variables de la clase
	private $_serverName;
	private $_databaseName;
	private $_UID;
	private $_PWD;
	private $_dbType;

	// Constructor para inicializar las variables con los datos del archivo config.php
	public function __construct()
	{
		require "config.php";
		$this->_serverName = $serverName;
		$this->_databaseName = $databaseName;
		$this->_UID = $UID;
		$this->_PWD = $PWD;
		$this->_dbType = $dbType;
	}

	// Metodos
	public function getServerName(){
		return $this->_serverName;
	}

	public function getDataBaseName(){
		return $this->_databaseName;
	}

	public function getUID(){
		return $this->_UID;
	}

	public function getPWD(){
		return $this->_PWD;
	}

	public function getDbType(){
		return $this->_dbType;
	}
}
?>