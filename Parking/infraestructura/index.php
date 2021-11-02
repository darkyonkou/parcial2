<?php include("db.php") ?>
<?php include("include/header.php") ?>

<div class="container p-4">
	<h5>Datos de usuario</h5>
	<div class="row">
		<div class="col-md-4" style="background-color:#D1F2EB">

			<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
					<? = $_SESSION['message']?>
					 <strong>Solicitud ejecutada correctamente</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php session_unset(); } ?>

			<div class="card card-body" style="background-color:#A3E4D7">
				<form action="save_task.php" method="POST">
					<div class="form-group">
						<h6>Nombres</h6>
						<input type="text" name="nombre" class="form-control" placeholder="" required
						minlength="4" autofocus>
					</div>
					<div class="form-group">
						<h6>Apellidos</h6>
						<input type="text" name="apellido" class="form-control" placeholder="" required
						minlength="4" maxlength="10" autofocus>
					</div>
					<h6>Telefono</h6>
					<div class="form-group">
						<input type="number" name="telefono" class="form-control" placeholder="" required
						minlength="1" maxlength="" autofocus>
					</div>

					<h6>Numero de documento</h6>
					<div class="form-group">
					<input type="number" name="documento" class="form-control" placeholder="" required
						minlength="1" maxlength="" autofocus>	
					</div>
					
					<h6>Direccion</h6>
					<div class="form-group">
					<input type="text" name="direccion" class="form-control" placeholder="" required
						minlength="1" maxlength="" autofocus>	
					</div>
					<input type="submit" class="btn btn-success btn-block" name="save_task" value="Enviar">
				</form>
			</div>
			<center><br><input type="submit" class="btn btn-secondary btn-sm" name="continuar" value="Continuar"></center>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Telefono</th>
						<th>No. Documento</th>
						<th>Direccion</th>
						<th>Acciones</th>
					</tr>
				</thead >
				<tbody>
					<?php
					$query = "SELECT * FROM persona";
					$result_tasks = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_array($result_tasks)) { ?>
						<tr>
							<td><?php echo $row['Nombre'] ?></td>
							<td><?php echo $row['Apellido'] ?></td>
							<td><?php echo $row['Telefono'] ?></td>
							<td><?php echo $row['num_documento'] ?></td>
							<td><?php echo $row['Direccion'] ?></td>
							<td>
								<a href="edit.php?idPersona=<?php echo $row['idPersona']?>" class ="btn btn-primary">
									Edit
								</a>
								<a href="delete_task.php?idPersona=<?php echo $row['idPersona']?>" class ="btn btn-danger">
									Delete
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>

<?php include("include/footer.php") ?>



