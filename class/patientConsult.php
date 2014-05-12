<?php
	try {
		require("class.mysql.php");
		require("class.alta.php");
		//print_r($_POST);
		if (isset($_POST['idpatient']) && !empty($_POST['idpatient']) &&
			isset($_POST['dates']) && !empty($_POST['dates']) &&
			isset($_POST['hour']) && !empty($_POST['hour']) &&
			isset($_POST['office']) && !empty($_POST['office']) &&
			isset($_POST['doctor']) && !empty($_POST['doctor']) &&
			isset($_POST['type']) && !empty($_POST['type'])) {

			$idpatient=$_POST['idpatient'];
			$dates=$_POST['dates'];
			$time=$_POST['hour'].":00";
			$office=$_POST['office'];
			$doctor=$_POST['doctor'];
			$type=$_POST['type'];

			$add=new alta();
			$add->campos="'',$idpatient,$doctor,'$dates','$time','$office','$type','','','','','','','','','','','','',''";
			//echo $add->campos."<br>";
			$add->tabla='consult';
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