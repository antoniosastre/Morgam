<?php
	echo "<div id=\"nav\">
	    <div id=\"nav-wrapper\">
	        <ul>
	        	<li>";
	include 'db.php';
	echo "</li>
	            <li><a href=\"index.php\">Inicio</a></li>
	            <li><a href=\"search.php\">Buscar</a></li>
	            <li><a href=\"list.php\">Lista</a></li>
	            <li><a href=\"upload-video.php\">Subir Vídeo</a></li>
	            <li><a href=\"upload-clips.php\">Subir Clips</a></li>
	            <li><a>|</a></li>
	            <li><a href=\"user.php\">Usuario</a></li>
	        </ul>
	    </div>
	</div>";
?>