<?php
	require('conector.php');
	$con = new conectorBD();

	$response['conexion'] = $con->initConexion($con->database);
	if ($response['conexion'] == 'OK'){
		$conexion = $con->getConexion();
		$insert = $conexion->prepare('INSERT INTO usuarios (email, nombre, password , fecha_nacimiento) VALUES (?,?,?,?)');
		$insert->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);

		$d_password = "1234";

		$email = "user1@mail.com";
		$nombre = "user1";
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = "1977-01-01";

		$insert->execute();

		$email = 'user2@mail.com';
		$nombre = 'user2';
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = '1977-01-01';

		$insert->execute();

		$email = 'user3@mail.com';
		$nombre = 'user3';
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = '1977-01-01';

		$insert->execute();

		$response['resultado'] = "1";
		$response['msg']= 'Informacion de inicio de sesion:';
		$getUsers = $con->consultar(['usuarios'],['*'],$condicion = "");
		while ($fila= $getUsers->fetch_assoc()) {
			$response['msg'].=$fila['email'];
		}
		$response['msg'].= 'password: '.$d_password;
		}else{
			$response['resultado'] == "0";
			$response['msg'] = 'Error conectando a la base de datos';
		}

		echo json_encode($response);

 ?>
