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
	if ($search['userlevel']!="R"){
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
	<?php
		$menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
		$menu->headerLinksJS();
		$menu->headerLinksCSS();
	?>
	<script type='text/javascript' src='js/patientsConsult.js'></script>
</head>
<body>
	<?php
	$menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
	$menu->createMenuReception();
	?>
	<div class="container margintopconteiner" id="consultas" >
		<form>
			<fieldset class="col-lg-12">
				<legend>Descripción de la Cita</legend>
				<div class="col-md-12">
					<div id="cal-heatmap">
					</div>
					<div class="btn-arrows-cal">
						<button id="cal-sign" class="btn input-sm btn-job-arrow" type="button" data-toggle="tooltip" data-placement="bottom" title="Tomar Signos"><span class="glyphicon glyphicon-user"></span></button>
						<button id="cal-start" class="btn input-sm btn-job-arrow" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
						<button id="cal-before" class="btn input-sm btn-job-arrow" type="button"><span class="glyphicon glyphicon-chevron-left"></span></button>
						<button id="cal-next" class="btn input-sm btn-job-arrow" type="button"><span class="glyphicon glyphicon-chevron-right"></span></button>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-groupx" >
						<table class="table table-style" id="updataproduct">
								<thead>
									<tr>
										<th>No.</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Paciente</th>
										<th>Edad</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>06/05/2014</td>
										<td>09:03 p.m.</td>
										<td>Rafael Samano</td>
										<td>24</td>
									</tr>
									<tr>
										<td>2</td>
										<td></td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>3</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>4</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>5</td>
										<td></td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>6</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>7</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>8</td>
										<td></td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>9</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>10</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr>
										<td>11</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
								</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<div class="clock">
							<div id="Date"></div>
							<ul>
								<li id="hours"></li>
								<li id="point">:</li>
								<li id="min"></li>
								<li id="point">:</li>
								<li id="sec"></li>
							</ul>
						</div>
					</div>
					<div class="col-md-12" id="divid">
						<label class="control-label form-group has-feedback">Id</label>
						<div class="input-back-job-lg form-group has-feedback">
							<input class="form-control input-sm input-job" id='idpatient' name='patient' type='text' placeholder='Abc...z' required>
						</div>
					</div>
					<div class="col-md-12">
						<label class="control-label form-group has-feedback">Paciente</label>
						<div class="input-back-job-lg form-group has-feedback">
							<input class="form-control input-sm input-job" id='patient' name='patient' type='text' placeholder='Abc...z' required>
						</div>
					</div>

					<div id="divsign" class=" col-md-12">
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">Pulso</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label-sm form-group has-feedback">PA</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">Temperatura</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">FR</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">FC</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">Peso</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">Talla</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
						<div class="col-md-3">
							<label class="control-label form-group has-feedback">IMC</label>
							<div class="input-back-job-sm form-group has-feedback">
								<input class="form-control input-sm input-job" id='' name='' type='text' placeholder='Abc...z' required>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label form-group has-feedback">Fecha</label>
						<div class="input-back-job-sm form-group has-feedback">
							<input class="form-control input-sm input-job" id='dates' name='dates' type='date' placeholder='Abc...z' required>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label form-group has-feedback">Hora</label>
						<div class="input-back-job-sm form-group has-feedback">
							<input class="form-control input-sm input-job" id='hour' name='hour' type='time' placeholder='Abc...z' required>
						</div>
					</div>
					<div class="col-md-12">
						<label class="control-label form-group has-feedback">Consultorio</label>
						<div class="input-back-job-lg form-group has-feedback">
							<select class="form-control input-sm input-job  select-job" id="office" name="office" required>
								<option value="">Consultorio: No seleccionado</option>
								<option value="1">Consultorio 1</option>
								<option value="2">Consultorio 2</option>
								<option value="3">Consultorio 3</option>
								<option value="4">Consultorio 4</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label class="control-label form-group has-feedback">Doctor</label>
						<div class="input-back-job-lg form-group has-feedback">
							<select class="form-control input-sm input-job  select-job" id="doctor" name="doctor" required>
								<option value="">Doctor: No seleccionado</option>
								<?php $doc=new selects();
									$doc->tabla="userlogin";
									$doc->campos="*";
									$doc->condicion="userlevel='D'";
									$docs=$doc->select_total();
									if ($docs!=false) {
										while ($auxDoc=mysql_fetch_array($docs)) {
								?>
								<option <?php echo "value='".$auxDoc['iduser']."'";?>><?php echo $auxDoc["name"]." ".$auxDoc['lastpaternal']." ".$auxDoc['lastmaternal'];?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label class="control-label form-group has-feedback">Tipo de la consulta</label>
						<div class="input-back-job-lg form-group has-feedback">
							<input class="form-control input-sm input-job" id='type' name='type' type='text' placeholder='Abc...z' required>
						</div>
					</div>
				</div>
				
			</fieldset>
			<div class="col-md-offset-4 col-md-1" id="btnreset">
				<button type="button" class="btn btn-job"><span class="glyphicon glyphicon-print"></span>     Imprimir</button>
			</div>
			<div class="col-md-offset-1 col-md-1" id="btnreset">
				<button type="button" class="btn btn-job"><span class="glyphicon glyphicon-remove"></span>     Eliminar</button>
			</div>
			<div class="col-md-offset-1 col-md-1" id="btnreset">
				<button type="reset" class="btn btn-job"><span class="glyphicon glyphicon-trash"></span>     Limpiar</button>
			</div>
			<div class="col-md-offset-1 col-md-1" id="btnsubmit">
				<button type="submit" id="btnSubmit" class="btn btn-job"><span class="glyphicon glyphicon-ok"></span>     Agregar</button>
			</div>
			
		</form>
	</div>
	<script type="text/javascript">
	$(document).on('ready',main);
	function main(){
		$("#cal-sign").tooltip();
	}
	</script>
</body>
<?php
}
?>