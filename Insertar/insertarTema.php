<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuestionario</title>
</head>

<body>
	<div class="main">
            <div class="formularioInsertar">
                <h1>Inseratar Tema</h1>
                <form method="post" action="../php/insertarTemaBD.php" name="InsertarTema" id="formulario">
                <p>
                Materia al que pertenece
                <?php
                $bdhost="localhost";
				$basedatos="cuestionario";
				$usuario="root";
				$password="";
				$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
				$sentencia=$conexion->prepare("select id,Materia from materiacuest where id > ?");
				if (!$sentencia) {
    				print ("Error en prepare: " . $dbconn->error . "n");
    				exit;
					}
				if (!$sentencia->bind_param("i",$idMateria)) {
    				print("Error en bind_param: " . $sentencia->error . "n");
    				exit;
					}
				//se asiganara a $nombreMateria el resutlado de la consulta
				$sentencia->bind_result($idMateria,$nombreMateria);
				$idMateria=0;
				$sentencia->execute();
				echo"<select name='Materia' id='Materia'>";
				echo"<option> ---- </option>";
				while ($sentencia->fetch()) {
					echo"<option value='$idMateria'> $nombreMateria </option>";
				}
				echo"</select>";
				$conexion->close();
				?>
                </p>
                <p>
                Nomrbe de la tema:
                <input type="text" name="NombreTemaNueva" placeholder="Escribe el Tema" id="NombreTemaNueva" size=20/></p>
                <input type="submit" value="      Agregar      " name="Agregar" id="agregar"/>
                </form>
                <a href="../index.php">Regresar</a>
            </div><!-- fin de formularioInsertar-->
        
  	</div><!--fin de main -->
</body>
</html>