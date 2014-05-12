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
	<link rel="shortcut icon" type="image/png" href="ic_job.png">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css" />
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.numeric.js"></script>
	<script type="text/javascript" src="js/patientsSearch.js"></script>		
</head>
<body>
	<?php
	$menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
	$menu->createMenuReception();
	?>
	<div class="container margintopconteiner" >
		<div class="col-md-offset-4 col-md-4">
			<form class="form-inline" role="search" action="patientSearch-R.php" method="post">
		        <div class="form-group input-back-job has-feedback">
		          <input type="text" class="form-control input-lg input-job" id='codebar' name='codebar' type='text' required='true' data-toggle="tooltip" data-placement="top" title="Código de barras" placeholder="Buscar">
		        </div>
		        <button type="submit" class="btn btn-search input-lg"><i class="glyphicon glyphicon-search"></i></button>
		    </form>
		</div>
		<?php
		if (isset($_POST['codebar']) && !empty($_POST['codebar'])) {
			$caracter=$_POST['codebar'];
			$searchP=null;
			if (is_numeric($caracter)) {
				$likes=new selects();
				$likes->campos="*";
				$likes->condicion="Id REGEXP '".$caracter."'";
				$likes->tabla='patient';
				$searchP=$likes->select_total();
			} else {
				$likes=new selects();
				$likes->campos="*";
				$likes->condicion="name REGEXP '".$caracter."' OR app REGEXP '".$caracter."' OR apm REGEXP '".$caracter."'";
				$likes->tabla='patient';
				$searchP=$likes->select_total();
			}
			
		?>	

		<div class="row">
			<fieldset class='col-md-12'>
				
				<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-selected glyphicon glyphicon-th" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="glyphicon glyphicon-th-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					<ul>
						<?php 
						 if ($searchP!=false) {
						 	while ( $auxmedical=mysql_fetch_array($searchP)) {
						 		
						 	
						 ?>
						<li>
							<a class="cbp-vm-image" href="#">
								<?php
									echo "<img src='img/user.png'>";
								?>
							</a>
							<h3 class="cbp-vm-title"><?php echo $auxmedical['name']." ".$auxmedical['app']." ".$auxmedical['apm'];?></h3>
							<div class="cbp-vm-price"><?php echo "Edad: ".($auxmedical['age'])."<br>". $auxmedical['borndate'];?></div>
							<div class="cbp-vm-details">
								<?php echo $auxmedical['address'];?>
							</div>
							<div class="cbp-btn">
								<a id="" href="patientSearch-R.php" class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Imprimir Expediente"><span class="glyphicon glyphicon-print"></span></a>
								<a id="" <?php echo "href='patientUpdata-R.php?code=".$auxmedical['Id']."'";?> class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Editar Expediente"><span class="glyphicon glyphicon-edit" ></span></a>
								<a id="" href="patientSearch-R.php" class="btn btn-job-arrow" data-toggle="tooltip" data-placement="bottom" title="Sacar Cita"><span class="glyphicon glyphicon-list-alt"></span></a>
							</div>
						</li>
						<?php
								}
							}else {
						 	echo "<h2 class='has-error'>¡No hay ningún paciente que coincida con la búsqueda!</h2>";
						 }
						?>
					</ul>
				</div>
			</div><!-- /main -->
			</fieldset>
		</div>
		<?php
			} else {
		?>
		<div class='col-lg-12 img-style'>
			<img src="img/jobclinica-512.png" class="img-responsive logo-transparent" alt="Logo del Clinica Medica JOB">
		</div>
		<?php
		}
		?>
	</div>
	<script type="text/javascript">
		$(".btn-job-arrow").tooltip();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/cbpViewModeSwitch.js"></script>
</body>
<?php
}
function rfloor($real) {
	$long=strlen($real);
	if(strrpos($real, ".")!==false){
		if($long-strrpos($real, ".")==2)
		echo "$ ".$real."0";
		else
		echo "$ ".$real;
	}else{
		echo "$ ".$real.".00";
	}
}
?>