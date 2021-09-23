<?php 

$conexion =null;
function conectar()
{
	global $conexion;
	$conexion=mysqli_connect("localhost","root","","pacientes3");
	//mysqli_set_charset($conexion,"utf8");
}

function validarlogin($usuario,$clave)
{
	global $conexion;
	$respuesta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario ='".$usuario."' AND clave ='".$clave."'");
	if ($fila=mysqli_fetch_row($respuesta)) {
		session_start();
		$_SESSION['usuario']=$usuario;
		return true;
	}
	return false;

}
function sesioniniciada()
{
	session_start();
	return isset($_SESSION['usuario']);
}
function getpacientes()
{
	global $conexion;
	$respuesta=mysqli_query($conexion,"SELECT mun.id_departamento,dper.id_datos,dep.nombredepartamento,mun.nombremunicipio,doc.tipodocumento,dper.numerodocumento,dper.nombre1,dper.nombre2,dper.apellido1,dper.apellido2,gen.genero FROM departamentos AS dep
INNER JOIN municipios AS mun
ON(mun.id_departamento=dep.id_departamento)
INNER JOIN datospersonas AS dper
ON(mun.id_municipio=dper.id_municipio)
INNER JOIN generos AS gen
ON(dper.genero=gen.id_genero)
INNER JOIN documentos AS doc
ON(dper.tipodocumento=doc.id_documento)WHERE dper.usuario<>1");
	return $respuesta->fetch_all();
}
function getpacientesporid($id_datos)
{
	global $conexion;
	$respuesta=mysqli_query($conexion,"SELECT mun.id_departamento,dper.id_datos,dep.nombredepartamento,mun.nombremunicipio,doc.tipodocumento,dper.numerodocumento,dper.nombre1,dper.nombre2,dper.apellido1,dper.apellido2,gen.genero FROM departamentos AS dep
INNER JOIN municipios AS mun
ON(mun.id_departamento=dep.id_departamento)
INNER JOIN datospersonas AS dper
ON(mun.id_municipio=dper.id_municipio)
INNER JOIN generos AS gen
ON(dper.genero=gen.id_genero)
INNER JOIN documentos AS doc
ON(dper.tipodocumento=doc.id_documento)WHERE dper.id_datos =".$id_datos."");
	return mysqli_fetch_row($respuesta);
}
function getdepartamento()
{
	global $conexion;
	$respuesta=mysqli_query($conexion,"SELECT id_departamento,nombredepartamento FROM departamentos ORDER BY nombredepartamento");
return $respuesta->fetch_all();
	
}

// function actualizarusuario($id_datos,$nombre1,$nombre2,$apellido1,$apellido2,$numerodocumento,$tipodocumento,$genero,$id_municipio)
// {
// 	global $conexion;
// 	mysql_query($conexion,"UPDATE datospersonas SET id_datos=".$id_datos.", nombre1='".$nombre1."',nombre2='".$nombre2."',apellido1='".$apellido1."',apellido2='".$apellido2."',numerodocumento=".$numerodocumento.",
// tipodocumento=".$tipodocumento.",genero=".$genero.",id_municipio=".$id_municipio." WHERE id_datos=".$id_datos." ");
// }
function desconectar()
{
	global $conexion;
	mysqli_close($conexion);
}

 ?>