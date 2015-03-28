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

<h1>Subir clips</h1><br>

<?
}
?>

</div>
</div>

		
	</body>
</html>