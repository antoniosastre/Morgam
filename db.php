<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("localhost", "root", "tesla1856", "morgam");
//echo "<div id=\"dbstatus\">DB: ";

  if (!$conexion->set_charset("utf8")) {
    printf(" Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
}
// echo "</div>";

function dbstatus(){
	if (mysqli_connect_errno($conexion)){
  		echo "ERR." . mysqli_connect_error();
  	}else{
  		echo "<img src=\"img/green.png\" width=\"18\" height=\"18\">";
  	}
}

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

function userShowNameByUser($user){
	global $conexion;
	$que = "SELECT showname FROM users WHERE user='".$user."'";
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
			return mysqli_insert_id($conexion);
		}else{
			echo "No se han podido introducir los datos en la base de datos.<br>";
			return -1;
		}
		
	}else{
		echo "No se han intentado introducir los datos en la base de datos.<br>";
		//echo "Title: ".$title."<br>";
		//echo "Recorded_when: ".$recorded_when."<br>";
		//echo "Type: ".$type."<br>";
		//echo "Path: ".$pathtofile."<br>";
		return -1;

	}

}

function processPeople($media, $allpeople, $isclipgroup=0){
	$peoplearray = explode(',', $allpeople);
	$iter=0;
	global $conexion;

	foreach($peoplearray as $person){

		$exists = existThisPerson($person);

		if(empty($exists)){ //El nombre no existía
			$que = "INSERT INTO people (name) VALUES (\"".$person."\")";
			mysqli_query($conexion,$que);

			$que = "INSERT INTO peopleinmedia (person, isclipgroup, media) VALUES (\"".mysqli_insert_id($conexion)."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}else{ //El nombre ya existía
			$que = "INSERT INTO peopleinmedia (person, isclipgroup, media) VALUES (\"".$exists."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}
		$iter++;
	}
}
				
function processPlaces($media, $allplaces, $isclipgroup=0){
	$placesarray = explode(',', $allplaces);
	$iter=0;
	global $conexion;

	foreach($placesarray as $place){

		$exists = existThisPlace($place);

		if(empty($exists)){ //El nombre no existía
			$que = "INSERT INTO places (name) VALUES (\"".$place."\")";
			mysqli_query($conexion,$que);

			$que = "INSERT INTO placesinmedia (place, isclipgroup, media) VALUES (\"".mysqli_insert_id($conexion)."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}else{ //El nombre ya existía
			$que = "INSERT INTO placesinmedia (place, isclipgroup, media) VALUES (\"".$exists."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}
		$iter++;
	}
}

function processTags($media, $alltags, $isclipgroup=0){
	$tagsarray = explode(',', $alltags);
	$iter=0;
	global $conexion;

	foreach($tagsarray as $tag){

		$exists = existThisTag($tag);

		if(empty($exists)){ //El nombre no existía
			$que = "INSERT INTO tags (name) VALUES (\"".$tag."\")";
			mysqli_query($conexion,$que);

			$que = "INSERT INTO tagsinmedia (tag, isclipgroup, media) VALUES (\"".mysqli_insert_id($conexion)."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}else{ //El nombre ya existía
			$que = "INSERT INTO tagsinmedia (tag, isclipgroup, media) VALUES (\"".$exists."\",".$isclipgroup.",\"".$media."\")";
			mysqli_query($conexion,$que);
		}
		$iter++;
	}
}

function existThisPerson($person){

	global $conexion;
	$que = "SELECT id FROM people WHERE name='".$person."'";
	$res = mysqli_query($conexion,$que);

	if(empty($res)){
		return 0;
	}else{
		$linea = mysqli_fetch_array($res);
	return $linea['id'];
	}
}

function existThisPlace($place){

	global $conexion;
	$que = "SELECT id FROM places WHERE name='".$place."'";
	$res = mysqli_query($conexion,$que);

	if(empty($res)){
		return 0;
	}else{
		$linea = mysqli_fetch_array($res);
	return $linea['id'];
	}
}

function existThisTag($tag){

	global $conexion;
	$que = "SELECT id FROM tags WHERE name='".$tag."'";
	$res = mysqli_query($conexion,$que);

	if(empty($res)){
		return 0;
	}else{
		$linea = mysqli_fetch_array($res);
	return $linea['id'];
	}
}


function peopleArray(){

		global $conexion;
		$que = "SELECT name FROM people";
		$res = mysqli_query($conexion,$que);

		while ($row = mysqli_fetch_array($res)){
		$people[] = $row['name'];
		}

		return $people;

}

function placesArray(){

		global $conexion;
		$que = "SELECT name FROM places";
		$res = mysqli_query($conexion,$que);

		while ($row = mysqli_fetch_array($res)){
		$places[] = $row['name'];
		}

		return $places;

}

function tagsArray(){

		global $conexion;
		$que = "SELECT name FROM tags";
		$res = mysqli_query($conexion,$que);

		while ($row = mysqli_fetch_array($res)){
		$tags[] = $row['name'];
		}

		return $tags;

}

function logincredentials($user, $password){

	global $conexion;
	$que = "SELECT * FROM users WHERE user='".$user."'";
	$res = mysqli_query($conexion,$que);

	if(empty($res)){
		return false;
	}else{
		$linea = mysqli_fetch_array($res);
		
		if(password_verify($password , $linea['password'])){
			return true;
		}
		return false;
	}


}

function lastgivencookie($user){

	global $conexion;

	$random = generateRandomString();

	$que = "UPDATE users SET lastcookiegiven=\"".$random."\" WHERE user=\"".$user."\"";
	mysqli_query($conexion,$que);

	return $random;
}

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isValidCookie($cookie){

	if(!isset($_COOKIE[$cookie])) return false;

	$exploded = explode("-and-", $_COOKIE[$cookie]);

	$user = $exploded[0];
	$code = $exploded[1];

	global $conexion;
	$que = "SELECT lastcookiegiven FROM users WHERE user='".$user."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	if($linea['lastcookiegiven'] == $code && strlen($linea['lastcookiegiven']) == 8){
		return true;
	}else{
		return false;
	}

}

?>














