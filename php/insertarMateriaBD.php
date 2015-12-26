<?php
/*include 'conexion.php';*/
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
$referencia = $conexion->prepare("insert into materiacuest (Materia) value (?)");

if(!$referencia->bind_param("s",$materiaAInsertar)){print("Error en bind_param".$referencia->error."n");exit;
	}else{	
	$materiaAInsertar= $_POST['NombreMateriaNueva'];
	$referencia->execute();
	}
$conexion->close();
echo '<script>	language="JavaScript">alert("Registro Exitoso");
window.location="../insertar/insertarMateria.php"; 	</script>';
//header('Location: ../insertar/insertarMateria.php');
?>