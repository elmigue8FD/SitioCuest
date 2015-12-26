<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$sentenciaSql=$conexion->prepare("DELETE materiacuest FROM materiacuest WHERE id=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$materiaAEliminar)){print("Error en bind_param".$sentenciaSql->error."n");exit;
	}else{
	$materiaAEliminar= $_POST['MateriaAEliminar'];
	print("valor de : ".$materiaAEliminar." materia;   ");
	$sentenciaSql->execute();
	
	
	$sentenciaSql=$conexion->prepare("DELETE temacuest FROM temacuest WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare tema: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$materiaAEliminar)){print("Error en bind_param tema".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$materiaAEliminar ." tema;  ");
	$sentenciaSql->execute();
	
	
	$sentenciaSql=$conexion->prepare("DELETE cuestionario FROM cuestionario WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare cuestionario: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$materiaAEliminar)){print("Error en bind_param cuestionario".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$materiaAEliminar ." cuestionario");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE preguntas FROM preguntas WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare preguntas: ".$sentenciaSql->error."n");exit;}
	else{
	if(!$sentenciaSql->bind_param("i",$materiaAEliminar)){print("Error en bind_param preguntas".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$materiaAEliminar ." preguntas");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE respuesta FROM respuesta WHERE idMateria=?");
	if(!$sentenciaSql){print("Error en prepare respuesta: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$materiaAEliminar)){print("Error en bind_param respuesta".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$materiaAEliminar ." respuesta");
	$sentenciaSql->execute();
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	
	
	$conexion->close();

	echo '<script>	language="JavaScript">alert("Eliminacion Exitoso");	window.location="../Eliminar/eliminarMateria.php"; 	</script>';
?>