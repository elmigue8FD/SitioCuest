<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link type="text/css" rel="stylesheet" href="../css/estilo.css" />-->
<title>Documento sin título</title>
</head>

<body>
<div class="main">
            <div class="formularioInsertar">
	<form method="post"  name="InsertarPregunta" idCuestionario="formulario" action="../php/insertarCuestionarioBD.php">
    	<table border="0" widCuestionarioth="500">
                        <tr>
                            <td>
                                <p>
                                    Cuestionarios al que pertenece
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
										
										
                                        $sentenciaSql=$conexion->prepare("select id, NombreCuestionario from cuestionario where id > ?");
                                        if (!$sentenciaSql) {print ("Error en prepare: " . $sentenciaSql->error . "n");exit;}
                                        if (!$sentenciaSql->bind_param("i",$idCuestionario)) {print("Error en bind_param: " . $sentenciaSql->error . "n");exit;}
                                        //se asiganara a $nombreCuestionarioMateria el resutlado de la consulta
                                        $sentenciaSql->bind_result($idCuestionario,$nombreCuestionario);
                                        $idCuestionario=0;
                                        $sentenciaSql->execute();
                                        echo"<select name='' idCuestionario=''  ttri=''>";
                                        echo"<option> ---- </option>";
                                       	while ($sentenciaSql->fetch()) {echo"<option value='$idCuestionario'> $nombreCuestionario </option>";}
                                        echo"</select>";
                                        echo"<span idCuestionario='cando'></span>";
                                        //$conexion->close();
                                    ?>	
                                </p>
                            </td>
                        </tr>
    	</table>
	</form>
    <a href="../index.php">Regresar </a>
    </div><!-- fin de formulario-->
    </div><!-- fin de main -->
                       
</body>
</html>