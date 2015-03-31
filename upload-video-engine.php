<!DOCTYPE HTML>
<?php 

require_once 'db.php';

if(!isValidCookie("morgam")){

?>

<html>
	<head>
	<meta http-equiv="refresh" content="1;url=login.php">
        <script type="text/javascript">
            window.location.href = "login.php"
        </script>
	</head>
</html>

<?

}else{

?>

<html>
	<head>
	<?php include 'head.php';
		  require_once('getid3/getid3.php'); ?>
	</head>
	<body>
		<?php include 'topmenu.php'; ?>
		
<div class="container">

<?php

//This function separates the extension from the rest of the file name and returns it
function findexts ($filename){
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
}

require_once 'functions.php';

$ext = findexts($_FILES['fileToUpload']['name']) ;
$tmpfilename = generateRandomString();

$target_dir = "storage/".date('Y')."/".date('m')."/".date('d')."/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);    
}

$tmp_target_file = $target_dir . $tmpfilename .".". $ext;
$uploadOk = 1;

//This is our size condition 

if ($_FILES['fileToUpload']['size'] > $MAX_FILE_SIZE){
	echo "El archivo es demasiado grande.<br>"; 
	$uploadOk=0;  
}


//This is our limit file type condition
//if (!in_array($_FILES["fileToUpload"]["type"], $FILE_TYPES) && !empty($_FILES["fileToUpload"]["type"])){  
//	echo "Archivo no admitido.<br>";
//	echo "Tipo: ".$_FILES["fileToUpload"]["type"] . "<br>";
//	$uploadOk=0;
//}

//if(empty($_FILES["fileToUpload"]["type"])){
//	echo "No se ha podido detectar el tipo de archivo.<br>";
//	echo "Tipo: ".$_FILES["fileToUpload"]["type"] . "<br>";
//}

//if ($_FILES['fileToUpload']['size'] == 0){
//	echo "No se ha seleccionado ningún archivo.<br>"; 
//	$uploadOk=0;  
//}


if ($uploadOk==0){
	echo "No se ha intentado la subida del archivo.";
	}   

//If everything is ok we try to upload it  

	else{
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $tmp_target_file)){
			echo "El archivo ". basename( $_FILES['fileToUpload']['name']). " ha sido subido correctamente.<br>";

			//echo "Datos del vídeo: <br>";
			//echo "Title: ".$_POST['title']."<br>";
			//echo "Recorded_when: ".$_POST['recorded_when']."<br>";
			//echo "Type: ".$_FILES["fileToUpload"]["type"]."<br>";
			//echo "Path: ".$tmp_target_file."<br>";

			$getID3 = new getID3;

			$ThisFileInfo = $getID3->analyze($tmp_target_file);



			$idinsertedmedia = insertVideoInfo($_POST['title'], $_POST['recorded_when'], userIdByUser(explode("-and-", $_COOKIE['morgam'])[0]), $ThisFileInfo['playtime_seconds'], $tmp_target_file, $_FILES["fileToUpload"]["size"], $_FILES["fileToUpload"]["type"], $ThisFileInfo['video']['resolution_x'], $ThisFileInfo['video']['resolution_y'], $ThisFileInfo['video']['frame_rate']);
			// insertVideoInfo($title, $recorded_when, $recorded_who, $length, $pathtofile, $size, $type, $resolutionx, $resolutiony, $framerate)

			if($idinsertedmedia != -1){

				$def_target_file = $target_dir ."v-". $idinsertedmedia .".". $ext;

				if(rename($tmp_target_file, $def_target_file)){
					updateFilenameInDB($idinsertedmedia, $def_target_file);
				}
				processPeople($idinsertedmedia, $_POST['people']);
				processPlaces($idinsertedmedia, $_POST['places']);
				processTags($idinsertedmedia, $_POST['tags']);

			}

		}else{ 
			echo "El archivo no ha podido ser subido correctamente.<br>"; 

			//if(rename($_FILES['fileToUpload']['tmp_name'], $tmp_target_file)){
			//	echo "Se ha movido con la función alternativa.";
			//}else{
			//	echo "Todo ha fallado.";
			//}
			//echo $_FILES['fileToUpload']['tmp_name'];
		}  
	}


?>

</div>

		
	</body>
</html>

<?
}
?>