<?php
/**
* 
Clase de creation of menu
*/
class CreateMenu extends MySQL
{
	private $iduser;
	private $name;
	private $lastpaternal;
	private $lastmaternal;
	private $email;
	function __construct($argument,$n, $app, $apm, $em)
	{
		$this->iduser=$argument;
		$this->name=$n;
		$this->lastpaternal=$app;
		$this->lastmaternal=$apm;
		$this->email=$em;
	}

	function createMenu(){
		
			echo "<div id='headernav' class='sticky-wrapper'>";
			echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation' id='navmenu'>";
			echo "<hr class='style-one'>";
			echo "<div class='container-fluid'>";
			echo "    <div class='navbar-header'>";
			echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>";
			echo "        <span class='sr-only'>Toggle navigation</span>";
			echo "        <span class='icon-bar'></span>";
			echo "        <span class='icon-bar'></span>";
			echo "        <span class='icon-bar'></span>";
			echo "      </button>";
			echo "     <a class='navbar-brand' href='admon.php'>";
			echo "      	<div class='logomenu'>";
			echo "      		<img src='img/ic_job_menu.png' class='img-responsive'>Clínica Médica JOB";
			echo "      	</div>";
			echo "      </a>";
			echo "    </div>";

			echo "    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
			echo "    <ul class='nav navbar-nav'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Personal<b class='caret'></b></a>";
			echo "          <ul class='dropdown-menu'>";
			echo "            <li><a href='admonengagement.php'>Contratación</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='admonengagement.php'>Actualización</a></li>";
			echo "          </ul>";
			echo "        </li>";
			echo "      </ul>";
			echo "      <ul class='nav navbar-nav'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Almacen <b class='caret'></b></a>";
			echo "          <ul class='dropdown-menu'>";
			echo "            <li><a href='admonstockregister.php'>Agregar</a></li>";
			echo "            <li><a href='admonprovider.php'>Proveer</a></li>";
			echo "            <li><a href='#'>Clinica</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='#'>Separated link</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='#'>One more separated link</a></li>";
			echo "          </ul>";
			echo "        </li>";
			echo "      </ul>";
			echo "      <ul class='nav navbar-nav navbar-right'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' id='nameuser'><i id='ic_user' class='glyphicon glyphicon-user'></i>".$this->name.' '.$this->lastpaternal.' '.$this->lastmaternal."</a>";
			echo "        </li>";
			echo "      </ul>";
			echo "    </div><!-- /.navbar-collapse -->";
			echo "  </div><!-- /.container-fluid -->";
			echo "</nav>";
			echo "		</div>";
			echo "		<div class='perfilmenu' id='perfiluser'>";
			echo "	      <div class='arrow'>";
			echo "	      	<div class='subarrow'></div>";
			echo "	      </div>";
			echo "	      <h4 class='perfilmenu-title'>Administrador de Almacen</h4>";
			echo "	      <div class='perfilmenu-content'>";
			echo "	        <div class='row'>";
			echo "	        	<div class='col-lg-1'></div>";
			echo "	        	<div class='col-lg-10'>";
			echo "	        		<ul>";
			echo "	        			<li><b>".$this->email."</b></li>";
			echo "	        			<li>Estado: <b>Activo</b></li>";
			echo "	        		</ul>";
			echo "	        	</div>";
			echo "	        </div>";
			echo "	        <a href='class/endsesion.php' class='btn btn-job'>Cerrar Sesion</a>";
			echo "	      </div>";
			echo "	    </div>";
	}

