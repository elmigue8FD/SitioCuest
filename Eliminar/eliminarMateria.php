<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuestionario</title>
</head>

<body>
	<div class="main">
		<div class="formularioEliminar">
				
            <h1>Eliminar Materia</h1>
			<form name="formElimianrMateria" id="formEliminarMateria" action="../php/eliminarMateriaBD.php" method="post">
				<p>Materias
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
				echo"<select name='MateriaAEliminar' id='MateriaAEliminar'>";
				echo"<option> --- </option>";
				while($sentencia->fetch()){
					echo"<option value='$idMateria'> $nombreMateria</option>";
				}
				echo"</select>";
				$conexion->close();
				?>
				</p>
				<input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" />
			</form>
			<a href="../index.php">Regresar</a>
		</div>
	</div>
</body>
</html>