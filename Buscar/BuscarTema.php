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
	<form method="post"  name="InsertarPregunta" id="formulario" action="../php/insertarCuestionarioBD.php">
    	<table border="0" width="500">
                        <tr>
                            <td>
                                <p>
                                    Tema al que pertenece
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
										
										
                                        $sentencia=$conexion->prepare("select id,Tema from temacuest where id > ?");
                                        if (!$sentencia) {print ("Error en prepare: " . $sentenciaSql->error . "n");exit;}
                                        if (!$sentencia->bind_param("i",$idTema)) {print("Error en bind_param: " . $sentencia->error . "n");exit;}
                                        //se asiganara a $nombreMateria el resutlado de la consulta
                                        $sentencia->bind_result($idTema,$nombreTema);
                                        $idTema=0;
                                        $sentencia->execute();
                                        echo"<select name='Tema' id='Tema'  Temattri=''>";
                                        echo"<option> ---- </option>";
                                       	while ($sentencia->fetch()) {echo"<option value='$idTema'> $nombreTema </option>";}
                                        echo"</select>";
                                        echo"<span id='Buscando'></span>";
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