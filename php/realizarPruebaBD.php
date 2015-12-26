<?php
	$bdhost="localhost";
    $basedatos="cuestionario";
    $usuario="root";
    $password="";
    $conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
										
	//$sentenciaSql=$conexion->prepare("select id, Pregunta FROM preguntas WHERE id>?");
	$sentenciaSql=$conexion->prepare("select id, Pregunta FROM preguntas WHERE id>? AND idMateria=? AND idTema=? AND idCuestionario=?");
    if (!$sentenciaSql) {print ("Error en prepare: " . $sentenciaSql->error . "n");exit;
		echo"Error en prepare";
	}else{
    if (!$sentenciaSql->bind_param("iiii",$idPreguntaInicial,$idMateria,$idTema,$idCuestionario)) {print("Error en bind_param: " . $sentenciaSql->error . "n");
	//o
	exit;}else{
                                        //se asiganara a $nombreMateria el resutlado de la consulta
    $sentenciaSql->bind_result($idPregunta,$nombrePregunta);
	$idMateria=$_POST['idMateria'];
	$idTema=$_POST['idTema'];
	$idCuestionario=$_POST['idCuestionario'];
    $idPreguntaInicial=0;
	$numero=1;
	//echo" <script language='JavaScript'>alert('Desde hphp')</script>";
    $sentenciaSql->execute();		
	//echo " ".$idPregunta." Materia".$idMateria." tema:".$idTema." Cuestionario".$idCuestionario." Pregunta".$idPreguntaInicial;
    while ($sentenciaSql->fetch()) {
	//echo " idpreConsultada".$idPregunta." $nombrePregunta".$nombrePregunta;
	echo"	<input  	type='text' name='idPregunta[]' value='$idPregunta' size=5/>
			<input  	type='text' name='pregunta[]'  value='$nombrePregunta'   size=40 />
			<input type='text' name='respuesta[]'  size=40 /></br>";
		$numero++;}
   // echo"<span id='Buscando'></span>";  disabled='disabled'
   }
   }
    $conexion->close();
?>