<?php 

function bytesToSizeString($bytes){

	$fileSize = $bytes;
			$fileUnit = 0;

			while ($fileSize >= 1000){
				$fileSize = $fileSize/1000;
				$fileUnit++;
			}

			$fileSize = round($fileSize, 2);

			$fileSize = number_format($fileSize, 2, ",",".");

			switch ($fileUnit) {
				case '0':
					$fileUnit = "B";
					break;

				case '1':
					$fileUnit = "KB";
					break;

				case '2':
					$fileUnit = "MB";
					break;

				case '3':
					$fileUnit = "GB";
					break;
				
				case '4':
					$fileUnit = "TB";
					break;

				case '5':
					$fileUnit = "PB";
					break;
				
				default:
					$fileUnit = "--";
					break;
			}

			$fileSize = $fileSize." ".$fileUnit;
			return $fileSize;

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

function fechaNormal($fecha){
	if ($fecha){
	preg_match( "#([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})#", $fecha, $mifecha); 
	$lafecha=$mifecha[3]." / ".$mifecha[2]." / ".$mifecha[1];
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

function secondsToTimeString($init){



	$hours = floor($init / 3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = round(fmod($init, 60));

	if(!empty($hours)){

		return $hours."h ".$minutes."m ".$seconds."s";

	}else if(!empty($minutes)){

		return $minutes."m ".$seconds."s";

	}else{

		return $seconds." sec.";

	}


}


function printVideoRows($res){

	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<td>ID</td><td>Título</td><td>Grabado</td><td>Duración</td><td>Peso</td><td>Resolución</td><td>FPS</td><td>Tipo</td>";
	echo "</tr>";

	while($video = mysqli_fetch_array($res)){

		echo "<tr>";
			echo "<td>".$video['id']."</td>"."<td><a href=\"video.php?id=".$video['id']."\">".$video['title']."</a></td>"."<td>".fechaNormal($video['recorded_when'])."</td>"."<td>".secondsToTimeString($video['length'])."</td>"."<td>".bytesToSizeString($video['size'])."</td>"."<td>".resolutionString($video['resolutionx'], $video['resolutiony'])."</td>"."<td>".$video['framerate']."</td>"."<td>".$video['type']."</td>";
		echo "</tr>";
	}

	echo "</table>";

}

function resolutionString($resx, $resy){

if(!empty($resx) && !empty($resy)){
	$g = gcd($resx, $resy);
	$ratio = round(($resx/$resy),3).":1";
	return $resx." x ".$resy." (".$ratio.")";
}

return "n/d";

}

function gcd($a,$b) {
    $a = abs($a); $b = abs($b);
    if( $a < $b) list($b,$a) = Array($a,$b);
    if( $b == 0) return $a;
    $r = $a % $b;
    while($r > 0) {
        $a = $b;
        $b = $r;
        $r = $a % $b;
    }
    return $b;
}

function progressBarWord($remaining){

	require_once 'config.php';

	if($remaining<70){
		return "success";
	}else if($remaining<80){
		return "info";
	}else if($remaining<90){
		return "warning";
	}else{
		return "danger";
	}



}


function inboxFilesOptions(){

	$files = scandir("inbox");

	for ($i=0; $i < sizeof($files); $i++) {

		if($files[$i] != "." && $files[$i] != ".." && $files[$i] != "@eaDir"){
		echo "<option value=\"".$i."\">";
		echo $files[$i];
		echo "</option>\n";
	}
	}

}




?>

