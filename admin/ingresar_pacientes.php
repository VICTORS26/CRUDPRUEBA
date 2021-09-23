<?php 

require '../scripts/funciones.php';

if (!sesioniniciada()) {
	header("location: ../index.html");
}

conectar();
$resultado=getdepartamento();

desconectar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>paciente nuevo</title>
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
	<?php require 'nav.php'; ?>
	
	<div class="card-body">
		<form action="../scripts/nuevo_paciente.php" method="post" class="contact-form">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Nombre1 </label>
						<input type="text" name="txtnombre1"  class="form-control" />
					</div>
					<div class="col-md-6">
						<label>Nombre2</label>
						<input type="text" name="txtnombre2"  class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Apellido1 </label>
						<input type="text" name="txtapellido1"  class="form-control" />
					</div>
					<div class="col-md-6">
						<label>Apellido2</label>
						<input type="text" name="txtapellido2"  class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label>Numero de documento</label>
						<input type="text" name="txtdocumento"  class="form-control" />
					</div>
					<div class="col-md-4">
						<label>Tipo de documento</label>
						<select name="cbxdocumento" id="cbxdocumento" class="form-control">

							<option value="1">Tarjeta de identidad <option/>
								<option value="2">Cedula <option/>
									

									</select>
								</div>
								<div class="col-md-4">
									<label>Genero</label>
									<select name="cbxgenero" id="cbxgenero" class="form-control">

										<option value="1">Femenino  <option/>
											<option value="2">Masculino  <option/>

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
												<option value="0">seleccionar departamento</option>
												<?php foreach ($resultado as $fila):?>
													<option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div>Municipio 
											<select class="form-control" name="cbx_municipio" id="cbx_municipio">
												<option>seleccionar municipio</option>
											</select>
										</div>
									</div>
								</div>
							</div><br/>
							<div class="container">
								<input type="submit" class="btn btn-primary navbar-brand nav-link " name="boton" value="Guardar">
							</div>
							



							<!---->

						</form>

					</div>
				</body>
				</html>