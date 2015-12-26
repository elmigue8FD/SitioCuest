<?php
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);

//modificar
$referencia = $conexion->prepare("insert into temacuest (idMateria,Tema) value (?,?)");

//modificar
if(!$referencia->bind_param("is",$idMAteria,$TemaAInsertar)){print("Error en bind_param".$referencia->error."n");exit;
	}else{
	
	///modificar
	$idMAteria = $_POST['Materia'];
	$TemaAInsertar= $_POST['NombreTemaNueva'];
	$referencia->execute();
}
$conexion->close();

//modificar
echo '<script>	language="JavaScript">alert("Registro Exitoso"); window.location="../insertar/insertarTema.php"; 	</script>';
?>