<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
<title>Cuestionario</title>
<script>
$(document).ready(function(e) {
	+
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
				$("#Tema").html(msg);
				});
	});
});
</script>
</head>

<body>
<div class="main">
            <div class="formularioInsertar">
                <h1>Mofidicar Tema</h1>
                <form method="post" action="../php/modificarTemaBD.php" name="InsertarTema" id="formulario">
                <table border="1" width="500">
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
                                    Tema a modificar
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
                            Nomrbe de la tema:
                            <p>
                		</td>
                		<td>
                            </p>
                            <input type="text" name="NombreTemaModificar" placeholder="Escribe el Tema" id="NombreTemaNueva" size=20/>
                            </p>
                		</td>
                	<tr>
                		<td>
                		</td>
                		<td>
                            <input type="submit" value="      Agregar      " name="Agregar" id="agregar"/>
                            </form>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			<a href="../index.php">Regresar</a>
                    	</td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div><!-- fin de formularioInsertar-->
        
  	</div><!--fin de main -->
</body>
</html>