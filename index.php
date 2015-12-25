<?php include("php/conexion.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuestionario</title>
</head>

<body>
    <header>
    <input type="checkbox"  value="123"  ></input> 
    	<h1>Cuestionarios</h1>
        <nav>
        	<ul class="menu">
            	<li><a href="#">Buscar</a>
                	<ul>
                      	<li><a href="#">Busqueda Destallada</a></li>
                        <li><a href="Buscar/BuscarMateria.php">Buscar Materia</a></li>
                        <li><a href="Buscar/BuscarTema.php">Buscar Tema</a></li>
                        <li><a href="Buscar/BuscarCuestionario.php">Buscar Cuestionario</a></li>
                        <li><a href="Buscar/BuscarPreguntaRespuesta.php">Buscar Pregunta / Respuesta</a></li>
                        <li><a href="#">Buscar Opcion</a></li>
                    </ul><!-- find e lista -->
                </li>
                <li><a>Crear</a>
                    <ul>
                        <li><a href="Insertar/insertarMateria.php">Nueva Materia</a></li>
                        <li><a href="Insertar/insertarTema.php">Nuevo Tema</a></li>
                        <li><a href="Insertar/insertarCuestionario.php">Nuevo Cuestionario</a></li>
                        <li><a href="Insertar/insertarPreguntaRespuesta.php">Nueva Pregunta / Respuesta</a></li>
                        <li><a href="#">Nueva Opcion</a></li>
                    </ul><!-- fin e lista -->
                </li><!-- find e crear -->
                <li><a>Modificar</a>
                	<ul>
                    	<li><a href="Modificar/modificarMateria.php">Modificar Materia</a></li>
                        <li><a href="Modificar/modificarTema.php">Modificar Tema</a></li>
                        <li><a href="Modificar/modificarCuestionario.php">Modificar Cuestionario</a></li>
                        <li><a href="Modificar/modificarPreguntaRespuesta.php">Modif Pregunta / Respuesta</a></li>
                        <li><a href="#">Modificar Opcion</a></li>
                    </ul>
                </li><!-- find de modificar -->
                <li><a>Eliminar</a>
                	<ul>
                    	<li><a href="Eliminar/eliminarMateria.php">Eliminar Materia</a></li>
                        <li><a href="Eliminar/eliminarTema.php">Eliminar Tema</a></li>
                        <li><a href="Eliminar/eliminarCuestionario.php">Eliminar Custionario</a></li>
                        <li><a href="Eliminar/eliminarPreguntaRespuesta.php">Eliminar Pregunta / Respuesta</a></li>
                        <li><a href="#">Eliminar Opcion</a></li>
                    </ul>
				</li><!-- find de Elimianr -->
                <li><a href="RealizarPrueba/RealizarPrueba.php">Realizar un cuestionario</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
    	
    </div>
</body>
</html>