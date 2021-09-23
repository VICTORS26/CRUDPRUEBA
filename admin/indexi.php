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
      
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Genero</th>
                    
                    

                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente):?>
                    <tr>
                        <th> <?php echo $paciente[2] ?> </th>

                        <th> <?php echo $paciente[3] ?> </th>
                        <th> <?php echo $paciente[4]."  ".$paciente[5]?>   </th>
                        <th> <?php echo $paciente[6]."  ".$paciente[7]."  ".$paciente[8] ?> </th>
                        <th> <?php echo $paciente[10] ?> </th>
                        
                        



                    </tr>
                <?php endforeach ?>

                
            </tbody>
        </table>

        <a class="btn btn-primary" href="modificar.php">Administrar pacientes</a>
    </div>
    

</body>
</html>