<!DOCTYPE html>
<?php
	include("class/xmlstruct.php");
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
	          <a href="#" id="nameuser"><i id="ic_user" class="glyphicon glyphicon-user"></i>Rafael Samano Pichardo</a>
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
        			<li><b>rapha@jpb.com</b></li>
        			<li>Estado: <b>Activo</b></li>
        		</ul>
        	</div>
        </div>
        <button class="btn btn-job">Cerrar Sesion</button>
      </div>
    </div>
	<div class="container" >
		<form role="form" class="col-lg-12" id="addProduct">
			<div class="col-md-5">
				<fieldset>
					<legend>Datos del medicamento</legend>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Código de Barras</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id='codebar' name='codebar' type='text' required='true' placeholder='0123556789' data-toggle="tooltip" data-placement="top" title="Código de barras">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group  col-lg-12">
							<label class="control-label" for="clasification">Clasificación</label>
							<select class="form-control input-lg input-job select-job" id="clasification" name="clasification">
							  <option value='medicamento' selected="selected">Farmacéuticos</option>
							  <option value='parafarmacia'>Parafarmacéuticos</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12" id="divclasification">
						<div class="form-group col-lg-12">
							<label class="control-label">Códigoo Nacional</label>
							<select class="form-control input-lg input-job  select-job" id="nacionalcode" name="nacionalcode">
							  <option value="A">Alimento</option>
							  <option value="C">Cosmético y productos de higiene personal</option>
							  <option value="P">Productos de higiene personal</option>
							  <option value="B">Biosida</option>
							  <option value="M">Productos milagro</option>
							  <option value="OP">Otros productos</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Nombre Comercial</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="comercialname" name="comercialname" type="text" required placeholder="Abc...z" data-toggle="tooltip" data-placement="" title="">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Descripción</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="description" name="description" type="text" required placeholder="Abc...z" data-toggle="tooltip" data-placement="" title="">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Laboratorio</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="laboratory" name="laboratory" type="text" required placeholder="Abc...z" data-toggle="tooltip" data-placement="" title="">
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-5 col-md-offset-2">
				<fieldset>
					<legend>Descripción de venta</legend>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Fecha de expiración</label>
							<input class="form-control input-lg input-job select-job" id="laboratory" name="laboratory" type="date" required placeholder="Abc...z" data-toggle="tooltip" data-placement="" title="">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Precio de adquisición</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="purchaseprice" name="purchaseprice" type="text" required placeholder="00.00" data-toggle="tooltip" data-placement="" title="">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Precio de venta</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="saleprice" name="saleprice" type="text" required placeholder="00.00" data-toggle="tooltip" data-placement="" title="">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-offset-8">
						<button type="submit" class="btn btn-job">Agregar</button>
					</div>
				</fieldset>
			</div>	
		</form>
		<form role="form" class="col-lg-12" id="dataProduct">
			<div class="col-md-7">
				<fieldset>
					<legend>Datos del medicamento</legend>
					<div class="col-lg-12">
						<div class="form-group">
							<table class="table table-job">
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Código de Barras</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Clasificación</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Nombre Comercial</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Descripción</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Laboratorio</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Fecha de expiración </td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Precio de adquisición</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Precio de venta</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>					
				</fieldset>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<fieldset>
					<legend>Descripción de venta</legend>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Sustancia activa</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="activesubtance" name="activesubtance" type="text" required placeholder="Abc...z/Abc...z/etc." data-toggle="tooltip" data-placement="" title="">
							</div>							
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Envase</label>
							<select id="containerSelect" class="form-control input-lg input-job  select-job">
								<?php
									$dir="xml/DICCIONARIO_ENVASES.xml";
									$xml=new xmlstruct($dir);
									$xml->Container();
								?>		
							</select>					
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Unidad dosis</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="unity" name="unity" type="text" required placeholder="Abc...123 unidad" data-toggle="tooltip" data-placement="" title="">
							</div>	
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Vía de administración</label>
							<select id="routeAdminidtrator" class="form-control input-lg input-job  select-job">
								<?php
									$dir2="xml/DICCIONARIO_VIAS_ADMINISTRACION.xml";
									$xmls=new xmlstruct($dir2);
									$xmls->routeAdminidtrator();
								?>			
							</select>					
						</div>
					</div>
					<div class="col-lg-4 col-md-offset-8">
						<button type="submit" class="btn btn-job">Actualizar</button>
					</div>
				</fieldset>
			</div>	
		</form>
	</div>
</body>