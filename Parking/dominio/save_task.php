<?php

include("db.php");

if (isset($_POST['save_task'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$documento = $_POST['documento'];
	$direccion = $_POST['direccion'];

	$query = "INSERT INTO persona(Nombre,Apellido,Telefono,num_documento, Direccion) VALUES ('$nombre','$apellido','$telefono','$documento','$direccion')";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query failed");
	}

	$_SESSION['message'] = "Datos guardados correctamente";
	$_SESSION['message_type'] = 'success';

	header("Location: index.php");
}

?>