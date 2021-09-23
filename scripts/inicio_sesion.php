<?php 

require 'funciones.php';
$usuario=$_POST['txtusuario'];
$clave=$_POST['txtclave'];
conectar();
if (validarlogin($usuario,$clave)) {
	header("location: ../admin/indexi.php");
}else{
	?>
<script>
	alert("usuario o clave incorrectos")
	location.href="../index.html";
</script>

<?php 
desconectar();
}

 ?>