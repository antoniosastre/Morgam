<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("localhost", "root", "tesla1856", "morgam");
//echo "<div id=\"dbstatus\">DB: ";
if (mysqli_connect_errno($conexion))
  {
  echo "ERR." . mysqli_connect_error();
  }else{
  echo "<img src=\"img/green.png\" width=\"18\" height=\"18\">";
  }
  if (!$conexion->set_charset("utf8")) {
    printf(" Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
}
// echo "</div>";


function videoById($id){
	global $conexion;
	$que = "SELECT *
	FROM video
	WHERE video.id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea;
}

function fechaNormal($fecha){
	if ($fecha){
	preg_match( "#([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})#", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
	return $lafecha;
	}
	return null;
}

function fechaSQL($fecha){
	if ($fecha){
	preg_match( "#([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})#", $fecha, $mifecha);
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $lafecha;
	}
	return null;
}

function userShowNameById($id){
	global $conexion;
	$que = "SELECT showname FROM users WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['showname'];
}

function insertVideoInfo($title, $recorded_when, $recorded_who, $length, $size, $type, $pathtofile){

if(!empty($title) && !empty($recorded_when) && !empty($type)  && !empty($pathtofile)){

		global $conexion;
		$que = "INSERT INTO video (title, recorded_when, recorded_who, length, pathtofile, size, type) VALUES (\"".$title."\",\"".$recorded_when."\",\"".$recorded_who."\",\"".$length."\",\"".$pathtofile."\",\"".$size."\",\"".$type."\")";
		if(mysqli_query($conexion,$que)){
			echo "Los datos del vídeo se han registrado correctamente.<br>";
		}else{
			echo "No se han podido introducir los datos en la base de datos.<br>";
		}
		
	}else{
		echo "No se han intentado introducir los datos en la base de datos.<br>";
		//echo "Title: ".$title."<br>";
		//echo "Recorded_when: ".$recorded_when."<br>";
		//echo "Type: ".$type."<br>";
		//echo "Path: ".$pathtofile."<br>";

	}

}



?>