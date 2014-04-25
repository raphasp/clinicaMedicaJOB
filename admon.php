<!DOCTYPE html>
<?php
	include("class/class.mysql.php");
	include("class/class.select.php");
	include("class/class.encryp.php");
	include("class/class.security.php");
	$id=$_SESSION['iduser'];
	$cadena=new encryp();
	$encode=$cadena->decrypt($id);
	$condition="iduser='".$encode."'";
	$bus=new selects();
	$bus->condicion=$condition;
	$bus->tabla='userlogin';
	$search=$bus->seleccion();
	if ($search['userlevel']!=0){
		header("Location:index.html");
	}
	else{
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Clínica Médica JOB</title>
	<meta name="description" content="Centro Medico JOB" />
	<meta name="keywords" content="" />
	<meta name="author" content="think" />
	<link rel="shortcut icon" type="image/png" href="ic_job.png">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css" />
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.numeric.js"></script>
	<script type="text/javascript" src="js/stockregister.js"></script>		
</head>
<body>
	<nav class="navbar navbar-default" role="navigation" id="navmenu">
	<hr class='style-one'>
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">
	      	<div class="logomenu">
	      		<img src="img/ic_job_menu.png" class="img-responsive">Clínica Médica JOB
	      	</div>
	      </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="admonengagement.php">Contratación</a></li>
	            <li class="divider"></li>
	            <li><a href="admonengagement.php">Actualización</a></li>
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Almacen <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Agregar</a></li>
	            <li><a href="#">Proveer</a></li>
	            <li><a href="#">Clinica</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar">
	        </div>
	        <button type="submit" class="btn"><i class="glyphicon glyphicon-search"></i></button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" id="nameuser"><i id="ic_user" class="glyphicon glyphicon-user"></i><?php echo $search['name']." ".$search['lastpaternal']." ".$search['lastmaternal'];?></a>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="perfilmenu" id="perfiluser">
      <div class="arrow">
      	<div class="subarrow"></div>
      </div>
      <h4 class="perfilmenu-title">Administrador de Almacen</h4>

      <div class="perfilmenu-content">
        <div class="row">
        	<div class="col-lg-1"></div>
        	<div class="col-lg-10">
        		<ul>
        			<li><b><?php echo $search['email'];?></b></li>
        			<li>Estado: <b>Activo</b></li>
        		</ul>
        	</div>
        </div>
        <button class="btn btn-job">Cerrar Sesion</button>
      </div>
    </div>
	<div class="container" >
		<div class='col-lg-12 img-style'>
			<img src="img/jobclinica-512.png" class="img-responsive" alt="Logo del Clinica Medica JOB">
		</div>
	</div>
</body>
<?php
}
?>