<?php
//echo"impreso desde buscarTemaBD";
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
//modificar
$sentenciaSql=$conexion->prepare("select id,NombreCuestionario from cuestionario where idTema=?");
if(!$sentenciaSql){
	print("Error en prepare: ".$sentenciaSql->error."n");
	exit;
	}else{
		if(!$sentenciaSql->bind_param("i",$idTema)){
			print("Error en bind_param ".$sentenciaSql->Error."n");
			exit;
			}
			else{
				$sentenciaSql->bind_result($idCuestionario,$nombreCuestionario);
				$idTema=$_POST['idEnviar'];
				$sentenciaSql->execute();
				echo"<option value=''> ---- </option>";
				while($sentenciaSql->fetch()){echo"<option value='$idCuestionario'> $nombreCuestionario $idCuestionario</option>";}
				$conexion->close();
			}
	}
?>