<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../js/jquery-2.1.1.js"> </script>

<title>Cuestionario</title>
<script>
$(document).ready(function(){
	
	//bucamos el tema segun la Materia Seleccionada
	jQuery('#Materia').change(function () {
	//alert("Entro al javascript y a la funcion");
	var idMateria= document.getElementById("Materia").value;
	$("#CuestionarioAEliminar").html("<option value=''> ---- </option>");
	$.ajax({
			type: 'POST',
			url: 'http://localhost/5_Poryectos_Personales/SitioCuest/php/BuscarTemaBD.php',
			data: {idEnviar:idMateria}
		}).done(function(msg){
			//alert( "Cambio Recibir Notifi: " +msg);
				$("#Tema").html(msg);
				});
	});	
	
	//buscamos en los cuestionarios existentes con la MAteria y el tema seleccionados
	jQuery('#Tema').change(function () {
	//alert("Entro al javascript y a la funcion");
	var idMateria= document.getElementById("Materia").value;
	var idTema=document.getElementById("Tema").value;
	$.ajax({
			type: 'POST',
			url: 'http://localhost/5_Poryectos_Personales/SitioCuest/php/BuscarCuestionarioBD.php',
			data: {idEnviar:idTema}
		}).done(function(msg){
			//alert( "Cambio Recibir Notifi: " +msg);
				$("#CuestionarioAEliminar").html(msg);
				});
	});
	
	//buscamos en los cuestionarios existentes con la MAteria y el tema seleccionados
	jQuery('#CuestionarioAEliminar').change(function () {
	//alert("Entro al javascript y a la funcion");
	var idMateria= document.getElementById("Materia").value;
	var idCuestionario=document.getElementById("CuestionarioAEliminar").value;
	var TipoForm="eliminarPreRest"
	$.ajax({
			type: 'POST',
			url: 'http://localhost/5_Poryectos_Personales/SitioCuest/php/BuscarPreguntaRespuestaBD.php',
			data: {idEnviar:idCuestionario,Formulario:TipoForm}
		}).done(function(msg){
			//alert( "Cambio Recibir Notifi: " +msg);
				//$("#PregRespEliminar").html(msg);
				$("#PregRespEliminar").html(msg);
				});
	});
});
</script>
</head>

<body>
    <div class="main">
            <div class="formularioInsertar">
        	<h1>eliminar Pregunta y Respuesta</h1>
            <form name="formElimianrPregunResp" id="formElimianrPregunResp"method="POST" action="../php/eliminarPregRestBD.php">
            	<table border="1" width="800">
                	<tr>
                            <td width=200>
                                <p>
                                    Materia al que pertenece
                                </p>
                            </td>
                            <td>
                                <p>
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
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Tema al que pertenece
                                </p>
                            </td>
                            <td>
                                <p>
                                    <select id="Tema" name="Tema">
                                        <option> --- </option>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<p>
                                	Cuestionarios
                                </p>
                            </td>
                            <td>
                            	<p>
                                    <select name='CuestionarioAEliminar' id='CuestionarioAEliminar'>
                                    	<option> ---- </option>
                                    </select>
                                </p>
                            </td>
                        </tr>
                         <tr>
                        	<td>
                            	<p>
                                	Pregunta Respuesta a eliminar
                                </p>
                            </td>
                            <td>
                            	<div| name='PregRespEliminar' id='PregRespEliminar'>
                                    <!--<select name='PregRespEliminar' id='PregRespEliminar'>
                                    	<option> ---- </option>
                                    </select>-->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" value="      Aceptar      " name="Agregar" id="agregar"/>
                           </td>
                       </tr>
                </table>
            </form>
             <a href="../index.php">Regresar</a>
        </div>
    </div>
</body>
</html>