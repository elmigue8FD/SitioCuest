<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$sentenciaSql=$conexion->prepare("DELETE cuestionario FROM cuestionario WHERE id=?");
	//("DELETE * FROM temacuest,cuestionario WHERE temacuest.id=cuestionario.idTema AND temacuest.id=?");
	 if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");exit;
	 }else{
		if(!$sentenciaSql->bind_param("i",$CuestionarioAEliminar)){	print("Error en bind_param".$sentenciaSql->error."n");exit;
		}else{
			$CuestionarioAEliminar= $_POST['CuestionarioAEliminar'];
			//print("Valor de temaAEliminar: ".$CuestionarioAEliminar."cuestionario;  ");
			$sentenciaSql->execute();
			
			$sentenciaSql=$conexion->prepare("DELETE preguntas FROM preguntas WHERE idCuestionario=?");
			if(!$sentenciaSql){print("Error en prepare preguntas: ".$sentenciaSql->error."n");exit;
			}else{
			if(!$sentenciaSql->bind_param("i",$CuestionarioAEliminar)){print("Error en bind_param preguntas".$sentenciaSql->error."n");exit;}
			//print("valor de : ".$CuestionarioAEliminar ." preguntas");
			$sentenciaSql->execute();
			
			$sentenciaSql=$conexion->prepare("DELETE respuesta FROM respuesta WHERE idCuestionario=?");
			if(!$sentenciaSql){print("Error en prepare respuesta: ".$sentenciaSql->error."n");exit;}
			if(!$sentenciaSql->bind_param("i",$CuestionarioAEliminar)){print("Error en bind_param respuesta".$sentenciaSql->error."n");exit;}
			//print("valor de : ".$CuestionarioAEliminar ." respuesta");
			$sentenciaSql->execute();
			}
		}
	 }
	$conexion->close();

	echo '<script>	language="JavaScript">alert("Registro Exitoso");
	window.location="../Eliminar/eliminarCuestionario.php"; 	</script>';
?>