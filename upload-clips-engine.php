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

<!-- Insertar el código aquí. -->

<?
}
?>

</div>
</div>

		
	</body>
</html>