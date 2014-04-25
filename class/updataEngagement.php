<?php
include("class.mysql.php");
include("class.select.php");
include("class.updata.php");
	/*echo $_POST['name']."<br>";	
	echo $_POST['lastpaternal']."<br>";
	echo $_POST['lastmaternal']."<br>";
	echo $_POST['email']."<br>";
	echo $_POST['position']."<br>";
	echo $_POST['password']."<br>";*/
	//print_r($_POST);
	if(isset($_POST['name']) && !empty($_POST['name']) &&
		isset($_POST['lastpaternal']) && !empty($_POST['lastpaternal']) &&
		isset($_POST['lastmaternal']) && !empty($_POST['lastmaternal']) &&
		isset($_POST['email']) && !empty($_POST['email']) &&
		isset($_POST['position']) && !empty($_POST['position']) &&
		isset($_POST['password']) && !empty($_POST['password']) &&

		isset($_POST['state']) && !empty($_POST['state']) &&
		isset($_POST['speciality']) &&
		isset($_POST['license']) &&
		isset($_POST['ife']) && !empty($_POST['ife']) &&
		isset($_POST['rfc']) && !empty($_POST['rfc']) &&
		isset($_POST['curp']) && !empty($_POST['curp']) &&
		isset($_POST['phone']) &&
		isset($_POST['mobil']) &&
		isset($_POST['marital']) &&
		isset($_POST['age']) && !empty($_POST['age']) &&
		isset($_POST['borndate']) && !empty($_POST['borndate']) &&
		isset($_POST['sex']) && !empty($_POST['sex']) &&
		isset($_POST['street']) && 
		isset($_POST['number']) && 
		isset($_POST['colonia']) && 
		isset($_POST['comunity']) && !empty($_POST['comunity']) &&
		isset($_POST['municipaly']) && !empty($_POST['municipaly']) &&
		isset($_POST['codep'])){

		$iduser=$_POST['iduser'];
		$name=$_POST['name'];
		$paternal=$_POST['lastpaternal'];
		$maternal=$_POST['lastmaternal'];
		$email=$_POST['email'];
		$position=$_POST['position'];
		$password=$_POST['password'];

		$state=$_POST['state'];
		$speciality=$_POST['speciality'];
		$license=$_POST['license'];		
		$ife=strtoupper($_POST['ife']);
		$rfc=strtoupper($_POST['rfc']);
		$curp=strtoupper($_POST['curp']);
		$phone=$_POST['phone'];
		$mobil=$_POST['mobil'];
		$marital=$_POST['marital'];
		$age=$_POST['age'];
		$borndate=$_POST['borndate'];
		$sex=$_POST['sex'];
		$street=$_POST['street'];
		$number=$_POST['number'];
		$colonia=$_POST['colonia'];
		$comunity=$_POST['comunity'];
		$municipaly=$_POST['municipaly'];
		$codep=$_POST['codep'];
		$datemodify=date("Y-m-d H:i:s");

		$update=new updatas();
		$updata=new updatas();
		$update->valores="name='".$name."',"."lastpaternal='".$paternal."',"."lastmaternal='".$maternal."',"."email='".$email."',"."password='".$password."',"."userlevel='".$position."'";
		//echo $update->valores;
		$update->condicion='iduser='.$iduser;
		$update->tabla='userlogin';
		$updata->valores="position='".$speciality."',".
						"statu='".$state."',".
						"professionalicense='".$license."',".
						"ife='".$ife."',".
						"rfc='".$rfc."',".
						"curp='".$curp."',".
						"phone='".$phone."',".
						"mobile='".$mobil."',".
						"marital=".$marital.",".
						"age=".$age.",".
						"borndate='".$borndate."',".
						"sex='".$sex."',".
						"street='".$street."',".
						"numberstreet='".$number."',".
						"colonia='".$colonia."',".
						"community='".$comunity."',".
						"municipality='".$municipaly."',".
						"postcode='".$codep."',".
						"modifydate='".$datemodify."'";
		$updata->condicion='iduser='.$iduser;
		$updata->tabla='userdatas';

		if ($update->cambiar()==true  && $updata->cambiar()==true) {
			//echo "<br>".$updata->valores;
			echo "1";
		}else {
			echo "0";
		}

	}else{
		echo "0";
	}
?>