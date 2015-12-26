<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<div class="main">
		
            <div class="formularioInsertar">
				
                <h1>Modificar Materia</h1>
                
                <form method="post" action="../php/modificarMateriaBD.php" name="InsertarMateria" id="formulario">
				<p>Selecciona la materia a modificar
				<?php
				$bdhost="localhost";
				$basedatos="cuestionario";
				$usuario="root";
				$password="";
				$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
				$sentencia=$conexion->prepare("select id,Materia from materiacuest where id > ? order by Materia");
				if(!$sentencia){
					print("Error en prepare".$sentencia->error."n");
					exit;
				}
				if(!$sentencia->bind_param("i",$idMateria)){
				print("Error en bind_param: ".$sentencia->error."n");
				exit;
				}
				$sentencia->bind_result($idMateria,$nombreMateria);
				$idMateria=0;
				$sentencia->execute();
				echo"<select name='Materia' id='Materia'>";
				echo"<option> --- </option>";
				while($sentencia->fetch()){
					echo"<option value='$idMateria'> $nombreMateria</option>";
				}
				echo"</select>";
				$conexion->close();
				?>
				</p>
                
                <p>Nomrbe de la materia:
                <input type="text" placeholder="Escribe la Materia" name="NombreMateriaModificar" id="NombreMateriaModificar" size=20/></p>
                <input type="submit" value="      Agregar      " name="Agregar" id="agregar"/>
                </form>
                <a href="../index.php">Regresar</a>
            </div><!-- fin de formularioInsertar-->
        
  	</div><!--fin de main -->
</body>
</html>