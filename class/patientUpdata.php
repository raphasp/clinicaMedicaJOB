<?php
	try {
		require("class.mysql.php");
		require("class.updata.php");
		//print_r($_POST);
		if (isset($_POST['id']) && !empty($_POST['id']) &&
			isset($_POST['name']) && !empty($_POST['name']) &&
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
			isset($_POST['editPhysics'])) {

			$id=$_POST['id'];
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
			$patologic=$_POST['editPathologic'];
			$family=$_POST['editFamily'];
			$nopatologic=$_POST['editNopathologic'];
			$actually=$_POST['editActually'];
			$systemdevices=$_POST['editDevices'];
			$physic=$_POST['editPhysics'];
			$updata=new updatas();
			$updata->condicion='Id='.$id;
			$updata->tabla='patient';
			$updata->valores="name='".$name."',".
							"app='".$app."',".
							"apm='".$apm."',".
							"sex='".$sex."',".
							"borndate='".$borndate."',".
							"age=".$age.",".
							"bloodgroup='".$bloodgroup."',".
							"phone='".$phone."',".
							"cellphone='".$cellphone."',".
							"marital='".$marital."',".
							"address='".$address."',".
							"community='".$community."',".
							"municipaly='".$municipaly."',".
							"code=".$code.",".
							"levelschool='".$levelschool."',".
							"profesional='".$profecional."',".
							"religion='".$religion."',".
							"email='".$email."',".
							"observation='".$observation."',".
							"patologic='".$patologic."',".
							"family='".$family."',".
							"nopatologic='".$nopatologic."',".
							"actually='".$actually."',".
							"systemdevices='".$systemdevices."',".
							"physic='".$physic."'";
			if ($updata->cambiar()==true) {
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