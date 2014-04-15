<?php
	include("class/class.mysql.php");
	include("class/class.authentication.php");	
	if (isset($_POST['username']) &&  
		isset($_POST['password']) && 
		!empty($_POST['password']) &&  
		!empty($_POST['username'])) {
		$name=$_POST['username'];
		$pass=$_POST['password'];
		$athen=new athentication($name, $pass);
		$result=$athen->Verify();
		if ($result!=false) {
			$typo=$res['type'];
			if($typo==0){
				header('Location:admon.php');
			}
			else if ($typo==1) {
				header('Location:doctor.php');
			} 
			else if ($typo==2) {
				header('Location:pharmacy.php');
			} 
			else if($typo==3) {
				header('Location:user.php');
			}
			else if($typo==4) {
				header('Location:userlectureperfil.php');
			}
			} else {
				header("Location:index.html");
			}
	} else {
		header("Location:index.html");
	}
?>