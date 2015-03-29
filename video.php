<html>
	<head>
	<?php include 'head.php' ?>
	</head>
	<body>
		<?php include 'topmenu.php'; ?>
		
<div id="wrapper">
    <div id="content">

    <?php 

if(!isValidCookie("morgam")){

?>

Debe iniciar sesión<br>

<?

}else{

?>

<?php 

require_once 'functions.php';

echo "<h1>Vídeo ".$_GET['id']."</h1><br>"; 


$video = videoById($_GET['id']);

echo "<table>";
echo "<tr>";
echo "<td colspan=\"2\">Título: ".$video['title']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=\"2\">Grabado el ".fechaNormal($video['recorded_when'])." por ".userShowNameById($video['recorded_who'])."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Duración: ".$video['length']." min. </td><td>Tamaño ".$video['size']." MB.</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=\"2\">Ruta: /".$video['pathtofile']."</td>";
echo "</tr>";
echo "</table>";


echo "<br><br>";


echo "<video id=\"video-".$video['id']."\" class=\"video-js vjs-default-skin vjs-big-play-centered\"
  controls preload=\"auto\" width=\"640\" height=\"360\"";

//echo "poster=\"http://video-js.zencoder.com/oceans-clip.png\"";

echo  " data-setup='{\"example_option\":true}'>
 <source src=\"".$video['pathtofile']."\" type='".$video['type']."' />
 <p class=\"vjs-no-js\">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a></p>
</video>";



?>

<?
}
?>

</div>
</div>

		
	</body>
</html>