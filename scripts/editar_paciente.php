<?php 
require 'funciones.php';
// if (isset($_GET['id_datos'])) {
// 	$id_datos=$_GET['id_datos'];
// }else{
// 	header("location: ../admin/indexi.php");
// }
$id_datos=$_POST['id_datos'];
$nombre1=$_POST['txtnombre1'];
$nombre2=$_POST['txtnombre2'];
$apellido1=$_POST['txtapellido1'];
$apellido2=$_POST['txtapellido2'];
$numerodocumento=$_POST['txtdocumento'];
$tp=$_POST['cbxdocumento'];
$gn=$_POST['cbxgenero'];
$id_municipio=$_POST['cbx_municipio'];
conectar();

if ($tp=="T.I") {
	$tipodocumento=3;
}else{
	$tipodocumento=2;
}
if ($gn=="Femenino") {
	$genero=1;
}else{
	$genero=2;
	
}

conectar();
mysqli_query($conexion,"UPDATE datospersonas set nombre1='".$nombre1."',nombre2='".$nombre2."',apellido1='".$apellido1."',apellido2='".$apellido2."',numerodocumento=".$numerodocumento.",tipodocumento=".$tipodocumento.",genero=".$genero.",id_municipio=".$id_municipio." WHERE id_datos=".$id_datos." ");

// 	mysqli_query($conexion,"UPDATE datospersonas SET  nombre1='".$nombre1."'
// 		,nombre2='".$nombre2."',apellido1='".$apellido1."',apellido2='".$apellido2."',numerodocumento=".$numerodocumento.",
// tipodocumento=".$tipodocumento.",genero=".$genero.",id_municipio=".$id_municipio." WHERE id_datos=".$id_datos." ");
// actualizarusuario($id_datos,$nombre1,$nombre2,$apellido1,$apellido2,$numerodocumento,$tipodocumento,$genero,$id_municipio);


// mysqli_query($conexion,"UPDATE datospersonas SET nombre='".$nombre."', apellido='".$apellido."', numerodocumento=".$numerodocumento.", tipodocumento='".$tipodocumento."', genero='".$genero."', id_municipio=".$id_municipio." WHERE  id_datos=".$id."");
header("location: ../admin/modificar.php");
?>