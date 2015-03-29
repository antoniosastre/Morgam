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

<h1>Inicio</h1>

<?php

require_once 'functions.php';

$hddtotal = disk_total_space("storage/");
$hddfree = disk_free_space("storage/");
$hddused = $hddtotal-$hddfree;
$hddmath = $hddfree / $hddtotal * 100;
$hdd = round($hddmath,2);
$hddrem = 100-$hdd;

?>

<h3>Uso de disco</h3>
<div class="progress">
  <div class="progress-bar progress-bar-<?php echo progressBarWord($hddrem); ?> progress-bar-striped active" role="progressbar"
  aria-valuenow="<?php echo $hddused; ?>" aria-valuemin="0" aria-valuemax="<?php echo $hddtotal; ?>" style="width:<?php echo $hddrem; ?>%">
    <div style="color: black;"><?php echo "Uso ".$hddrem."% - Libre ".bytesToSizeString($hddfree); ?></div>
  </div>
</div>

<?
}
?>

</div>
</div>

		
	</body>
</html>