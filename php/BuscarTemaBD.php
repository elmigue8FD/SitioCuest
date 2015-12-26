<?php
//echo"impreso desde buscarTemaBD";
$bdhost="localhost";
$basedatos="cuestionario";
$usuario="root";
$password="";
$conexion=new mysqli($bdhost,$usuario,$password,$basedatos);
//modificar
$senteciaSql=$conexion->prepare("select id,Tema from temacuest where idMateria=?");
if(!$senteciaSql){
	print("Error en prepare: ".$senteciaSql->error."n");
	exit;}else{
	if(!$senteciaSql->bind_param("i",$idMateria)){print("Error en bind_param ".$senteciaSql->Error."n");
		exit;}else{
		$senteciaSql->bind_result($idTema,$nombreTema);
		$idMateria=$_POST['idEnviar'];
		$senteciaSql->execute();
		echo"<option value=''> ---- </option>";
		while($senteciaSql->fetch()){echo"<option value='$idTema'> $nombreTema $idTema</option>";}
		$conexion->close();
		}
}
?>