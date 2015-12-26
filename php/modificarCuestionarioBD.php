<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$idMateria= $_POST['Materia'];
	$idTema=$_POST['Tema'];
	$idCuestionario=$_POST['CuestionarioExistente'];
	$nuevoNombreCuest=$_POST['NombreCuestModificar'];
	//print("id Materia:".$idMateria." idTema:".$idTema." idCuestionario:".$idCuestionario." nombreCuestionario:".$nuevoNombreCuest);
	$sentenciaSql=$conexion->prepare("UPDATE cuestionario SET NombreCuestionario=? WHERE id=? AND idTema=? AND idMateria=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;}
	else{
		if(!$sentenciaSql->bind_param("siii",$nuevoNombreCuest,$idCuestionario,$idTema,$idMateria)){print("Error en bind_param".$sentenciaSql->error."n");exit;
		}else{
			print("idMateria : ".$idMateria." id tema modificar: ".$idTema." nombreTemaNuevo: ".$nuevoNombreCuest);
			$sentenciaSql->execute();
			$conexion->close();
			echo '<script>	language="JavaScript">alert("Modificacion Exitoso");	window.location="../Modificar/modificarCuestionario.php"; 	</script>';
		}
	}
?>