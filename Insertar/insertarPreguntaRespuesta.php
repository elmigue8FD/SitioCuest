<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link type="text/css" rel="stylesheet" href="../css/estilo.css" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
<title>Cuestionario</title>

<!--<script  src="../js/jquery-2.1.1.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	
	//bucamos el tema segun la Materia Seleccionada
	jQuery('#Materia').change(function () {
	//alert("Entro al javascript y a la funcion");
	var idMateria= document.getElementById("Materia").value;
	$("#CuestionarioElegido").html("<option value=''> ---- </option>");
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
				$("#CuestionarioElegido").html(msg);
				});
	});
	
	
	//placeholder='Escribe la Pregunta'  placeholder='Escribe la Respuesta'
	
	jQuery('#NumPreguntas').click(function () {
	//alert("Entro al javascript");
	var to=document.getElementById("content_preguntas");
		to.innerHTML="";
	var NumeroPreguntas = document.getElementById("NumPreguntas").value;
	var i;
	for(i=0;i<NumeroPreguntas;i++){
		$("#content_preguntas").append("<input disabled='disabled' type='text' value="+i+" size=5/>		<input type='text' name="+'Pregunta'+i+" id="+'Pregunta'+i+"   size=20 />		<input type='text' name="+'Respuesta'+i+" id="+'Respuesta'+i+"   size=20 /></br>");
	}	
	});
	
});
</script>
</head>

<body>
	<div class="main">
            <div class="formularioInsertar">
                <h1>Inseratar Pregunta Respuesta</h1>
				<!-- action="../php/insertarPreguntaBD.php"-->
                
                <form method="post"  name="InsertarPregunta" id="formulario" action="../php/insertarPreguntaRespuestaBD.php">
                    <table border="0" width="500">
                        <tr>
                            <td>
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
                                    <select name='CuestionarioElegido' id='CuestionarioElegido'  >
                                    	<option> ---- </option>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Numero de Preguntas a Insertar
                                </p>
                            </td>
                            <td>
                                <p>
                                    <select name="NumPreguntas" id="NumPreguntas" autofocus="autofocus">
                                        <option value="" selected="selected"> --- </option>
                                        <option value="1"> 1 </option>
                                        <option value="2"> 2 </option>
                                        <option value="3"> 3 </option>
                                        <option value="4"> 4 </option>
                                        <option value="5"> 5 </option>
                                    </select>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th	colspan="2">
                                <div id="content_preguntas">
                                    <p>
                                        Pregunta / Respuesta
                                    </p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" value="      Aceptar      " name="Agregar" id="agregar"/>
                           </td>
                       </tr>
                   <table>
                </form>
				
                <a href="../index.php">Regresar</a>
            </div><!-- fin de formularioInsertar-->
  	</div><!--fin de main -->
    
</body>
</html>