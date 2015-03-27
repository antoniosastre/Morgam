<html>
	<head>
	<?php include 'head.php' ?>
	</head>
	<body>
		<?php include 'topmenu.php'; ?>
		
<div id="wrapper">
    <div id="content">

<?php

//This function separates the extension from the rest of the file name and returns it
function findexts ($filename){
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
}

$ext = findexts($_FILES['fileToUpload']['name']) ;
$newfilename = date('U');

$target_dir = "storage/".date('Y')."/".date('m')."/".date('d')."/";

mkdir($target_dir, 0777, true);


$target_file = $target_dir . $newfilename .".". $ext;
$uploadOk = 1;

//This is our size condition 

if ($_FILES['fileToUpload']['size'] > $MAX_FILE_SIZE){
	echo "El archivo es demasiado grande.<br>"; 
	$uploadOk=0;  
}


//This is our limit file type condition
if (!in_array($_FILES["fileToUpload"]["type"], $FILE_TYPES) && !empty($_FILES["fileToUpload"]["type"])){  
	echo "Archivo no admitido.<br>";
	echo "Tipo: ".$_FILES["fileToUpload"]["type"] . "<br>";
	$uploadOk=0;
}

if(empty($_FILES["fileToUpload"]["type"])){
	echo "No se ha podido detectar el tipo de archivo.<br>";
	//echo "Tipo: ".$_FILES["fileToUpload"]["type"] . "<br>";
}

if ($_FILES['fileToUpload']['size'] == 0){
	echo "No se ha seleccionado ningún archivo.<br>"; 
	$uploadOk=0;  
}


if ($uploadOk==0){
	echo "No se ha intentado la subida del archivo.";
	}   

//If everything is ok we try to upload it  

	else{
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
			echo "El archivo ". basename( $_FILES['fileToUpload']['name']). " ha sido subido correctamente.<br>";

			//echo "Datos del vídeo: <br>";

			//echo "Title: ".$_POST['title']."<br>";
			//echo "Recorded_when: ".$_POST['recorded_when']."<br>";
			//echo "Type: ".$_FILES["fileToUpload"]["type"]."<br>";
			//echo "Path: ".$target_file."<br>";

			$idinsertedmedia = insertVideoInfo($_POST['title'], $_POST['recorded_when'], 1, 100, 200, $_FILES["fileToUpload"]["type"], $target_file);

			if($idinsertedmedia != -1){

				processPeople($idinsertedmedia, $_POST['people']);
				processPlaces($idinsertedmedia, $_POST['places']);
				processTags($idinsertedmedia, $_POST['tags']);

			}

		}else{ 
			echo "El archivo no ha podido ser subido correctamente.<br>"; 
			echo $_FILES['fileToUpload']['tmp_name'];
			echo "<br>";
			echo  $target_file;
			echo "<br>";
		}  
	}


?>

</div>
</div>

		
	</body>
</html>