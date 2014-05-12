<!DOCTYPE html>
<?php
	include("class/xmlstruct.php");
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css" />
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src="js/jquery.numeric.js"></script>
	<script type="text/javascript" src="js/stockregister.js"></script>		
</head>
<body>
	<?php
	$menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
	$menu->createMenu();
	?>
	<div class="container" >
		<form role="form" class="col-lg-12" id="addProduct" action="class/admonRegisterProduct.php" method='post'>
			<div role="form" class="col-lg-12" id="partOneProduct">
				<div class="col-md-5">
					<fieldset>
						<legend>Datos del medicamento</legend>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label form-group has-feedback">Código de Barras</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id='codebar' name='codebar' type='text'  placeholder='0123556789' required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group  col-lg-12">
								<label class="control-label" for="clasification">Clasificación</label>
								<select class="form-control input-lg input-job select-job" id="clasification" name="clasification" required>
									<option value="" selected="selected"></option>
								  	<option value='medicamento'>Farmacéuticos</option>
								  	<option value='parafarmacia'>Parafarmacéuticos</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12" id="divclasification">
							<div class="form-group col-lg-12">
								<label class="control-label">Códigoo Nacional</label>
								<select class="form-control input-lg input-job  select-job" id="nacionalcode" name="nacionalcode">
									<option value="" selected="selected"></option>
									<option value="A">Alimento</option>
									<option value="C">Cosmético y productos de higiene personal</option>
									<option value="B">Biosida</option>
									<option value="M">Productos milagro</option>
									<option value="OP">Otros productos</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label  form-group has-feedback">Nombre Comercial</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="comercialname" name="comercialname" type="text"  placeholder="Abc...z" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label  form-group has-feedback">Descripción</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="description" name="description" type="text"  placeholder="Abc...z" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label form-group has-feedback">Laboratorio</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="laboratory" name="laboratory" type="text"  placeholder="Abc...z" required>
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
								<input class="form-control input-lg input-job select-job" id="expiredate" name="expiredate" type="date"  placeholder="" required>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label form-group has-feedback">Precio de adquisición</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="purchaseprice" name="purchaseprice" type="text"  placeholder="000.00" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label form-group has-feedback">Precio de venta</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="saleprice" name="saleprice" type="text"  placeholder="000.00" required>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="col-lg-12" id="btnStock">
						<div class="form-group col-lg-12">
							<a class="btn btn-job">Agregar productos a stock</a>
						</div>
					</div>
				</div>	
			</div>
			<div role="form" class="col-lg-12" id="partOne2Product">
				<fieldset>
				<legend>Descripción del medicamento</legend>
				<div class="col-md-7">
						<div class="col-lg-12">
							<div class="form-group">
								<table class="table table-job">
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Código de Barras</td>
										<td id="tdcodebar"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Clasificación</td>
										<td id="tdclasificacion"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Nombre Comercial</td>
										<td id="tdname"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Descripción</td>
										<td id="tddescription"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Laboratorio</td>
										<td id="tdlaboratory"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Fecha de expiración </td>
										<td id="tdexpiredate"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Precio de adquisición</td>
										<td id="tdpurchaseprice"></td>
									</tr>
									<tr>
										<td><i class="glyphicon glyphicon-leaf"></i>Precio de venta</td>
										<td id="tdsaleprice"></td>
									</tr>
								</table>
							</div>
						</div>
				</div>
				<div class="col-md-4 col-md-offset-1">
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label form-group has-feedback">Sustancia activa</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="activesubtance" name="activesubtance" type="text" placeholder="Abc...z/Abc...z/etc.">
								</div>							
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Envase</label>
								<select id="containerSelect" name="containerSelect" class="form-control input-lg input-job  select-job">
									<option value="" selected="selected"></option>
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
								<label class="control-label form-group has-feedback">Unidad dosis</label>
								<div class="input-back-job form-group has-feedback">
									<input class="form-control input-lg input-job" id="unity" name="unity" type="text" placeholder="Abc...123 unidad">
								</div>	
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-12">
								<label class="control-label">Vía de administración</label>
								<select id="routeAdminidtrator" name="routeAdminidtrator" class="form-control input-lg input-job  select-job">
									<option value="" selected="selected"></option>
									<?php
										$dir2="xml/DICCIONARIO_VIAS_ADMINISTRACION.xml";
										$xmls=new xmlstruct($dir2);
										$xmls->routeAdminidtrator();
									?>			
								</select>					
							</div>
						</div>	
				</div>
				</fieldset>
			</div>
			<div class="col-lg-12" id="btnsForm">
				<div class="col-md-offset-4 col-md-1" id="btnreset">
					<button type="reset" class="btn btn-job">Cancelar</button>
				</div>
				<div class="col-md-offset-2 col-md-1" id="btnsubmit">
					<button type="submit" class="btn btn-job">Agregar</button>
				</div>
			</div>
		</form>
	</div>
</body>
<?php
}
?>