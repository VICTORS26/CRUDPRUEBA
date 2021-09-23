<?php 

require '../scripts/funciones.php';

if (!sesioniniciada()) {
	header("location: ../index.html");
}
if (isset($_GET['id_datos'])) {
	$id_datos=$_GET['id_datos'];
}else{
	header("location: indexi.php");
}
conectar();
$resultado=getdepartamento();
$pacientes=getpacientesporid($id_datos);
desconectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>pacente nuevo</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

	<script language="javascript">
		$(document).ready(function(){
			$("#cbx_departamento").change(function () {

				

				$("#cbx_departamento option:selected").each(function () {
					id_departamento = $(this).val();
					$.post("includes/getMunicipio.php", { id_departamento: id_departamento }, function(data){
						$("#cbx_municipio").html(data);
					});            
				});
			})
		});

	</script>

</script>
</head>
<body>
<?php echo $id_datos?>
	<?php echo "se recibe $id_datos" ?>
	<?php require 'nav.php'; ?>
	<?php  ?>
	<div class="card-body">
		<form action="../scripts/editar_paciente.php" method="post" class="contact-form">
			<input type="hidden"  value="<?php echo $id_datos?>" name="id_datos"><br>
			<div class="form-group">
				<div class="row">

					<div class="col-md-6">

						<label>Nombre1 </label>
						<input type="text" name="txtnombre1"  class="form-control" value="<?php echo $pacientes[6] ?>"  />
					</div>
					<div class="col-md-6">
						<label>Nombre2</label>
						<input type="text" name="txtnombre2"  class="form-control" value="<?php echo $pacientes[7] ?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Apellido1 </label>
						<input type="text" name="txtapellido1"  class="form-control" value="<?php echo $pacientes[8] ?>" />
					</div>
					<div class="col-md-6">
						<label>Apellido2</label>
						<input type="text" name="txtapellido2"  class="form-control" value="<?php echo $pacientes[9] ?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Telefono </label>
						<input type="text" name="txtTelefono"  class="form-control" value="<?php echo $pacientes[8] ?>" />
					</div>
					<div class="col-md-6">
						<label>Email</label>
						<input type="text" name="txtEmail"  class="form-control" value="<?php echo $pacientes[9] ?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Direccion </label>
						<input type="text" name="txtDireccion"  class="form-control" value="<?php echo $pacientes[8] ?>" />
					</div>
				</div>
            </div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label>Numero de documento</label>
						<input type="text" name="txtdocumento"  class="form-control" value="<?php echo $pacientes[5] ?>" />
					</div>
					<div class="col-md-4">
						<label>Tipo de documento</label>
						<select name="cbxdocumento" id="cbxdocumento"  class="form-control">
							 <option value="0"><?php echo $pacientes[4] ?></option> 
							<option value="T.I">T.I <option/>
								<option value="C.C">C.C <option/>
									

								</select>
							</div>
							<div class="col-md-4">
								<label>Genero</label>
								<select name="cbxgenero" id="cbxgenero" class="form-control">
									<option value="0"><?php echo $pacientes[10] ?></option>
									<option value="Femenino">Femenino  <option/>
										<option value="Masculino">Masculino  <option/>

										</select>
									</div>
								</div>

							</div>
							<!---->


							<!--COMBOBOX-->
							<div class="row">
								<div class="col-md-6">
									<div>Departamento 
										<select class="form-control" name="cbx_departamento" id="cbx_departamento">
											<option value="0"><?php echo $pacientes[2] ?></option>
											<?php foreach ($resultado as $fila):?>
												<option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div>Municipio 
										<select class="form-control" name="cbx_municipio" id="cbx_municipio">
											<option><?php echo $pacientes[3] ?></option>
										</select>
									</div>
								</div>
							</div>
						</div><br/>
						<div class="container">
							<input type="submit" class="btn btn-primary navbar-brand nav-link " name="boton" value="Guardar cambios">
						</div>




						<!---->

					</form>

				</div>
			</body>
			</html>