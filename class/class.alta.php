<?php
class alta extends MySQL
{
	var $tabla="";
	var $campos="";
	function dalta()
	{
		$altas = parent::Add_bd("INSERT INTO ".$this->tabla." VALUES(".$this->campos.")");
		if($altas==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>