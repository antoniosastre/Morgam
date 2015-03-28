<div id="nav">
	    <div id="nav-wrapper">
	        <ul>
	        	<li><?php echo dbstatus(); ?></li>
	            <li><a href="index.php">Inicio</a></li>
	            <li><a href="goto.php">Ir a...</a></li>
	            <li><a href="search.php">Buscar</a></li>
	            <li><a href="list.php">Lista</a></li>
	            <li><a href="upload-video.php">Subir Vídeo</a></li>
	            <li><a href="upload-clips.php">Subir Clips</a></li>
	            <li><a>|</a></li>
	            <li>

<?php

if(isset($_COOKIE['morgam'])){
	echo "<a href=\"user.php\">".userShowNameByUser(explode("-and-", $_COOKIE['morgam'])[0])."</a>";
}else{
	echo "<a href=\"login.php\">Iniciar Sesión</a>";
}

?>


	            </li>
	        </ul>
	    </div>
	</div>