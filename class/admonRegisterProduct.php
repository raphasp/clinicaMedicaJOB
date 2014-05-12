<?php
include("class.mysql.php");
include("class.alta.php");
	/*echo $_POST['name']."<br>";	
	echo $_POST['lastpaternal']."<br>";
	echo $_POST['lastmaternal']."<br>";
	echo $_POST['email']."<br>";
	echo $_POST['position']."<br>";
	echo $_POST['password']."<br>";*/
	//print_r($_POST);
	if(	isset($_POST['codebar']) && !empty($_POST['codebar']) &&
		isset($_POST['clasification']) && !empty($_POST['clasification']) &&
		isset($_POST['nacionalcode']) &&
		isset($_POST['comercialname']) && !empty($_POST['comercialname']) &&
		isset($_POST['description']) && !empty($_POST['description']) &&
		isset($_POST['laboratory']) && !empty($_POST['laboratory']) &&
		isset($_POST['expiredate']) && !empty($_POST['expiredate']) &&
		isset($_POST['purchaseprice']) && !empty($_POST['purchaseprice']) &&
		isset($_POST['saleprice']) && !empty($_POST['saleprice']) &&
		isset($_POST['activesubtance']) && 
		isset($_POST['containerSelect']) && 
		isset($_POST['unity']) && 
		isset($_POST['routeAdminidtrator'])){

		$codebar=$_POST['codebar'];
		$clasification=$_POST['clasification'];
		$nacionalcode=$_POST['nacionalcode'];
		$comercialname=$_POST['comercialname'];
		$description=$_POST['description'];
		$laboratory=$_POST['laboratory'];
		$expiredate=$_POST['expiredate'];
		$purchaseprice=$_POST['purchaseprice'];
		$saleprice=$_POST['saleprice'];
		$activesubtance=$_POST['activesubtance'];
		$containerSelect=$_POST['containerSelect'];
		$unity=$_POST['unity'];
		$routeAdminidtrator=$_POST['routeAdminidtrator'];
		
		$datecreate=date("Y-m-d H:i:s");

		$add=new alta();
		$add->campos="'$codebar','$clasification','$nacionalcode','$comercialname','$description','$activesubtance','$containerSelect','$unity','$routeAdminidtrator','$laboratory','$expiredate',$purchaseprice,$saleprice,'$datecreate','$datecreate'";
		$add->tabla="medicalproduct";
		
		if ($add->dalta()!=false) {
			$app=new alta();
			$app->campos="'$codebar',0, $purchaseprice, $saleprice,'$datecreate','$datecreate'";
			$app->tabla='totalstock';
			if ($app->dalta()!=false) {
				
				$app->campos="'$codebar',0, 0, $saleprice, $saleprice,'$datecreate'";
				$app->tabla='updatemedicalproduct';
				if($app->dalta()!=false){
					echo $codebar;
				}else{
					echo "0";	
				}
			} else {
				echo "0";
			}
			
		} else {
			echo "0";
		}	
	}else{
		echo "0";
	}
?>