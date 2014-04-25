<?php
/*include("class.mysql.php");
include("class.alta.php");
	if ($fh = fopen('speciality.txt','r')) {
		$app=new alta();
		while ($line = fgets($fh)) {
		  echo($line);
			$app->campos="'','$line'";
			$app->tabla='speciality';
			if ($app->dalta()!=false) {
				echo " Good<br>";
			} else {
				echo " Bad<br>";
			}
		}
		fclose($fh);
	} else {
		echo "error";
	}
	include("class.mysql.php");
	include("class.select.php");
	$allsp=new selects();
	$allsp->campos="*";
	$allsp->tabla='speciality order by name ASC ';
	$allspe=$allengagement->select_multi2();
	if($allspe=true){
		$arr=array();
		while($Aux=mysql_fetch_array($allsp)){
			$arr[]=array('id' => $Aux['Id'],
						 'name' => $Aux['name']);
		}
		echo '' . json_encode($arr) . '';
	}else{
		echo '0';
	}*/
?>