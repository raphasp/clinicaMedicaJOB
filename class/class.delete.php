<?php
class deletecamps extends MySQL
{
	var $tabla="";
	var $condition='';
	function deletedb()
	{
		$deleobj = parent::Delete_bd("delete FROM ".$this->tabla."");
		if($deleobj==true)
		{
			return "1";
		}
		else
		{
			return "0";
		}
	}
	function deletedb_one()
	{
		$deleobj = parent::Delete_bd("delete FROM ".$this->tabla." WHERE ".$this->condition);
		if($deleobj==true)
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