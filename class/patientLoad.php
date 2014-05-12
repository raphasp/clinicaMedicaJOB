<?php
	include("class.mysql.php");
	include("class.select.php");
	try {
		if (isset($_GET['id'])) {
			$id=$_GET['id'];
			$bus=new selects();
			$bus->campos="*";
			$bus->condicion="Id=".$id."";
			$bus->tabla='patient';
			$search=$bus->select_total();
			if ($search!=false) {
				$arr = array();
				$obj=mysql_fetch_object($search);
				$arr[] = array( "Id"=>$obj->Id,
								"name"=>$obj->name,
								"app"=>$obj->app,
								"apm"=>$obj->apm,
								"sex"=>$obj->sex,
								"borndate"=>$obj->borndate,
								"age"=>$obj->age,
								"bloodgroup"=>$obj->bloodgroup,
								"phone"=>$obj->phone,
								"cellphone"=>$obj->cellphone,
								"marital"=>$obj->marital,
								"address"=>$obj->address,
								"community"=>$obj->community,
								"municipaly"=>$obj->municipaly,
								"code"=>$obj->code,
								"levelschool"=>$obj->levelschool,
								"profesional"=>$obj->profesional,
								"religion"=>$obj->religion,
								"email"=>$obj->email,
								"observation"=>$obj->observation,
								"patologic"=>$obj->patologic,
								"family"=>$obj->family,
								"nopatologic"=>$obj->nopatologic,
								"actually"=>$obj->actually,
								"systemdevices"=>$obj->systemdevices,
								"previousdiagnoses"=>$obj->previousdiagnoses,
								"physic"=>$obj->physic);
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