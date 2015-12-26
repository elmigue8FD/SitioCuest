<?php
//try{
$Error=0;
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);

//FALTA validamos que no existe un cuestionario con el mismo nombre

//insertamos el nombre del nuevo cuestionario en la base de datos 

$sentenciaSql = $conexion->prepare("insert into cuestionario (idMateria, idTema, NombreCuestionario) value (?,?,?)");
if(!$sentenciaSql){	print("Error en prepare: ".$sentenciaSql->error."n");$Error=1;exit;
}else{
if(!$sentenciaSql->bind_param("iis",$idMateria, $idTema, $NombreCuestionario)){	print("Error en bind_param".$sentenciaSql->error."n");$Error=1;exit;
}else{
$idMateria=$_POST['Materia'];
$idTema=$_POST['Tema'];
$NombreCuestionario=$_POST['NombreCuestionario'];
$sentenciaSql->execute();


//buscamos el id del nombre del cuestionario para insertarlo en la tabla pregunta y respuesta

$sentenciaSql = $conexion->prepare("SELECT id FROM cuestionario WHERE NombreCuestionario=?");
if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");$Error=1;exit;
}else{
if(!$sentenciaSql->bind_param("s",$NombreCuestionario)){print("Error en bind_param".$sentenciaSql->error."n");$Error=1;exit;
}else{
$sentenciaSql->bind_result($idCuestionario);
$sentenciaSql->execute();	
print("idMateria:".$idMateria." idTema:".$idTema." NombreCuestionario:".$NombreCuestionario."");
while($sentenciaSql->fetch()){print(" idCuestionario:".$idCuestionario."");}
$idCuestionario=(int)$idCuestionario;


//print(" ".$idpregunta0." ".$idpregunta1."  ");
$i=0;
$bandera=0;
while($i<=5&&$bandera==0){
	if(@$_POST['Pregunta'.$i]!=null&&@$_POST['Respuesta'.$i]!=null){
	
	$Respuesta=$_POST['Respuesta'.$i];
		//print("Pregunta: ".$Pregunta."  Respuesta: ".$Respuesta);
		
		$sentenciaSql = $conexion->prepare("insert into preguntas (idTema, idMateria, idCuestionario, Pregunta) value (?,?,?,?)");
		if(!$sentenciaSql){print("Error en prepare pregunta: ".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		if(!$sentenciaSql->bind_param("iiis", $idMateria,$idTema, $idCuestionario,$Pregunta)){print("Error en bind_param".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		$Pregunta=$_POST['Pregunta'.$i];
		$sentenciaSql->execute();
		
		//Buscamos el id de la pregunta para insertarlo en la tabla respuestas
		$sentenciaSql = $conexion->prepare("SELECT id FROM preguntas WHERE Pregunta=?");
		if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		if(!$sentenciaSql->bind_param("s",$Pregunta)){print("Error en bind_param".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		$sentenciaSql->bind_result($idPregunta);
		$sentenciaSql->execute();	
		print("idMateria:".$idMateria." idTema:".$idTema." NombreCuestionario:".$Pregunta."");
		while($sentenciaSql->fetch()){print(" idPregunta:".$idPregunta."");}
		$idPregunta=(int)$idPregunta;
		
		$sentenciaSql = $conexion->prepare("insert into respuesta (idTema, idMateria, idCuestionario,idPregunta, RespuestaCorrecta) value (?,?,?,?,?)");
		if(!$sentenciaSql){print("Error en prepare: ".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		if(!$sentenciaSql->bind_param("iiiis",$idTema, $idMateria, $idCuestionario,$idPregunta,$Respuesta)){print("Error en bind_param".$sentenciaSql->error."n");$Error=1;exit;
		}else{
		$Respuesta=$_POST['Respuesta'.$i];
		$sentenciaSql->execute();
		}
		}
		}
		}
		}
		}
		}else{$bandera=1;}
		$i=$i+1;
	}

if($Error==0){echo '<script>	language="JavaScript">alert("Registro Exitoso");window.location="../insertar/insertarCuestionario.php"; 	</script>';}
//}
}
}
}
}

$conexion->close();
?>