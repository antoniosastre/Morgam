<html>
	<head>
	<?php include 'head.php';

if(isValidCookie("morgam")){
		?>
<script type="text/javascript">

	
	$(function(){


            var people = <?php echo json_encode(peopleArray()); ?>;
            var places = <?php echo json_encode(placesArray()); ?>;
            var tags = <?php echo json_encode(tagsArray()); ?>;


    $(document).ready(function() {
            $('.input_people').tagit({
                availableTags: people,
                allowSpaces: true
            });

            $('.input_places').tagit({
                availableTags: places,
                allowSpaces: true
            });

            $('.input_tags').tagit({
                availableTags: tags,
                allowSpaces: true
            });
    });

    });
</script>

<? } ?>


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