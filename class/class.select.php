<?php
class selects extends MySQL
{
	var	$campos="";
	var $log="";
	var $pass="";
	var $condicion="";
	var $tabla="";
	
	/*function __construct($cp, $tb, $cd){
		$tabla=$tb;
		$campos=$cp;
		$condicion=$cd;
	}*/

	function seleccion()
	{
		$consulta = parent::Select_db("SELECT * FROM ".$this->tabla." WHERE ".$this->condicion);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$result=parent::fetch_array($consulta);
			return $result;
		}else
		{
			return false;
		}
	}

	function contar()
	{
		$consulta = parent::Select_db("SELECT * FROM ".$this->tabla." WHERE ".$this->condicion);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			return $num_total_registros;
		}else
		{
			return false;
		}
	}
	
	function select_multi()
	{
		$consulta = parent::Select_db("SELECT ".$this->campos." FROM ".$this->tabla." WHERE ".$this->condicion);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			return $num_total_registros;
		}
		else
		{
			return false;
		}
	}

	function select_total()
	{
		$consulta = parent::Select_db("SELECT ".$this->campos." FROM ".$this->tabla." WHERE ".$this->condicion);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			return $consulta;
		}
		else
		{
			return false;
		}
	}

	function select_multi2()
	{
		$consulta = parent::Select_db("SELECT ".$this->campos." FROM ".$this->tabla);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			return $consulta;
		}
		else
		{
			return false;
		}
	}
}
?>