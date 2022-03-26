<?php
// Aquí manejaremos las peticiones del cliente

require '../clases/conexion-class.php';
require '../clases/clientes-class.php';
require 'headers.php';

$pdo = new Conexion();

switch ($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		if (isset($_POST['name']) && isset($_POST['apellidoP']) && isset($_POST['domicilio']) && isset($_POST['correo']))
		{
			
			$cliente = new Clientes($_POST['name'], $_POST['apellidoP'], $_POST['apellidoM'], $_POST['domicilio'], $_POST['correo']);

			// code para insertar un registro de la clase Clientes
			$sql = "INSERT INTO clientes (nombre, apellidop, apellidom, domicilio, email) VALUES (:nombre, :apellidop, :apellidom, :domicilio, :email)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':nombre', $cliente->getNombre());
			$stmt->bindValue(':apellidop', $cliente->getApellidop());
			$stmt->bindValue(':apellidom', $cliente->getApellidom());
			$stmt->bindValue(':domicilio', $cliente->getDomicilio());
			$stmt->bindValue(':email', $cliente->getEmail());
			
			if($stmt->execute()) echo "El cliente se ha registrado exitosamente!";
			else echo "Hubo un error al registrar cliente.";
		}
		
			/*
			// Validar que vengan datos del formulario
			if (isset($_POST['name']) && isset($_POST['apellidoP']) && isset($_POST['domicilio']) && isset($_POST['correo']))
			{
				
				$cliente = new Clientes($_POST['name'], $_POST['apellidoP'], $_POST['apellidoM'], $_POST['domicilio'], $_POST['correo']);
			}*/
		break;
	case 'GET':
		// Para consultar cliente/s

		if (isset($_GET['Id']))
		{
			$sql = $pdo->prepare("SELECT * FROM clientes WHERE id_cliente=:id");
			$sql->bindValue(':id', $_GET['Id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode($sql->fetchAll());
		}
		else
		{
			$sql = $pdo->prepare("SELECT * FROM clientes");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode($sql->fetchAll());
		}
		
		break;
	case 'PUT':
		// No supe como obterner el json enviado desde la vista

		//parse_str(file_get_contents("data://multipart/form-data,"), $put_vars);
		
		//$params = array('http' => array('method' => 'PUT', 'header' => 'Content-Type: multipart/form-data;'));
		//$ctx = stream_context_create($params);
		$data = json_decode(file_get_contents('php://input'), true);
		echo $data->nombre;

		/*
		$cliente = new Clientes($_POST['name'], $_POST['apellidoP'], $_POST['apellidoM'], $_POST['domicilio'], $_POST['correo']);
		// code para actualizar un registro de la clase Clientes
		$sql = "UPDATE clientes SET nombre=:nombre, apellidop=:apellidop, apellidom=:apellidom, domicilio=:domicilio, email=:email WHERE id_cliente=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nombre', $cliente->getNombre());
		$stmt->bindValue(':apellidop', $cliente->getApellidop());
		$stmt->bindValue(':apellidom', $cliente->getApellidom());
		$stmt->bindValue(':domicilio', $cliente->getDomicilio());
		$stmt->bindValue(':email', $cliente->getEmail());
		$stmt->bindValue(':id', $_POST['Id']);
				
		if($stmt->execute()) echo "El cliente se ha actualizado exitosamente!";
		else echo "Hubo un error al actualizar cliente.";
		*/
		break;
	case 'DELETE':
		// code...
		break;
	default:
		// code...
		break;
}
?>