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

<h1>Subir Vídeo</h1><br>

<form action="upload-video-engine.php" method="post" enctype="multipart/form-data">
    
	Título: <br>
	<input type"text" name="title" id="title"><br><br>

	Grabado el:<br>
	<input type="date" name="recorded_when" id="recorded_when"><br><br>

	Personas: <br>
	<input name="people" class="input_people">
	<br>

	Lugares: <br>
	<input name="places" class="input_places">
	<br>

	Etiquetas: <br>
	<input name="tags" class="input_tags">
	<br>

	Archivo: <br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

    Enviar: <br>
    <input type="submit" value="Subir Vídeo" name="submit"><br><br>

</form>

<?
}
?>

</div>
</div>

		
	</body>
</html>