<nav class="navbar navbar-inverse navbar-static-top">
	    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Morgam FreeMAM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
        <li><a href="list.php">Lista</a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ir a...<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><form action="video.php" method="GET" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" name="id" placeholder="Video ID">
        </div>
    
      </form></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li><a href="upload-video.php">Subir vídeo</a></li>

      </ul>
      <form action="search.php" method="GET" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="q" placeholder="Buscar vídeo">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">

<?php

if(isValidCookie("morgam")){

	echo "<li class=\"dropdown\">
          <a href=\"user.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".userShowNameByUser(explode("-and-", $_COOKIE['morgam'])[0])."<span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\" role=\"menu\">
          	<li><a href=\"user.php\"> Página de usuario</a></li>
          	<li class=\"divider\"></li>
            <li><a href=\"user.php?a=close\">Cerrar Sesión</a></li>
          </ul>
        </li>";

}else{
	echo "<li><a href=\"login.php\">Iniciar Sesión</a></li>";
}

?>

        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>