<?php

include("db.php");

if (isset($_GET['idPersona'])) {
	$idPersona = $_GET['idPersona'];
	$query = "DELETE  FROM persona WHERE idPersona = $idPersona";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query failed");
	}

	$_SESSION['message'] = "Datos guardados correctamente";
	$_SESSION['message_type'] = 'danger';


	header("Location: index.php");
}

?>