	function createMenuReception(){
		
			echo "<div id='headernav' class='sticky-wrapper'>";
			echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation' id='navmenu'>";
			echo "<hr class='style-one'>";
			echo "<div class='container-fluid'>";
			echo "    <div class='navbar-header'>";
			echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>";
			echo "        <span class='sr-only'>Toggle navigation</span>";
			echo "        <span class='icon-bar'></span>";
			echo "        <span class='icon-bar'></span>";
			echo "        <span class='icon-bar'></span>";
			echo "      </button>";
			echo "     <a class='navbar-brand' href='reception.php'>";
			echo "      	<div class='logomenu'>";
			echo "      		<img src='img/ic_job_menu.png' class='img-responsive'>Clínica Médica JOB";
			echo "      	</div>";
			echo "      </a>";
			echo "    </div>";

			echo "    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
			echo "    <ul class='nav navbar-nav'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Paciente<b class='caret'></b></a>";
			echo "          <ul class='dropdown-menu'>";
			echo "            <li><a href='patientAdd-R.php'>Agregar</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='patientSearch-R.php'>Actualización</a></li>";
			echo "          </ul>";
			echo "        </li>";
			echo "      </ul>";
			echo "      <ul class='nav navbar-nav'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Consultorio<b class='caret'></b></a>";
			echo "          <ul class='dropdown-menu'>";
			echo "            <li><a href='patientConsult-R.php'>Citas</a></li>";
			echo "            <li><a href='#'>Proveer</a></li>";
			echo "            <li><a href='#'>Clinica</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='#'>Separated link</a></li>";
			echo "            <li class='divider'></li>";
			echo "            <li><a href='#'>One more separated link</a></li>";
			echo "          </ul>";
			echo "        </li>";
			echo "      </ul>";
			echo "      <ul class='nav navbar-nav navbar-right'>";
			echo "        <li class='dropdown'>";
			echo "          <a href='#' id='nameuser'><i id='ic_user' class='glyphicon glyphicon-user'></i>".$this->name.' '.$this->lastpaternal.' '.$this->lastmaternal."</a>";
			echo "        </li>";
			echo "      </ul>";
			echo "    </div><!-- /.navbar-collapse -->";
			echo "  </div><!-- /.container-fluid -->";
			echo "</nav>";
			echo "		</div>";
			echo "		<div class='perfilmenu' id='perfiluser'>";
			echo "	      <div class='arrow'>";
			echo "	      	<div class='subarrow'></div>";
			echo "	      </div>";
			echo "	      <h4 class='perfilmenu-title'>Recepcionista</h4>";
			echo "	      <div class='perfilmenu-content'>";
			echo "	        <div class='row'>";
			echo "	        	<div class='col-lg-1'></div>";
			echo "	        	<div class='col-lg-10'>";
			echo "	        		<ul>";
			echo "	        			<li><b>".$this->email."</b></li>";
			echo "	        			<li>Estado: <b>Activo</b></li>";
			echo "	        		</ul>";
			echo "	        	</div>";
			echo "	        </div>";
			echo "	        <a href='class/endsesion.php' class='btn btn-job'>Cerrar Sesion</a>";
			echo "	      </div>";
			echo "	    </div>";
	}

	function headerLinksJS()
	{
		echo "<script type='text/javascript' src='js/modernizr.js'></script>";
		echo "<script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>";
		echo "<script type='text/javascript' src='js/bootstrap.min.js'></script>";
		echo "<script type='text/javascript' src='js/jquery.numeric.js'></script>";
		echo "<script type='text/javascript' src='js/jquery.maskedinput.min.js'></script>";
		echo "<script type='text/javascript' src='js/summernote.min.js'></script>";
		echo "<script type='text/javascript' src='js/d3.v3.min.js'></script>";
		echo "<script type='text/javascript' src='js/cal-heatmap.min.js'></script>";
		echo "<script type='text/javascript' src='js/jquery.ba-throttle-debounce.min.js'></script>";
		echo "<script type='text/javascript' src='js/bootstrap-dialog.min.js'></script>";
		echo "<script type='text/javascript' src='js/jquery.stickyheader.js'></script>";
	}

	function headerLinksCSS(){
		echo "<link rel='shortcut icon' type='image/png' href='ic_job.png'>";
		echo "<link rel='stylesheet' type='text/css' href='css/normalize.css' />";
		echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>";
		echo "<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.css'>";
		echo "<link rel='stylesheet' type='text/css' href='css/summernote.css' />";
		echo "<link rel='stylesheet' type='text/css' href='css/bootstrap-dialog.min.css'>";
		echo "<link rel='stylesheet' type='text/css' href='css/font-awesome.min.css'/>";
		echo "<link rel='stylesheet' type='text/css' href='css/cal-heatmap.css' />";
		echo "<link rel='stylesheet' type='text/css' href='css/styleindex.css' />";
	}
}
?>