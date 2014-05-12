<?php
try {
	session_start();
	if(isset($_SESSION['iduser']))
	{
		include("class.mysql.php");
		include("class.select.php");
		include("class.encryp.php");
		$iduser=$_SESSION['iduser'];
		$cadena=new encryp();
		$encode=$cadena->decrypt($iduser);
		$condition="iduser=".$encode."";
		$search=new selects();
		$search->tabla='userlogin';
		$search->condicion=$condition;
		$result=$search->seleccion();
		if($result!=false)
		{
			$typo=$result['userlevel'];
			if($typo=="A"){
				echo 'admon.php';
			}
			else if ($typo=="R") {
				echo 'reception.php';
			} 
			else if ($typo==2) {
				echo 'pharmacy.php';
			} 
			else if($typo==3) {
				echo 'user.php';
			}
			else if($typo==4) {
				echo 'userlectureperfil.php';
			}else {
				echo "index.html";
			}

		}else {
 			echo "error";
 		}
	}
	else{
		echo "error";
	}
} catch (Exception $e) {
	echo "error";
}
?>
