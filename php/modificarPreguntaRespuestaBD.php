<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$idMateria= null;
	$idTema=null;
	$idCuestionario=null;
	$idPregunta=null;
	$Pregunta=null;
	$Respuesta=null;
	
	$bandera=0;
	
	$idMateria= $_POST['Materia'];
	$idTema=$_POST['Tema'];
	$idCuestionario=$_POST['Cuestionario'];
	$idPregunta=$_POST['PregRespModificar'];
	$Pregunta=$_POST['NombrePreguntaModificar'];
	$Respuesta=$_POST['NombreRespuestaModificar'];
	//$nuevoNombreCuest=$_POST['NombreCuestModificar'];
	//print("id Materia:".$idMateria." idTema:".$idTema." idCuestionario:".$idCuestionario." nombreCuestionario:".$nuevoNombreCuest);
	if($idMateria==null||$idTema==null||$idCuestionario=null){$bandera=1;}
	
	if($Pregunta!=null)
	{
	$sentenciaSql=$conexion->prepare("UPDATE preguntas SET Pregunta=? WHERE id=? AND idTema=? AND idMateria=? AND idCuestionario=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;
	echo '<script>	language="JavaScript">alert("Modificacion Fallo prepare");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';
	$bandera=1;
	}
	else{
		
		if(!$sentenciaSql->bind_param("siiii",$Pregunta,$idPregunta,$idTema,$idMateria,$idCuestionario)){print("Error en bind_param".$sentenciaSql->error."n");exit;
		echo '<script>	language="JavaScript">alert("Modificacion Fallo param");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';
		$bandera=1;
		}else{
			
			print(" idPegunta:".$idPregunta." idTema: ".$idTema." idMateria:".$idMateria." idCuestionario:".$idCuestionario." nombrePreguntaNuevo: ".$Pregunta);
			//$sentenciaSql->execute();
			//alert("Modificacion Exitoso");
		}
	}
	}else{
		$bandera=1;
		}
		
		
	if($Respuesta!=null)
	{
	$sentenciaSql=$conexion->prepare("UPDATE respuesta SET RespuestaCorrecta=? WHERE idMateria=? AND idTema=? AND idCuestionario=? AND idPregunta=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;
	echo '<script>	language="JavaScript">alert("Modificacion Fallo prepare pregunta");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';
	$bandera=1;
	}else{
		
		if(!$sentenciaSql->bind_param("siiii",$Respuesta,$idMateria,$idTema,$idCuestionario,$idPregunta)){print("Error en bind_param".$sentenciaSql->error."n");exit;
		echo '<script>	language="JavaScript">alert("Modificacion Fallo param pregunta");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';
		$bandera=1;
		}else{
			
			print("idMateria : ".$idMateria." id tema modificar: ".$idTema." nombreRespuestaNuevo: ".$Respuesta);
			//$sentenciaSql->execute();
			
			}
	}
	}
	else{
		$bandera=1;
		}
	$conexion->close();
	if($bandera==0){
	echo '<script>	language="JavaScript">alert("Exito2");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';}
	else
	{if($bandera==1){
		echo '<script>	language="JavaScript">alert("Fallo");window.location="../Modificar/modificarPreguntaRespuesta.php";</script>';
		}}
	
?>