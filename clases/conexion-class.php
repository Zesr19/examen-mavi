<?php
// Clase de la conexión a la BD

// Se incluye la clase configuracion
require "config-class.php";

Class Conexion extends PDO
{
	// Variables de la configuracion a usar
	private $serverName;
	private $databaseName;
	private $UID;
	private $PWD;
	private $dbType;

	public function __construct()
	{
		$this->setConfiguracion();
		$this->conectar();
	}

	private function setConfiguracion()
	{
		$conf = new Configuracion();
		$this->serverName = $conf->getServerName();
		$this->databaseName = $conf->getDataBaseName();
		$this->UID = $conf->getUID();
		$this->PWD = $conf->getPWD();
		$this->dbType = $conf->getDbType();
	}

	private function conectar()
	{
		if ($this->dbType == "mysql") {
			try {
				parent::__construct('mysql:host='.$this->serverName.';dbname='.$this->databaseName.';charset=UTF8', $this->UID, $this->PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch (PDOException $e) {
				echo "Error: ".$e->getMessage();
				exit;
			}
		} else {
			// Por si se usa otro gestor de bd, SQL Server ejemplo
			echo "No es una conexión MySQL";
		}
	}
}
?>