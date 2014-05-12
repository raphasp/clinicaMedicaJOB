<?php
	include("class.mysql.php");
	include("class.select.php");
	$allengagement=new selects();
	$campos="l.iduser,l.name,l.lastpaternal,l.lastmaternal,l.userlevel,d.position,d.statu,d.mobile";
	$allengagement->campos=$campos;
	$allengagement->condicion="l.iduser!=1";
	$allengagement->tabla='userlogin as l inner join userdatas as d on l.iduser=d.iduser';
	$allempleados=$allengagement->select_total();
	if($allempleados==true){
		while($engagementAux=mysql_fetch_array($allempleados)){
			echo "<tr id='".$engagementAux['iduser']."'>";
			echo "<td>". $engagementAux['name']." ".$engagementAux['lastpaternal']." ".$engagementAux['lastmaternal']."</td>";
			$position="";
			if ($engagementAux['userlevel']=='A') {
				$position="Administrador";
			} else if($engagementAux['userlevel']=='D'){
				$position="Doctor(a)";
			}else if($engagementAux['userlevel']=='E'){
				$position="Enfermero(a)";
			}else if($engagementAux['userlevel']=='F'){
				$position="Farmaceuta";
			}else if($engagementAux['userlevel']=='M'){
				$position="Mantenimiento";
			}else if($engagementAux['userlevel']=='R'){
				$position="Recepcionista";
			}else{
				$position="";
			}
			$estats="";
			if($engagementAux['statu']=="A"){
				$estats="Activo";
			}else{
				$estats="Desactivo";
			}
			echo "<td>".$position."</td>";
			echo "<td>".$engagementAux['mobile']."</td>";
			echo "<td>".$estats."</td>";
			echo "<td><i class='glyphicon glyphicon-chevron-right'></i></td>";
			echo "</tr>";
		}
	}
	else{
		echo "<tr>";
		echo "<td><span class='glyphicon glyphicon-warning-sign'></span></td>";
		echo "<td colspan='4'>No hay ningún empleado registrado en la base de datos de la clínica.</td>";
		echo "</tr>";
	}
?>
	