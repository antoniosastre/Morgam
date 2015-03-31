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
	<?php require_once 'head.php' ?>
	</head>
	<body>
		<?php require_once 'topmenu.php'; ?>
		
<div class="container">

<h1>Lista</h1><br>

<form action="list.php" method="GET">
Año: <select name="y">
  <?php
  	foreach (videoYears() as $year) {
 		if(!empty($year)) echo "<option value=\"".$year."\">".$year."</option>\n";
  	}
  ?>
</select>
<input type="submit" value="Listar">
</form>
<form action="list.php" method="GET">
Desde: <input type="month" name="f"> Hasta: <input type="month" name="t">
<input type="submit" value="Listar">
</form>
<form action="list.php" method="GET">
Últimos: <select name="d">
  <option value="1">Hoy</option>
  <option value="2">2 Días</option>
  <option value="5">5 Días</option>
  <option value="7">7 Días</option>
  <option value="15">15 Días</option>
  <option value="30">30 Días</option>
</select>
<input type="submit" value="Listar">
</form>

<hr>
<?php

if(!empty($_GET['y'])){
	echo "Se muestran todos los vídeos de ".$_GET['y'].":";
	echo "<hr>";
	echo tableOfYear($_GET['y']);
}

if(!empty($_GET['f']) && !empty($_GET['t'])){
	echo "Se muestra desde el ".explode('-', $_GET['f'])[1]."/".explode('-', $_GET['f'])[0]." hasta el ".explode('-', $_GET['t'])[1]."/".explode('-', $_GET['t'])[0].":";
	echo "<hr>";
	echo tableOfInterval($_GET['f'], $_GET['t']);
}

if(!empty($_GET['d'])){
	echo "Se muestran los últimos ".$_GET['d']." días:";
	echo "<hr>";
	echo tableOfLast($_GET['d']);
}

?>

</div>

		
	</body>
</html>

<?
}
?>