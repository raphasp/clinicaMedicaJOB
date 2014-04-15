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
		<form role="form" class="col-lg-12" id="providerProduct">
			<div class="col-md-8">
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
									<td><i class="glyphicon glyphicon-leaf"></i>Precio adquisición</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Precio de venta</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Sustancia activa</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Envase</td>
									<td>rafasqaslajdlvsdsdvdsvsdvsdvsd/dvsvsdvevdgdsrfhtdjhf
										457\578\44758\47586975587</td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Unidad dosis</td>
									<td></td>
								</tr>
								<tr>
									<td><i class="glyphicon glyphicon-leaf"></i>Actualizar</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>					
				</fieldset>
			</div>
			<div class="col-md-3 col-md-offset-1">
				<fieldset>
					<legend>Stock en Almacén</legend>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Cantidad Existente</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="amount" name="amount" type="text" required placeholder="0123456789" data-toggle="tooltip" data-placement="" title="" readonly>
							</div>							
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label">Cantidad de Suministro</label>
							<div class="input-back-job">
								<input class="form-control input-lg input-job" id="newamount" name="newamount" type="text" required placeholder="0123456789" data-toggle="tooltip" data-placement="" title="">
							</div>	
						</div>
					</div>
					<div class="">
						<button type="submit" class="btn btn-job">Actualizar</button>
					</div>
				</fieldset>
			</div>	
		</form>
		<div class="col-lg-12 data-updata">
			<fieldset>
					<legend>Actualización de Producto</legend>
					<div class="col-md-offset-1 col-md-10">
						<div class="form-group">
							<table class="table table-style" id="updataproduct">
								<thead>
									<tr>
										<th>Cantidad previa</th>
										<th>Cantidad de suministro</th>
										<th>Cantidad actual</th>
										<th>Ventas</th>
										<th>Fecha de actualización</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>12</td>
										<td>121</td>
										<td>12</td>
										<td>12</td>
										<td>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    31/02/89
                                                </div>
                                                <div class="col-lg-6">
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                </div>
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>12</td>
										<td>12</td>
										<td>12</td>
										<td>12</td>
										<td>21</td>
									</tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>121</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
								</tbody>
							</table>
						</div>
					</div>					
				</fieldset>
		</div>
	</div>
     <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.numeric.js"></script>
    <script type="text/javascript" src="js/stockregister.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="js/jquery.stickyheader.js"></script>
    <script type="text/javascript">
        $("#newamount").numeric();
    </script>
</body>