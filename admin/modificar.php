<?php 
require '../scripts/funciones.php';
if (!sesioniniciada()) {
	header("location: ../index.html");
}
conectar();
$pacientes=getpacientes();
desconectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>registro de pacientes</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>
<body>
	<?php require "nav.php" ?>
	<div class="card-body">
		<a href="ingresar_pacientes.php" class="btn btn-sm btn-primary float-right">Nuevo paciente</a>
		<table class="table table-striped table-hover">
			<thead class="thead-dark">
				<tr>
					<th>Departamento</th>
					<th>Municipio</th>
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Genero</th>



				</tr>
			</thead>
			<tbody>
				<?php foreach ($pacientes as $paciente):?>
					
					<th> <?php echo $paciente[2] ?> </th> 
					<th> <?php echo $paciente[3] ?> 
					<th> <?php echo $paciente[4]."  ".$paciente[5]?>   </th>
					<th> <?php echo $paciente[6]."  ".$paciente[7]."  ".$paciente[8] ?> </th>
					<th> <?php echo $paciente[10] ?> </th>
					<th><a href="editarpacientes.php?id_datos=<?php echo $paciente[1]?>" class="btn btn-sm btn btn-success">editar</a></th>
					<th><a href="../scripts/eliminar_pacientes.php?id_datos=<?php echo $paciente[1]?>" class="btn btn-sm btn btn-danger">eliminar</a></th>




				</tr>
			<?php endforeach ?>


		</tbody>
	</table>


</div>


</body>
</html>