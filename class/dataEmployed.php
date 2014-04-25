<?php
	include("class.mysql.php");
	include("class.select.php");
	try {
		if (isset($_GET['id'])) {
			$id=$_GET['id'];
			$bus=new selects();
			$bus->campos="*";
			$bus->condicion="l.iduser=".$id."";
			$bus->tabla='userlogin as l inner join userdatas as d on l.iduser=d.iduser';
			$search=$bus->select_total();
			if ($search!=false) {
				$arr = array();
				$obj=mysql_fetch_object($search);
				$arr[] = array( "iduser"=>$obj->iduser,
								"names"=>$obj->name,
								"lastpaternal"=>$obj->lastpaternal,
								"lastmaternal"=>$obj->lastmaternal,
								"email"=>$obj->email,
								"password"=>$obj->password,
								"userlevel"=>$obj->userlevel,
								"position"=>$obj->position,
								"statu"=>$obj->statu,
								"professionalicense"=>$obj->professionalicense,
								"ife"=>$obj->ife,
								"rfc"=>$obj->rfc,
								"curp"=>$obj->curp,
								"phone"=>$obj->phone,
								"mobile"=>$obj->mobile,
								"marital"=>$obj->marital,
								"age"=>$obj->age,
								"borndate"=>$obj->borndate,
								"sex"=>$obj->sex,
								"street"=>$obj->street,
								"number"=>$obj->numberstreet,
								"colonia"=>$obj->colonia,
								"community"=>$obj->community,
								"municipality"=>$obj->municipality,
								"postcode"=>$obj->postcode,);
				echo '' . json_encode($arr) . '';
			}else {
				echo "0";
			}
		} else {
			echo "0";
		}
	} catch (Exception $e) {
		echo '0';
	}
?>