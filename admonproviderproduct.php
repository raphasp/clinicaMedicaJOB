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
	<link rel="stylesheet" type="text/css" href="css/styleindex.css" />
	<script type="text/javascript" src="js/modernizr.js"></script>
</head>
<body>
	<?php
    $menu=new CreateMenu($search['iduser'],$search['name'],$search['lastpaternal'],$search['lastmaternal'],$search['email']);
    $menu->createMenu();
    $code=(isset($_GET['codebar']) ? ( !empty($_GET['codebar'])? $_GET['codebar']: "") : "");
    $searchPro=new selects();
    $searchPro->condicion="idcodebar='".$code."'";
    $searchPro->tabla='medicalproduct';
    $producto=$searchPro->seleccion();
    if ($producto!=false) {
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
                                    <input class="form-control input-lg input-job" id='codebar' name='codebar' type='text'  placeholder='0123556789' required <?php echo "value='".$producto['idcodebar']."'";?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  col-lg-12">
                                <label class="control-label" for="clasification">Clasificación</label>
                                <select class="form-control input-lg input-job select-job" id="clasification" name="clasification" required>
                                    <?php echo "<option selected='selected' value='".$producto['clasificaction']."'>".$producto['clasificaction']."</option>";?>
                                    <option value='medicamento'>Farmacéuticos</option>
                                    <option value='parafarmacia'>Parafarmacéuticos</option>
                                </select>
                            </div>
                        </div>
                        <?php if ($producto['clasificaction']=='parafarmacia'){
                        ?>
                        <div class="col-lg-12" id="">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Códigoo Nacional</label>
                                <select class="form-control input-lg input-job  select-job" id="nacionalcode" name="nacionalcode">
                                    <?php $text="";
                                    if ($producto['nationalcode']=="A") {
                                        $text="Alimento";
                                    } else if ($producto['nationalcode']=="C") {
                                        $text="Cosmético y productos de higiene personal";
                                    } else if ($producto['nationalcode']=="B") {
                                       $text="Biosida";
                                    } else if ($producto['nationalcode']=="M") {
                                        $text="Productos milagro";
                                    } else if ($producto['nationalcode']=="OP") {
                                        $text="Otros productos";
                                    } else {
                                        $text="";
                                    }                                 
                                    echo "<option selected='selected' value='".$producto['nationalcode']."'>".$text."</option>";?>
                                    <option value="A">Alimento</option>
                                    <option value="C">Cosmético y productos de higiene personal</option>
                                    <option value="B">Biosida</option>
                                    <option value="M">Productos milagro</option>
                                    <option value="OP">Otros productos</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label  form-group has-feedback">Nombre Comercial</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="comercialname" name="comercialname" type="text"  placeholder="Abc...z" required <?php echo "value='".$producto['commertialnamel']."'";?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label  form-group has-feedback">Descripción</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="description" name="description" type="text"  placeholder="Abc...z" required <?php echo "value='".$producto['description']."'";?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label form-group has-feedback">Laboratorio</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="laboratory" name="laboratory" type="text"  placeholder="Abc...z" required <?php echo "value='".$producto['laboratory']."'";?>>
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
                                <input class="form-control input-lg input-job select-job" id="expiredate" name="expiredate" type="date"  placeholder="" required <?php echo "value='".$producto['expirationdate']."'";?>>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label form-group has-feedback">Precio de adquisición</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="purchaseprice" name="purchaseprice" type="text"  placeholder="000.00" required <?php echo "value='".$producto['adquisitionprice']."'";?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label form-group has-feedback">Precio de venta</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="saleprice" name="saleprice" type="text"  placeholder="000.00" required <?php echo "value='".$producto['saleprice']."'";?>>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>  
            </div>
            <div role="form" class="col-lg-12" id="">
                <fieldset>
                <legend>Descripción del medicamento</legend>
                <div class="col-md-7">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <table class="table table-job">
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Código de Barras</td>
                                        <td id="tdcodebar"><?php echo $producto['idcodebar'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Clasificación</td>
                                        <td id="tdclasificacion"><?php echo $producto['clasificaction'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Nombre Comercial</td>
                                        <td id="tdname"><?php echo $producto['commertialnamel'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Descripción</td>
                                        <td id="tddescription"><?php echo $producto['description'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Laboratorio</td>
                                        <td id="tdlaboratory"><?php echo $producto['laboratory'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Fecha de expiración </td>
                                        <td id="tdexpiredate"><?php echo $producto['expirationdate'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Precio de adquisición</td>
                                        <td id="tdpurchaseprice">$ <?php echo $producto['adquisitionprice'];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="glyphicon glyphicon-leaf"></i>Precio de venta</td>
                                        <td id="tdsaleprice">$ <?php echo $producto['saleprice'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <?php
                    if ($producto['clasificaction']=='medicamento') {
                    ?>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label form-group has-feedback">Sustancia activa</label>
                                <div class="input-back-job form-group has-feedback">
                                    <input class="form-control input-lg input-job" id="activesubtance" name="activesubtance" type="text" placeholder="Abc...z/Abc...z/etc." <?php echo "value='".$producto['activesubtance']."'";?>>
                                </div>                          
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Envase</label>
                                <select id="containerSelect" name="containerSelect" class="form-control input-lg input-job  select-job">
                                    
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
                                    <input class="form-control input-lg input-job" id="unity" name="unity" type="text" placeholder="Abc...123 unidad" <?php echo "value='".$producto['unity']."'";?>>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Vía de administración</label>
                                <select id="routeAdminidtrator" name="routeAdminidtrator" class="form-control input-lg input-job  select-job">
                                    <?php
                                        echo "<option selected='selected' value='".$producto['administrationroute']."'>".$producto['administrationroute']."</option>";
                                        $dir2="xml/DICCIONARIO_VIAS_ADMINISTRACION.xml";
                                        $xmls=new xmlstruct($dir2);
                                        $xmls->routeAdminidtrator();
                                    ?>          
                                </select>                   
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
                </div>
                </fieldset>
            </div>
            <div class="col-lg-12" id="btnsForm">
                <div class="col-md-offset-4 col-md-1" id="btnreset">
                    <button type="reset" class="btn btn-job">Cancelar</button>
                </div>
                <div class="col-md-offset-2 col-md-1" id="btnsubmit">
                    <button type="submit" class="btn btn-job">Actualizar</button>
                </div>
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
    <?php  } else {?>
    <div class="container">
        <div class="col-lg-12 data-updata">
            <fieldset>
                    <legend>Actualización de Producto</legend>
                    <h3 class="col-md-offset-4 col-md-5"><span class="glyphicon glyphicon-warning-sign"></span>     Error al ingresar a la página.</h3>
            </fieldset>
        </div>
    </div>
    <?php
    }
    ?>
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.numeric.js"></script>
    <script type="text/javascript" src="js/admonproviderproduct.js"></script>
    <script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>
    <script type="text/javascript" src="js/jquery.stickyheader.js"></script>
    <script type="text/javascript">
        $("#newamount").numeric();
    </script>
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