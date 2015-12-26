<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<div class="main">
            <div class="formularioInsertar">
                <h1>Resultados </h1>
				<table border="1" width="100%">
                <tr><th width="33%">Pregunta</th><th width="33%">Respuesta Correcta</th><th width="34%">Tu Respuesta</th></tr>
<?php
	$bdhost="localhost";
	$basedatos="cuestionario";
	$usuario="root";
	$password="";
	$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
	
	$idPreguntaRecibida=$_POST['idPregunta'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	//echo $respuesta;
	$idRespuestaInicio=0;
	$i=0;
	$sentenciaSql=$conexion->prepare("select idPregunta, RespuestaCorrecta FROM respuesta WHERE id>? AND idPregunta=?");
    if (!$sentenciaSql) {print ("Error en prepare: " . $sentenciaSql->error . "n");exit;
		}else{
		if (!$sentenciaSql->bind_param("ii",$idRespuestaInicio,$idPregunta)) {print("Error en bind_param: " . $sentenciaSql->error . "n");exit;}
		else{
                                        //se asiganara a $nombreMateria el resutlado de la consulta
			$sentenciaSql->bind_result($idPregunta,$nombreRespuesta);
			foreach($idPreguntaRecibida AS $idPregunta){
			$sentenciaSql->execute();
			//echo "<table border=1>";
			while ($sentenciaSql->fetch()) {
			//echo "<pre>"."idPregunta:".$idPregunta." Pregunta ".$pregunta[$i]."		RespuestaCorrecta:".$nombreRespuesta."		Tu respuesta:".$respuesta[$i]."</br>";$i++;
			//echo "<tr>"."<td width=1000>idPregunta:".$idPregunta."</td><td width=50>Pregunta ".$pregunta[$i]."</td><td width=50>RespuestaCorrecta:".$nombreRespuesta."</td><td width=50>Tu respuesta:".$respuesta[$i]."</td></tr>";$i++;
			echo "<tr>"."<td width=33%>".$pregunta[$i]."</td><td width=33%>".$nombreRespuesta."</td><td width=34%>".$respuesta[$i]."</td></tr>";$i++;
				}
				//echo "</table>";
			}
			
			
		}
		/*echo "</br></br></br>".count($respuesta);
		for($i=1;$i<=count($respuesta);$i++){
				//echo "desde un for normal";
				echo "Respuesta Contestada:".$idPreguntaRecibida[$i]." ";
				echo $pregunta[$i]." ";
				echo $respuesta[$i]."</br>";
				}*/
	}
?>
		</table>
		</div>
	</div>
</body>
</html>