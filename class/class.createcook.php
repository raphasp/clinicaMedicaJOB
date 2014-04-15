<?php
	class cookies
	{
		var $cookv;
		function createcook($name)
		{
			session_start();
			$_SESSION['iduser']=$name;
			$cookv=1;
			return $cookv;
		}
	}
?>