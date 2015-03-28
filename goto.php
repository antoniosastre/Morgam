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

<h1>Ir a...</h1><br>

<table>
	<tr>
		<td>
			Vídeo:
		</td>
		<td>
<form action="video.php" method="get">
 <input type="text" name="id"> <input type="submit" value="Ir al vídeo">
</form> 
</td>
</tr>
<tr>
	<td>
		Grupo de clips:
	</td>
	<td>
<form action="clipgroup.php" method="get">
 <input type="text" name="id"> <input type="submit" value="Ir al grupo">
</form>
	</td>
</tr>
<tr>
	<td>
		Clip:
	</td>
	<td>
<form action="clip.php" method="get">
 <input type="text" name="id"> <input type="submit" value="Ir al clip">
</form>
	</td>
</tr>
</table>

<?
}
?>

</div>
</div>

		
	</body>
</html>