<?php 

require '../../Scripts/funciones.php';
	conectar();
	
	$id_departamento = $_POST['id_departamento'];
	
	// $queryM = "SELECT id_municipio,nombremunicipio FROM municipios WHERE id_departamento=".$id_departamento." ORDER BY nombremunicipio";
	// $resultadoM = $conexion->query($queryM);

	$resultadoM=mysqli_query($conexion,"SELECT id_municipio,nombremunicipio FROM municipios WHERE id_departamento=".$id_departamento." ORDER BY nombremunicipio");
	
	

	foreach ($resultadoM as $fila) {
		$html.= "<option value='".$fila['id_municipio']."'>".$fila['nombremunicipio']."</option>";
	}
	
	// while($rowM = $resultadoM->fetch_assoc())
	// {
	// 	$html.= "<option value='".$rowM['id_municipio']."'>".$rowM['nombremunicipio']."</option>";
	// }
	
	echo $html;
	desconectar();
?>