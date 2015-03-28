<html>
	<head>
	<?php include 'head.php' ?>
	</head>
	<body>
		<?php include 'topmenu.php'; ?>
		
<div id="wrapper">
    <div id="content">

<h1>Iniciar Sesión</h1>

<form action="login-engine.php" method="POST" enctype="multipart/form-data">

Usuario:<br>
<input type="text" name="user"><br><br>
Contraseña:<br>
<input type="password" name="password"><br><br>
<input type="submit" value="Iniciar Sesión">

</form>

</div>
</div>

		
	</body>
</html>