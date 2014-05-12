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
	<script type='text/javascript' src='js/patientsAdd.js'></script>
</head>
<body>
	<?php
	$menu->createMenuReception();
	?>
	<div class="container margintopconteiner" >
		<form role="form" class="col-lg-12" id="patientAdd" action='class/patientAdd.php' method="post">
			<fieldset class="col-lg-12">
				<legend><p id="showfield" class="tabicon" data-toggle="tooltip" data-placement="left" title="Mostrar campos requeridos"><i class="glyphicon glyphicon-ok-circle"></i></p>Ficha del paciente</legend>
				<div class="btn-arrows-cal">
					<a id="print-patient" href="patientSearch-R.php" class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Imprimir Expediente"><span class="glyphicon glyphicon-print"></span></a>
					<a id="add-patient" class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Nuevo Paciente"><span class="glyphicon glyphicon-plus" ></span></a>
					<a id="search-patient" href="patientSearch-R.php" class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Buscar Paciente"><span class="glyphicon glyphicon-search"></span></a>
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Nombre</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='name' name='name' type='text' placeholder='Abc...z' required>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Apellido Paterno</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job" id='app' name='app' type='text' placeholder='Abc...z' required>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Apellido Materno</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job" id='apm' name='apm' type='text' placeholder='Abc...z' required>
					</div>
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Sexo</label>
					<div class="input-back-job-sm form-group has-feedback">
						<select class="form-control input-sm input-job  select-job" id="sex" name="sex" required>
							<option value=""></option>
							<option value="H">Hombre</option>
							<option value="M">Mujer</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Fec de Nac</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job select-job" id="borndate" name="borndate" type="date" required placeholder="">
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Edad</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job" id='age' name='age' type='text' placeholder='0123456789' required>
					</div>
					
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Grp. Sanguíneo </label>
					<div class="input-back-job-sm form-group has-feedback">
						<select class="form-control input-sm input-job  select-job" id="bloodgroup" name="bloodgroup">
							<option value=""></option>
						  	<option value="O+">O+</option>
						  	<option value="A+">A+</option>
						  	<option value="B+">B+</option>
						  	<option value="AB+">AB+</option>
						  	<option value="O−">O−</option>
						  	<option value="A−">A−</option>
						  	<option value="B−">B−</option>
						  	<option value="AB−">AB−</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Teléfono Fijo</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='phone' name='phone' type='text' placeholder='(999)-999-9999'>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Teléfono Móvil</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='cellphone' name='cellphone' type='text' placeholder='(999)-999-9999'>
					</div>
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Estado Marital</label>
					<div class="input-back-job-sm form-group has-feedback">
						<select class="form-control input-sm input-job  select-job" id="marital" name="marital">
							<option value=""></option>
							<option value="Soltero[a]">Soltero[a]</option>
							<option value="Casado[a]">Casado[a]</option>
							<option value="Unión libre">Unión libre</option>
							<option value="Divorciado[a]">Divorciado[a]</option>
							<option value="Viudo[a]">Viudo[a]</option>
						</select>
					</div>
				</div>
				<div class="col-md-7 col-md-offset-1" id="divaddress">
					<label class="control-label form-group has-feedback">Dirección</label>
					<div class="input-back-job-lg form-group has-feedback">
						<input class="form-control input-sm input-job " id='address' name='address' type='text' placeholder='Calle, Colonía y No.' required>
					</div>
				</div>
				<div class="col-md-3" id="divcommunity">
					<label class="control-label form-group has-feedback">Localidad</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job" id='community' name='community' type='text' placeholder='Abc...z' required>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1" id="divmunicipaly">
					<label class="control-label form-group has-feedback">Municipio</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='municipaly' name='municipaly' type='text' placeholder='Abc...z' required>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Código Postal</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='code' name='code' type='text' placeholder='Abc...z'>
					</div>
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Escolaridad</label>
					<div class="input-back-job-sm form-group has-feedback">
						<select class="form-control input-sm input-job  select-job" id="levelschool" name="levelschool">
							<option value="">Escolaridad: Seleccionar</option>
							<option value="Sin Estudios">Sin Estudios</option>
							<option value="Primaria">Primaria</option>
							<option value="Secundaria">Secundaria</option>
							<option value="Preparatoria">Preparatoria</option>
							<option value="Universidad ">Universidad </option>
							<option value="Posgrado">Posgrado</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Profesión u ocupación</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='profesional' name='profecional' type='text' placeholder='Abc...z'>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<label class="control-label form-group has-feedback">Religión</label>
					<div class="input-back-job-sm form-group has-feedback">
						<input class="form-control input-sm input-job " id='religion' name='religion' type='text' placeholder='Abc...z'>
					</div>
				</div>
				<div class="col-md-3">
					<label class="control-label form-group has-feedback">Email</label>
					<div class="input-back-job-lg form-group has-feedback">
						<input class="form-control input-sm input-job " id='email' name='email' type='email' placeholder='Abc...z'>
					</div>
				</div>
				<div class="col-md-7 col-md-offset-1">
					<label class="control-label form-group has-feedback">Observaciones</label>
					<div class="input-back-job-lg form-group has-feedback">
						<input class="form-control input-sm input-job" id='observation' name='observation' type='text' placeholder='Abc...z'>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-lg-12 divclinic">
				<legend><p id="taphepl" class="tabicon"><i class="glyphicon glyphicon-question-sign"></i></p>Historial Clínico</legend>
				<ul class="nav nav-tabs nav-justified tab-job" id="tabhistoryclinic">
				  <li class="active"><a href="#pathologic" data-toggle="tab">Antecedentes Patológicos</a></li>
				  <li><a href="#family" data-toggle="tab">Antecedentes  Familiares </a></li>
				  <li><a href="#nopathologic" data-toggle="tab">Antecedentes No Patológicos</a></li>
				  <li><a href="#actually" data-toggle="tab">Padecimiento <br>Actual</a></li>
				  <li><a href="#devices" data-toggle="tab">Aparatos y Sistemas</a></li>
				  <li><a href="#physics" data-toggle="tab">Exploración <br> Física</a></li>
				  <li><a href="#previus" data-toggle="tab">Diagnósticos Previos</a></li>
				</ul> 
				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane fade in active" id="pathologic">
				  	 <textarea id="editPathologic" name="editPathologic"></textarea>
				  </div>
				  <div class="tab-pane fade " id="family">
				  	<textarea id="editFamily" name="editFamily">
				  	</textarea>
				  </div>
				  <div class="tab-pane fade " id="nopathologic">
				  	<textarea id="editNopathologic" name="editNopathologic">
				  	</textarea>
				  </div>
				  <div class="tab-pane fade " id="actually">
				  	<textarea id="editActually" name="editActually">
				  	</textarea>
				  </div>
				  <div class="tab-pane fade" id="devices">
				  	<textarea id="editDevices" name="editDevices">
				  	</textarea>
				  </div>
				  <div class="tab-pane fade" id="physics">
				  	<textarea id="editPhysics" name="editPhysics">
				  	</textarea>
				  </div>
					<div class="tab-pane fade" id="previus">
				  	<textarea id="editPrevius" name="editPrevius">
				  	</textarea>
				  </div>
				</div>
			</fieldset>
			<div class="col-md-offset-6 col-md-1" id="btnreset">
				<button type="button" class="btn btn-job"><span class="glyphicon glyphicon-print"></span>     Imprimir</button>
			</div>
			<div class="col-md-offset-1 col-md-1" id="btnreset">
				<button id="cleanall" type="reset" class="btn btn-job"><span class="glyphicon glyphicon-remove"></span>     Cancelar</button>
			</div>
			<div class="col-md-offset-1 col-md-1" id="btnsubmit">
				<button type="submit" id="btnSubmit" class="btn btn-job"><span class="glyphicon glyphicon-ok"></span>     Agregar</button>
			</div>
			
		</form>
	</div>
	<div class="modal fade" id="formHelpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Ayuda para crear</h4>
	        <div class="checkboxtab">
				<label>
			    	<input type="checkbox" id="taphelpStruct"> Agregar Estructura
			    </label>
			</div>
	      </div>
	      <div class="modal-body">
	        <div class="col-md-12">
	        	<ul class="nav nav-tabs nav-justified tab-job" id="tabhistoryclinic">
				  <li class="active"><a href="#helppathologic" data-toggle="tab">Antecedentes Patológicos</a></li>
				  <li><a href="#helpfamily" data-toggle="tab">Antecedentes  Familiares </a></li>
				  <li><a href="#helpnopathologic" data-toggle="tab">Antecedentes No Patológico</a></li>
				  <li><a href="#helpactually" data-toggle="tab">Padecimiento <br>Actual</a></li>
				  <li><a href="#helpdevices" data-toggle="tab">Aparatos /Sistemas</a></li>
				  <li><a href="#helpphysics" data-toggle="tab">Exploración <br> Física</a></li>
				  <li><a href="#helpprevius" data-toggle="tab">Diagnósticos Previos</a></li>
				</ul> 
				<?php
				try {
					$busHelp=new selects();
					$busHelp->campos="*";
					$busHelp->tabla='historyfield';
					$searchHelp=$busHelp->select_multi2();
					$arrayHelp = array();
					while ($auxHelp=mysql_fetch_array($searchHelp)) {
						array_push($arrayHelp, $auxHelp['description']);
					}
				} catch (Exception $e) {
					echo '0';
				}
				?>
				<div class="tab-content">
				  <div class="tab-pane fade in active" id="helppathologic">
				  	 <div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[2]);?>
				  	 </div> 
				  </div>
				  <div class="tab-pane fade " id="helpfamily">
				  	<div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[0]);?>
				  	 </div> 
				  </div>
				  <div class="tab-pane fade " id="helpnopathologic">
				  	<div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[1]);?>
				  	 </div> 
				  </div>
				  <div class="tab-pane fade " id="helpactually">
				  	<div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[3]);?>
				  	 </div> 
				  </div>
				  <div class="tab-pane fade" id="helpdevices">
				  	<div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[4]);?>
				  	 </div> 
				  </div>
				  <div class="tab-pane fade" id="helpphysics">
				  	<div class="col-md-12 tabhelpbody">
						<?php echo utf8_encode($arrayHelp[5]);?>
				  	 </div> 
				  </div>
					<div class="tab-pane fade" id="helpprevius">
				  	
				  </div>
				</div>
			</div>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-job" data-dismiss="modal">OK</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
	$(document).on('ready',main);
	function main(){
		$("#showfield").tooltip();
		$("#print-patient").tooltip();
	    $("#add-patient").tooltip();
		$("#search-patient").tooltip();
	}
	</script>
</body>
<?php
}
?>