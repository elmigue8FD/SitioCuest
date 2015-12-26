<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$idMateria= $_POST['Materia'];
	$idTema=$_POST['Tema'];
	$nuevoNombreTema=$_POST['NombreTemaModificar'];
	
	$sentenciaSql=$conexion->prepare("UPDATE temacuest SET Tema=? WHERE id=? AND idMateria=?");
	if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");exit;}
	else{
		if(!$sentenciaSql->bind_param("sii",$nuevoNombreTema,$idTema,$idMateria)){print("Error en bind_param".$sentenciaSql->error."n");exit;
		}else{
			print("idMateria : ".$idMateria." id tema modificar: ".$idTema." nombreTemaNuevo: ".$nuevoNombreTema);
			$sentenciaSql->execute();
			$conexion->close();
			echo '<script>	language="JavaScript">alert("Eliminacion Exitoso");	window.location="../Modificar/modificarTema.php"; 	</script>';
		}
	}
?>