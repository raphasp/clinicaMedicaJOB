<?php
	require("class/class.mysql.php");
	require("class/class.select.php");
	try {
			$busHelp=new selects();
			$busHelp->campos="*";
			$busHelp->tabla='historyfield';
			$searchHelp=$busHelp->select_multi2();
			$arrayHelp = array();
			while ($auxHelp=mysql_fetch_array($searchHelp)) {
				array_push($arrayHelp, $auxHelp['description']);
			}
	} catch (Exception $e) {
		echo '0';
	}
?>