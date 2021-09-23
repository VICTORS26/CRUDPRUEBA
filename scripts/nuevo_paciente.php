<?php 
require 'funciones.php';

$nombre1=$_POST['txtnombre1'];
$nombre2=$_POST['txtnombre2'];
$apellido1=$_POST['txtapellido1'];
$apellido2=$_POST['txtapellido2'];
$numerodocumento=$_POST['txtdocumento'];
$tp=$_POST['cbxdocumento'];
$gn=$_POST['cbxgenero'];
$id_municipio=$_POST['cbx_municipio'];
conectar();

if ($tp=="Tarjeta de identidad") {
	$tipodocumento=1;
}else{
	$tipodocumento=2;
}
if ($gn=="Femenino") {
	$genero=1;
}else{
	$genero=2;
	
}

conectar();

mysqli_query($conexion,"INSERT INTO datospersonas (nombre1, nombre2, apellido1, apellido2, numerodocumento, tipodocumento, genero, id_municipio) VALUES ('".$nombre1."', '".$nombre2."', '".$apellido1."', '".$apellido2."', '".$numerodocumento."', '".$tipodocumento."', '".$genero."', '".$id_municipio."')");
header("location: ../admin/modificar.php");
?>