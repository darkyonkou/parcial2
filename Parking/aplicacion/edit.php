<?php

include("db.php");

if (isset($_GET['idPersona'])) {
	$idPersona = $_GET['idPersona'];
	$query = "SELECT * FROM persona WHERE idPersona = $idPersona";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$nombre = $row['Nombre']; 
		$apellido = $row['Apellido']; 
		$telefono = $row['Telefono']; 
		$documento = $row['num_documento']; 
		$direccion = $row['Direccion']; 
	}	
}

if (isset($_POST['update'])) {
	$idPersona = $_GET['idPersona'];
	$nombre = $_POST['nombre']; 
	$apellido = $_POST['apellido']; 
	$telefono = $_POST['telefono']; 
	$documento = $_POST['documento']; 
	$direccion = $_POST['direccion'];

	$query = "UPDATE persona set Nombre ='$nombre', Apellido ='$apellido', Telefono = '$telefono', num_documento = '$documento', Direccion = '$direccion' WHERE idPersona = $idPersona";

	mysqli_query($conn, $query);

	header("Location: index.php");

}

?>

<?php include("include/header.php") ?>

<center><br><h5>Actualizar datos de usuario</h5></center>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="edit.php?idPersona=<?php echo $_GET['idPersona']; ?>" method = "POST">
					<div class="form-group">
						<input type="text" name="nombre" value="<?php echo $nombre; ?>">
					</div>
					<div class="form-group">
						<input type="text" name="apellido" value="<?php echo $apellido; ?>">
					</div>
					<div class="form-group">
						<input type="number" name="telefono" value="<?php echo $telefono; ?>">
					</div>
					<div class="form-group">
						<input type="number" name="documento" value="<?php echo $documento; ?>">
					</div>
					<div class="form-group">
						<input type="text" name="direccion" value="<?php echo $direccion; ?>">
					</div>
					<button class="btn btn-success" name="update" >
						Actualizar
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include ("include/footer.php") ?>
