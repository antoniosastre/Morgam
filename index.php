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

</div>

</body>
</html>


<?
}
?>