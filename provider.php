<!DOCTYPE html>
<?php
	
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
	 	<form class="form-inline" role="search">
	        <div class="form-group input-back-job has-feedback">
	          <input type="text" class="form-control input-lg input-job" id='codebar' name='codebar' type='text' required='true' data-toggle="tooltip" data-placement="top" title="Código de barras" placeholder="Buscar">
	          <i id="cancelSearch" class='glyphicon glyphicon-remove form-control-feedback'></i>
	        </div>
	        <button type="submit" class="btn btn-search input-lg"><i class="glyphicon glyphicon-search"></i></button>
	    </form>
		<div class="row">
			<fieldset class='col-md-12'>
				
				<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<div class="input-back-job-filter has-feedback">
							<input type="text" class="form-control input-job" id='filter' name='filter' type='text' required='true' data-toggle="tooltip" data-placement="top" title="Código de barras" placeholder="Buscar">
						</div>
						<a href="#" class="cbp-vm-selected glyphicon glyphicon-th" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="glyphicon glyphicon-th-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					<ul>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/1.png"></a>
							<h3 class="cbp-vm-title">Silver beet</h3>
							<div class="cbp-vm-price">$19.90</div>
							<div class="cbp-vm-details">
								Silver beet shallot wakame tomatillo salsify mung bean beetroot groundnut.
							</div>
							<a class="cbp-vm-add" href="#"><i class='glyphicon glyphicon-edit'></i> Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/2.png"></a>
							<h3 class="cbp-vm-title">Wattle seed</h3>
							<div class="cbp-vm-price">$22.90</div>
							<div class="cbp-vm-details">
								Wattle seed bunya nuts spring onion okra garlic bitterleaf zucchini.
							</div>
							<a class="cbp-vm-add" href="#"><i class='glyphicon glyphicon-edit'></i> Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/3.png"></a>
							<h3 class="cbp-vm-title">Kohlrabi bok</h3>
							<div class="cbp-vm-price">$5.90</div>
							<div class="cbp-vm-details">
								Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard.
							</div>
							<a class="cbp-vm-add" href="#"><i class='glyphicon glyphicon-edit'></i> Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/4.png"></a>
							<h3 class="cbp-vm-title">Melon sierra</h3>
							<div class="cbp-vm-price">$12.90</div>
							<div class="cbp-vm-details">
								Melon sierra leone bologi carrot peanut salsify celery onion jícama summer purslane.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/5.png"></a>
							<h3 class="cbp-vm-title">Celery carrot</h3>
							<div class="cbp-vm-price">$15.00</div>
							<div class="cbp-vm-details">
								Celery carrot napa cabbage wakame zucchini celery chard beetroot jícama sierra leone.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/6.png"></a>
							<h3 class="cbp-vm-title">Catsear</h3>
							<div class="cbp-vm-price">$20.00</div>
							<div class="cbp-vm-details">
								Catsear cabbage tomato parsnip cucumber pea brussels sprout spring onion shallot swiss .
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/7.png"></a>
							<h3 class="cbp-vm-title">Mung bean</h3>
							<div class="cbp-vm-price">$88.00</div>
							<div class="cbp-vm-details">
								Mung bean taro chicory spinach komatsuna fennel.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/8.png"></a>
							<h3 class="cbp-vm-title">Epazote</h3>
							<div class="cbp-vm-price">$34.90</div>
							<div class="cbp-vm-details">
								Epazote soko chickpea radicchio rutabaga desert raisin wattle seed coriander water.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/9.png"></a>
							<h3 class="cbp-vm-title">Tatsoi caulie</h3>
							<div class="cbp-vm-price">$21.50</div>
							<div class="cbp-vm-details">
								Tatsoi caulie broccoli rabe bush tomato fava bean beetroot epazote salad grape.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/10.png"></a>
							<h3 class="cbp-vm-title">Endive okra</h3>
							<div class="cbp-vm-price">$18.50</div>
							<div class="cbp-vm-details">
								Endive okra chard desert raisin prairie turnip cucumber maize avocado.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/1.png"></a>
							<h3 class="cbp-vm-title">Bush tomato</h3>
							<div class="cbp-vm-price">$9.00</div>
							<div class="cbp-vm-details">
								Bush tomato peanut shallot turnip prairie turnip gram desert raisin.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
						<li>
							<a class="cbp-vm-image" href="#"><img src="img/2.png"></a>
							<h3 class="cbp-vm-title">Yarrow leek</h3>
							<div class="cbp-vm-price">$22.50</div>
							<div class="cbp-vm-details">
								Yarrow leek cabbage amaranth onion salsify caulie kale desert raisin prairie turnip garlic.
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>
					</ul>
				</div>
			</div><!-- /main -->
			</fieldset>
		</div>
	</div>
	<script src="js/classie.js"></script>
	<script src="js/cbpViewModeSwitch.js"></script>
</body>