<?php
class update extends MySQL
{
	var $condicion="";
	var $valores="";
	var $tabla = "";
	function cambiar()
	{
		$consulta = parent::Updata_db("UPDATE ".$this->tabla." SET ".$this->valores." WHERE ".$this->condicion);
		if ($consulta==true) {
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>