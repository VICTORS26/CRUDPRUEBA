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
echo $id_datos[0] ;
//$conexion=mysqli_connect("localhost","root","","pacientes");
mysqli_query($conexion,"DELETE FROM datospersonas WHERE id_datos=".$id_datos."");
header("location: ../admin/modificar.php");
 ?>