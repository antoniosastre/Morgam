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
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
        <li><a href="list.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Lista</a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a...<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><form action="video.php" method="GET" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" name="id" placeholder="Video ID">
        </div>
    
      </form></li>
     
            <li class="divider"></li>

<li><form action="user.php" method="GET" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" name="u" placeholder="Usuario">
        </div>
    
      </form></li>

  
            <li class="divider"></li>
          </ul>
        </li>

        <li><a href="upload-video.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Subir vídeo</a></li>

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
          	<li><a href=\"user.php\"><span class=\"glyphicon glyphicon-film\" aria-hidden=\"true\"></span>  Página de usuario</a></li>
          	<li class=\"divider\"></li>
            <li><a href=\"user.php?a=close\"><span class=\"glyphicon glyphicon-log-out\" aria-hidden=\"true\"></span> Cerrar Sesión</a></li>
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