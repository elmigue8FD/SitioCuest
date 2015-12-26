<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$PregRestAEliminar=$_POST['PreRestAElim'];
	
	foreach($PregRestAEliminar as $idPregunta){
		$sentenciaSql=$conexion->prepare("DELETE preguntas FROM preguntas WHERE id=?");
		if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");exit;
		}else{
		if(!$sentenciaSql->bind_param("i",$idPregunta)){	print("Error en bind_param".$sentenciaSql->error."n");exit;
		}else{
		$sentenciaSql->execute();
		
		$sentenciaSql=$conexion->prepare("DELETE respuesta FROM respuesta WHERE idPregunta=?");
		if(!$sentenciaSql){print("Error en prepare respuesta: ".$sentenciaSql->error."n");exit;
		}else{
		if(!$sentenciaSql->bind_param("i",$idPregunta)){print("Error en bind_param respuesta".$sentenciaSql->error."n");exit;
		}else{
		$sentenciaSql->execute();
		}
		}
		}
		}
	}//find de foreach
	$conexion->close();
	echo '<script>	language="JavaScript">alert("Registro Exitoso");
	window.location="../Eliminar/eliminarPreguntaRespuesta.php"; 	</script>';
?>