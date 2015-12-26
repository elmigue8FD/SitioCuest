<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$materiaAModificar= $_POST['Materia'];
	$nuevoNombreMateria=$_POST['NombreMateriaModificar'];
	
	$sentenciaSql=$conexion->prepare("UPDATE materiacuest SET Materia=? WHERE id=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("si",$nuevoNombreMateria,$materiaAModificar)){print("Error en bind_param".$sentenciaSql->error."n");exit;}
	else{
	print("valor de : ".$materiaAModificar." materia nuevo: ".$nuevoNombreMateria."n");
	$sentenciaSql->execute();
	
	/*
	$sentenciaSql=$conexion->prepare("DELETE temacuest FROM temacuest WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare tema: ".$sentenciaSql->error."n");exit;}
	if(!$sentenciaSql->bind_param("i",$materiaAModifica)){print("Error en bind_param tema".$sentenciaSql->error."n");exit;}
	print("valor de : ".$materiaAModifica ." tema;  ");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE cuestionario FROM cuestionario WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare cuestionario: ".$sentenciaSql->error."n");exit;}
	if(!$sentenciaSql->bind_param("i",$materiaAModifica)){print("Error en bind_param cuestionario".$sentenciaSql->error."n");exit;}
	print("valor de : ".$materiaAModifica ." cuestionario");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE preguntas FROM preguntas WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare preguntas: ".$sentenciaSql->error."n");exit;}
	if(!$sentenciaSql->bind_param("i",$materiaAModifica)){print("Error en bind_param preguntas".$sentenciaSql->error."n");exit;}
	print("valor de : ".$materiaAModifica ." preguntas");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE respuesta FROM respuesta WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare respuesta: ".$sentenciaSql->error."n");exit;}
	if(!$sentenciaSql->bind_param("i",$materiaAModifica)){print("Error en bind_param respuesta".$sentenciaSql->error."n");exit;}
	print("valor de : ".$materiaAModifica ." respuesta");
	$sentenciaSql->execute();*/
	
	}
	}
	$conexion->close();

	echo '<script>	language="JavaScript">alert("Eliminacion Exitoso");	window.location="../Modificar/modificarMateria.php"; 	</script>';
?>