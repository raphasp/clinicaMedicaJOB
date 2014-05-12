<!DOCTYPE html>
<?php
	include("class/class.mysql.php");
	include("class/class.select.php");
	include("class/class.encryp.php");
	include("class/class.security.php");
	include("class/class.menu.php");
	$id=$_SESSION['iduser'];
	$cadena=new encryp();
	$encode=$cadena->decrypt($id);
	$condition="iduser='".$encode."'";
	$bus=new selects();
	$bus->condicion=$condition;
	$bus->tabla='userlogin';
	$search=$bus->seleccion();
	if ($search['userlevel']!="A"){
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
	<?php
	$menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
	$menu->createMenu();
	?>
    <div class="container">
    			<div class="col-lg-12 data-updata">
			<fieldset>
					<legend>Status de los Empleados</legend>
					<div class="col-md-offset-1 col-md-10">
						<div class="form-group">
							<table class="table table-style" id="updataproduct">
								<thead>
									<tr>
										<th>Nombre Completo</th>
										<th>Cargo</th>
										<th>Móvil</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="engagementbody">
									
								</tbody>
							</table>
						</div>
					</div>					
				</fieldset>
		</div>
    </div>
	<div class="container">
		<div class="col-lg-12 tabcol">
			<div id="Add-empleado" class="col-lg-12">
				<h3><span id="iconAdd" class="glyphicon glyphicon-expand icoslide"></span>Agregar Empleado</h3>
			</div>
			<div id="Update-empleado" class="col-lg-12">
				<h3 ><span class="glyphicon glyphicon-expand icoslide"></span>Actualizar Datos de Empleado</h3>
			</div>
		</div>	
		<form role="form" class="col-lg-12" id="engagement" action='addEngagement.php' method="post">
			<div class="col-md-8">	
					<div class="col-lg-12" id="divid">
						<div class="form-group col-lg-12">
							<label class="control-label  form-group has-feedback">Id</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id='iduser' name='iduser' type='text' placeholder='Abc...z'>
							</div>
						</div>
					</div>		
					<div class="col-lg-12">
						<div class="form-group col-lg-12">
							<label class="control-label  form-group has-feedback">Nombre</label>
							<div class="input-back-job-lg form-group has-feedback">
								<input class="form-control input-lg input-job" id='name' name='name' type='text' required placeholder='Abc...z'>
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
							<label class="control-label">Puesto</label>
							<select class="form-control input-lg input-job select-job" id="position" name="position" required>
								<option value=""></option>
								   <option value="A">Administrador </option>
								   <option value="D">Doctor(a)</option>
								   <option value="E">Enfermero(a)</option>
								   <option value="F">Farmaceuta </option>
								   <option value="M">Mantenimiento</option>
								   <option value="R">Recepcionista</option>
							</select>
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
				</div>

		<div class="col-lg-12">
				<fieldset>
					<legend>Datos Personales</legend>
					<div class="col-md-5">
						<div class="col-lg-12">
							<div class="form-group col-lg-6">
								<label class="control-label">Estado</label>
								<select class="form-control input-lg input-job  select-job" id="state" name="state" required>
									<option value=""></option>
								  	<option value="A">Activo</option>
								  	<option value="C">Desactivo</option>
								</select>
							</div>
							<div class='form-group col-lg-6'>
								<label>Campos Requeridos</label>
								<button type='button' class="btn btn-job" id="showfield"><span class="glyphicon glyphicon-ok-circle"></span></button>
							</div>
						</div>
						<div class="col-lg-12" id="divspeciality">
							<div class="form-group col-lg-12">
								<label class="control-label">Especialidad</label>
								<select class="form-control input-lg input-job  select-job" id="speciality" name="speciality">
									<option value=""></option>
									<?php 
										$allsp=new selects();
										$allsp->campos="*";
										$allsp->tabla='speciality order by name ASC ';
										$allspe=$allsp->select_multi2();
										if($allspe!=false){
											while($Aux=mysql_fetch_array($allspe)){
												echo "<option value='".$Aux['Id']."'>".$Aux['name']."</option>";
											}
										}else{
										}?>
								</select>
							</div>
						</div>
						<div class="col-lg-12" id="divlicense">
							<div class="form-group col-lg-12">
								<label class="control-label">Cedula Profesional</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="license" name="license" type="text" placeholder="1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">IFE</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="ife" name="ife" type="text" required placeholder="Abc...z1234567890">

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
									<input class="form-control input-lg input-job" id="curp" name="curp" type="text" required placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Teléfono Fijo</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="phone" name="phone" type="text" placeholder="000-000-0000">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Teléfono Móvil</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="mobil" name="mobil" type="text" placeholder="000-000-0000">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Estado Marital </label>
								<select class="form-control input-lg input-job  select-job" id="marital" name="marital" required>
									<option value=""></option>
								  	<option value="1">Casado(a)</option>
								  	<option value="0">Soltero(a)</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Fecha de Nacimiento</label>
							<input class="form-control input-lg input-job select-job" id="borndate" name="borndate" type="date" required placeholder="">
							</div>
						</div>	
					</div>
					<div class="col-md-offset-2 col-md-5">
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Edad</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="age" name="age" type="text" required placeholder="1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Sexo</label>
								<select class="form-control input-lg input-job  select-job" id="sex" name="sex" required>
									<option value=""></option>
								  	<option value="H">Hombre</option>
								  	<option value="M">Mujer</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Calle</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="street" name="street" type="text" placeholder="Abc...z">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Número Exterior e Interior</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="number" name="number" type="text" placeholder="Abc...z1234567890">

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Colonia</label>
								<div class="input-back-job-lg form-group has-feedback">
									<input class="form-control input-lg input-job" id="colonia" name="colonia" type="text" placeholder="Abc...z">

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
									<input class="form-control input-lg input-job" id="codep" name="codep" type="text" placeholder="1234567890">

								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<div class="col-md-offset-5 col-md-1" id="btnreset">
					<button type="reset" class="btn btn-job">Cancelar</button>
				</div>
				<div class="col-md-offset-1 col-md-1" id="btnsubmit">
					<button type="submit" id="btnSubmit" class="btn btn-job">Agregar</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src="js/jquery.complexify.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>
    <script type="text/javascript" src="js/jquery.numeric.js"></script>
    <script type="text/javascript" src="js/jquery.stickyheader.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="js/engagement.js"></script>
	<script type="text/javascript">
	$(document).on("ready",function(){
	});
	</script>
</body>
<?php
}
?>