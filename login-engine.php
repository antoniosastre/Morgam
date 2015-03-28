<html>
	<head>
	<?php include 'head.php' ?>
	</head>
	<body>
		<?php include 'topmenu.php'; ?>
		
<div id="wrapper">
    <div id="content">

<?php

	if(!isset($_COOKIE['morgam'])){

		if(!empty($_POST['user']) && !empty($_POST['password'])){

			if(logincredentials($_POST['user'],$_POST['password'])){
				
				setcookie('morgam', $_POST['user']."-and-".lastgivencookie($_POST['user']), time() + (86400 * 7), "/"); // 86400 = 1 day

			}else{

				echo "Usuario / contraseña incorrecto.";

			}

		}else{

			echo "Usuario / contraseña incorrecto.";

		}


	}else{

		echo "Ya tiene una sesión iniciada.";

	}

?>

</div>
</div>

		
	</body>
</html>