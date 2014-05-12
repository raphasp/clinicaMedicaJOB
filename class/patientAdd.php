<?php
	try {
		require("class.mysql.php");
		require("class.alta.php");
		//print_r($_POST);
		if (isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['app']) && !empty($_POST['app']) &&
			isset($_POST['apm']) && !empty($_POST['apm']) &&
			isset($_POST['sex']) && !empty($_POST['sex']) &&
			isset($_POST['borndate']) && !empty($_POST['borndate']) &&
			isset($_POST['age']) && !empty($_POST['age']) &&
			isset($_POST['bloodgroup']) &&
			isset($_POST['phone']) && 
			isset($_POST['cellphone']) && 
			isset($_POST['marital']) && 
			isset($_POST['address']) && !empty($_POST['address']) &&
			isset($_POST['community']) && !empty($_POST['community']) &&
			isset($_POST['municipaly']) && !empty($_POST['municipaly']) &&
			isset($_POST['code']) && 
			isset($_POST['levelschool']) &&
			isset($_POST['profecional']) &&
			isset($_POST['religion']) && 
			isset($_POST['email']) && 
			isset($_POST['observation'])&&
			isset($_POST['editPathologic'])&&
			isset($_POST['editFamily'])&&
			isset($_POST['editNopathologic'])&&
			isset($_POST['editActually'])&&
			isset($_POST['editDevices'])&&
			isset($_POST['editPrevius'])&&
			isset($_POST['editPhysics'])) {

			$name=$_POST['name'];
			$app=$_POST['app'];
			$apm=$_POST['apm'];
			$sex=$_POST['sex'];
			$borndate=$_POST['borndate'];
			$age=$_POST['age'];
			$bloodgroup=($_POST['bloodgroup']=="") ? "" : $_POST['bloodgroup'];
			$phone=($_POST['phone']=="") ? "" : $_POST['phone'];
			$cellphone=($_POST['cellphone']=="") ? "" : $_POST['cellphone'];
			$marital=($_POST['marital']=="") ? "" : $_POST['marital'];
			$address=$_POST['address'];
			$community=$_POST['community'];
			$municipaly=$_POST['municipaly'];
			$code=($_POST['code']=="") ? "" : $_POST['code'];
			$levelschool=($_POST['levelschool']=="") ? "" : $_POST['levelschool'];
			$profecional=($_POST['profecional']=="") ? "" : $_POST['profecional'];
			$religion=($_POST['religion']=="") ? "" : $_POST['religion'];
			$email=($_POST['email']=="") ? "" : $_POST['email'];
			$observation=($_POST['observation']=="") ? "" : $_POST['observation'];
			$patologic=($_POST['editPathologic']=="") ? "": $$_POST['editPathologic'];
			$family=($_POST['editFamily']=="") ? "": $_POST['editFamily'];
			$nopatologic=($_POST['editNopathologic']=="") ? "" : $_POST['editNopathologic'];
			$actually=($_POST['editActually']=="") ? "" : $_POST['editActually'];
			$systemdevices=($_POST['editDevices']=="") ? "" : $_POST['editDevices'];
			$physic=($_POST['editPhysics']=="") ? "" : $_POST['editPhysics'];
			$previus=($_POST['editPrevius']=="") ? "" : $_POST['editPrevius'];

			$add=new alta();
			$add->campos="'','$name','$app','$apm','$sex','$borndate',$age,'$bloodgroup','$phone','$cellphone','$marital','$address','$community','$municipaly',$code,'$levelschool','$profecional','$religion','$email','$observation','$patologic','$family','$nopatologic','$actually','$systemdevices','$physic','$previus'";
			//echo $add->campos."<br>";
			$add->tabla='patient';
			if ($add->dalta()!=false) {
				echo "1";
			} else {
				echo "0";
			}

		} else {
			echo "0";
		}
	} catch (Exception $e) {
		echo "0";
	}	
?>