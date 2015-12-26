<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
<title>Cuestionario</title>
<script type="text/javascript">
$(document).ready(function(){
	
	//bucamos el tema segun la Materia Seleccionada
	jQuery('#Materia').change(function () {
	//alert("Entro al javascript y a la funcion");
	var idMateria= document.getElementById("Materia").value;
	$("#CuestionarioExistente").html("<option value=''> ---- </option>");
	$.ajax({
			type: 'POST',
			url: 'http://localhost/5_Poryectos_Personales/SitioCuest/php/BuscarTemaBD.php',
			data: {idEnviar:idMateria}
		}).done(function(msg){
			//alert( "Cambio Recibir Notifi: " +msg);
				$("#TemaAEliminar").html(msg);
				});
	});
	});
</script>
</head>

<body>
	<div class="main">
		<div class="formularioEliminar">
				
            <h1>Eliminar Tema</h1>
			<form name="formElimianrTema" id="formEliminarTema" action="../php/eliminarTemaBD.php" method="post">
				<p>
                                    Materia al que pertenece
                                </p>
				<?php
                                        $bdhost="localhost";
                                        $basedatos="cuestionario";
                                        $usuario="root";
                                        $password="";
                                        $conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
                                        $sentencia=$conexion->prepare("select id,Materia from materiacuest where id > ?");
                                        if (!$sentencia) {print ("Error en prepare: " . $dbconn->error . "n");exit;}
                                        if (!$sentencia->bind_param("i",$idMateria)) {print("Error en bind_param: " . $sentencia->error . "n");exit;}
                                        //se asiganara a $nombreMateria el resutlado de la consulta
                                        $sentencia->bind_result($idMateria,$nombreMateria);
                                        $idMateria=0;
                                        $sentencia->execute();
                                        echo"<select name='Materia' id='Materia'  Temattri=''>";
                                        echo"<option> ---- </option>";
                                       	while ($sentencia->fetch()) {echo"<option value='$idMateria'> $nombreMateria </option>";}
                                        echo"</select>";
                                        echo"<span id='Buscando'></span>";
                                        //$conexion->close();
                                    ?>
				
				<p>Temas
				<select id="TemaAEliminar" name="TemaAEliminar">
                           <option> --- </option>
                                    </select>
				</p>
				<input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" />
			</form>
			<a href="../index.php">Regresar</a>
		</div>
	</div>
</body>
</html>