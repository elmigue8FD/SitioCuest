<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	$sentenciaSql=$conexion->prepare("DELETE temacuest FROM temacuest WHERE id=?");
	//("DELETE * FROM temacuest,cuestionario WHERE temacuest.id=cuestionario.idTema AND temacuest.id=?");
	 if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");exit;
	 }else{
	if(!$sentenciaSql->bind_param("i",$temaAEliminar)){	print("Error en bind_param".$sentenciaSql->error."n");exit;
	}else{
	$temaAEliminar= $_POST['TemaAEliminar'];
	print("Valor de temaAEliminar: ".$temaAEliminar."TEMA;   ");
	$sentenciaSql->execute();
	
	
	$sentenciaSql=$conexion->prepare("DELETE cuestionario FROM cuestionario WHERE idTema=?");
	 if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");exit;
	 }else{
	if(!$sentenciaSql->bind_param("i",$temaAEliminar)){	print("Error en bind_param".$sentenciaSql->error."n");exit;}
	else{
	print("Valor de temaAEliminar: ".$temaAEliminar."cuestionario;  ");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE preguntas FROM preguntas WHERE idTema=?");
	if(!$sentenciaSql){print("Error en prepare preguntas: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$temaAEliminar)){print("Error en bind_param preguntas".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$temaAEliminar ." preguntas");
	$sentenciaSql->execute();
	
	$sentenciaSql=$conexion->prepare("DELETE respuesta FROM respuesta WHERE idTema=?");
	if(!$sentenciaSql){print("Error en prepare respuesta: ".$sentenciaSql->error."n");exit;
	}else{
	if(!$sentenciaSql->bind_param("i",$temaAEliminar)){print("Error en bind_param respuesta".$sentenciaSql->error."n");exit;
	}else{
	print("valor de : ".$temaAEliminar ." respuesta");
	$sentenciaSql->execute();
	}
	}
	}
	}
	}
	}
	}
	}
	
	$conexion->close();

	echo '<script>	language="JavaScript">alert("Registro Exitoso");
	window.location="../Eliminar/eliminarTema.php"; 	</script>';
	
?>