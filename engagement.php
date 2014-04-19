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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css" />	
</head>
<body>
	<div id="headernav" class='sticky-wrapper'>
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
		            <li><a href="engagement.php">Contratación</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Actualización</a></li>
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
	</div>	
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
		<form role="form" class="col-lg-12" id="engagement" action='addEngagement.php' method="post">
			<div class="col-md-8">
				<fieldset>
					<legend><span class="glyphicon glyphicon-chevron-down icoslide"></span>Agregar Empleado</legend>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label  form-group has-feedback">Nombre</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id='name' name='name' type='text' required='true' placeholder='Abc...z' required >
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group  col-lg-12">
							<label class="control-label" for="clasification">Apellido Paterno</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id='lastpaternal' name='lastpaternal' type='text' required placeholder='Abc...z' >
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Apellido Materno</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id='lastmaternal' name='lastmaternal' type='text' required placeholder='Abc...z' >
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Email</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id="email" name="email" type="email" required placeholder="Abc...z@job.com">

							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Contraseña</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id="password" name="password" type="password" required placeholder="Abc...z123456789">
							</div>
						</div>
						<div class="form-group col-lg-12">
							<div class="progress progress-striped progressbar">
							  <div id="progressbarpass" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
							  </div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Confirma Contraseña</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id="password1" name="password1" type="password" required placeholder="Abc...z">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-offset-8">
						<button type="submit" class="btn btn-job">Agregar</button>
					</div>
				</fieldset>
			</div>
		</form>
		<form role="form" class="col-lg-12" id="engagementDescription" action='updateEngagement.php' method="post">
			<div class="col-lg-12">
				<fieldset>
					<legend>Datos Personales</legend>
					<div class="col-md-5">
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Estado</label>
								<select class="form-control input-lg input-job  select-job" id="state" name="state">
								  <option value="A">Activo</option>
								  <option value="C">Desactivo</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Cedula Profesional</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="license" name="license" type="text" required placeholder="1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">IFE</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="ife" name="ife" type="email" required placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">RFC</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="rfc" name="rfc" type="text" required placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">CURP</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="email" name="email" type="email" required placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Teléfono Fijo</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="phone" name="phone" type="text" required placeholder="000-000-0000">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Teléfono Móvil</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="mobil" name="mobil" type="text" required placeholder="000-000-0000">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Estado Marital </label>
								<select class="form-control input-lg input-job  select-job" id="marital" name="marital">
								  <option value="1">Casado</option>
								  <option value="0">Soltero</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Edad</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="age" name="age" type="text" required placeholder="1234567890">

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-offset-2 col-md-5">
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Fecha de Nacimiento</label>
							<input class="form-control input-lg input-job select-job" id="borndate" name="borndate" type="date" required placeholder="">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Sexo</label>
								<select class="form-control input-lg input-job  select-job" id="sex" name="sex">
								  <option value="H">Hombre</option>
								  <option value="M">Mujer</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Calle</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="street" name="street" type="text" required placeholder="Abc...z">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Número Exterior e Interior</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="number" name="number" type="text" required placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Colonia</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="colonia" name="colonia" type="text" required placeholder="Abc...z">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Comunidad</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="comunity" name="comunity" type="text" required placeholder="Abc...z">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Municipio</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="municipaly" name="municipaly" type="text" required placeholder="Abc...z">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Código Postal</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="codep" name="codep" type="text" required placeholder="1234567890">

								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<div class="col-md-offset-5 col-md-1">
					<button type="button" class="btn btn-job" id="cancel">Cancelar</button>
				</div>
				<div class="col-md-offset-1 col-md-1">
					<button type="submit" class="btn btn-job" id="updata">Actualizar</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src="js/jquery.complexify.js"></script>
	<script type="text/javascript" src="js/engagement.js"></script>
	<script type="text/javascript">
	$(document).on("ready",function(){
	
	});
	</script>
</body>
<?php
}
?>