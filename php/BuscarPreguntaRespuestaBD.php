<?php
echo " ";
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
$form=$_POST['Formulario'];	
									
if($form=="eliminarPreRest")
{
$sentenciaSql=$conexion->prepare("select preguntas.id, preguntas.Pregunta,respuesta.idPregunta, respuesta.RespuestaCorrecta FROM preguntas,respuesta WHERE preguntas.id>? AND respuesta.idPregunta>? AND  preguntas.id = respuesta.idPregunta AND preguntas.idCuestionario=?");
if (!$sentenciaSql) {print ("Error en prepare: " . $sentenciaSql->error . "n");echo"<script>alert('error en sentecia')</script>";exit;
}else{
	if (!$sentenciaSql->bind_param("iii",$idPregunta,$idPregunta,$idCuestionario)) {print("Error en bind_param: " . $sentenciaSql->error . "n");exit;
	}else{                                  //se asiganara a $nombreMateria el resutlado de la consulta
		$sentenciaSql->bind_result($idPregunta,$nombrePregunta,$idPRegunta,$Respuesta);
		$idPregunta=0;
		$idCuestionario=$_POST['idEnviar'];
		$sentenciaSql->execute(); //echo"<option> ---- </option>";
		echo"<p>";
		//while ($sentenciaSql->fetch()) {echo"<option value='$idPregunta'>Pregunta: $nombrePregunta --  Respuesta: $Respuesta  </option>";}
		while ($sentenciaSql->fetch()) {echo"<input type='checkbox' name='PreRestAElim[]' value='$idPregunta'>Pregunta: $nombrePregunta --  Respuesta: $Respuesta  </input> </br>";}
		echo"</p>";
	}
	}
}elseif($form=="modificarPreRest"){
	$sentenciaSql=$conexion->prepare("select preguntas.id, preguntas.Pregunta,respuesta.idPregunta, respuesta.RespuestaCorrecta from preguntas,respuesta WHERE preguntas.id>? AND respuesta.idPregunta>? AND  preguntas.id = respuesta.idPregunta AND preguntas.idCuestionario=?");
    if (!$sentenciaSql) {print ("Error en prepare: " . $sentenciaSql->error . "n");exit;
	}else{
        if (!$sentenciaSql->bind_param("iii",$idPregunta,$idPregunta,$idCuestionario)) {print("Error en bind_param: " . $sentenciaSql->error . "n");exit;
		}else{
                                        //se asiganara a $nombreMateria el resutlado de la consulta
            $sentenciaSql->bind_result($idPregunta,$nombrePregunta,$idPRegunta,$Respuesta);
            $idPregunta=0;
			$idCuestionario=$_POST['idEnviar'];
            $sentenciaSql->execute();
            echo"<select name='Tema' id='Tema'  Temattri=''>";
            echo"<option> ---- </option>";
                while ($sentenciaSql->fetch()) {echo"<option value='$idPregunta'>Pregunta: $nombrePregunta --  Respuesta: $Respuesta  </option>";}
                    echo"</select>";
                    echo"<span id='Buscando'></span>";	
			}
       }
										
	}
	
$conexion->close();
?>	