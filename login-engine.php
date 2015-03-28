<html>
	<head>
	<?php include 'head.php';

	if(!isset($_COOKIE['morgam'])){

		if(!empty($_POST['user']) && !empty($_POST['password'])){

			if(logincredentials($_POST['user'],$_POST['password'])){
				
				setcookie('morgam', $_POST['user']."-and-".lastgivencookie($_POST['user']), time() + (86400 * 7), "/"); // 86400 = 1 day
				$loginerror = 0;

			}else{
				$loginerror = 1;
			}
		}else{
			$loginerror = 1;
		}
	}else{
		$loginerror = 2;

	}

?>

	</head>
	<body>

<?php include 'topmenu.php'; ?>
		
<div id="wrapper">
    <div id="content">

<?php

switch ($loginerror) {
	case 0:
		echo "Sesión iniciada.";
		break;

	case 1:
		echo "Combinación de Usuario / Contraseña incorrecta.";
		break;

	case 2:
		echo "Ya tiene una sesión iniciada.";
		break;
	
	default:
		echo "Error en el inicio de sesión.";
		break;
}

?>

</div>
</div>

		
	</body>
</html>