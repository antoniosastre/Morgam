<?php

if($_GET['a']=="close"){
	setcookie('morgam', $_POST['user'], time() - 86400, "/"); // 86400 = 1 day
}

?>


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

	$userdata = userDataByUser(explode("-and-", $_COOKIE['morgam'])[0]);

	if(!isset($_GET['u'])){

		echo "<h1>".$userdata['showname']."</h1>";

	}else{

		echo "<h1>".userShowNameByUser($_GET['u'])."</h1>";

	}

	if(!isset($_GET['u']) || $_GET['u'] == $userdata['user']){

		echo "<a href=\"user.php?a=close\">Cerrar sesión</a><br><br>";

	}
?>
<br><br><br>
<form action="user.php" method="GET">
<?php
if(!isset($_GET['u'])){
		echo "<input type=\"hidden\" name=\"u\" value=\"".$userdata['user']."\">";
	}else{
		echo "<input type=\"hidden\" name=\"u\" value=\"".$_GET['u']."\">";
	}
?>
Año: <select name="y">
  <?php
  	foreach (videoYears() as $year) {
 		if(!empty($year)) echo "<option value=\"".$year."\">".$year."</option>\n";
  	}
  ?>
</select>
<input type="submit" value="Listar">
</form>
<form action="user.php" method="GET">
<?php
if(!isset($_GET['u'])){
		echo "<input type=\"hidden\" name=\"u\" value=\"".$userdata['user']."\">";
	}else{
		echo "<input type=\"hidden\" name=\"u\" value=\"".$_GET['u']."\">";
	}
?>
Desde: <input type="month" name="f"> Hasta: <input type="month" name="t">
<input type="submit" value="Listar">
</form>
<form action="user.php" method="GET">
<?php
if(!isset($_GET['u'])){
		echo "<input type=\"hidden\" name=\"u\" value=\"".$userdata['user']."\">";
	}else{
		echo "<input type=\"hidden\" name=\"u\" value=\"".$_GET['u']."\">";
	}
?>
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
	echo tableOfYear($_GET['y'],$_GET['u']);
}

if(!empty($_GET['f']) && !empty($_GET['t'])){
	echo "Se muestra desde el ".explode('-', $_GET['f'])[1]."/".explode('-', $_GET['f'])[0]." hasta el ".explode('-', $_GET['t'])[1]."/".explode('-', $_GET['t'])[0].":";
	echo "<hr>";
	echo tableOfInterval($_GET['f'], $_GET['t'],$_GET['u']);
}

if(!empty($_GET['d'])){
	echo "Se muestran los últimos ".$_GET['d']." días:";
	echo "<hr>";
	echo tableOfLast($_GET['d'],$_GET['u']);
}

?>







<?
}
?>

</div>
</div>

		
	</body>
</html>