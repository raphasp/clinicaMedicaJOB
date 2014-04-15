<?php
class MySQL
{
  var $conexion;
  function __construct()
  {
  	if(!isset($this->conexion)|| empty($this->conexion))
	{
		//$this->conexion = (mysql_connect("localhost","uaematla_admin","Psico_2013_admon")) or die(mysql_error());
  		$this->conexion = (mysql_connect("localhost","root","")) or die(mysql_error());
  		//$this->conexion = (mysql_connect("192.168.1.2","admin","bBLaXKFsJU6RAFVF")) or die(mysql_error());
  		mysql_select_db("mydb",$this->conexion) or die(mysql_error());
  		//mysql_select_db("uaematla_psico",$this->conexion) or die(mysql_error());
  	}
  }
 function Add_bd($alta)
 {
	if(mysql_query($alta,$this->conexion))
	{
  		return true;
	}
	else
	{
		echo 'MySQL Error: ' . mysql_error();
	    exit;
	}
 }
 function Updata_db($up) 
 {
	if(mysql_query($up,$this->conexion))
	{
  		return true;
	}
	else
	{
		echo 'MySQL Error: ' . mysql_error();
	    exit;
	}
 }
 function Delete_bd($deletefields)
 {
	if(mysql_query($deletefields,$this->conexion))
	{
  		return true;
	}
	else
	{
		echo 'MySQL Error: ' . mysql_error();
	    exit;
	}
 }
 function Select_db($consulta)
 {
  	if($resultado = mysql_query($consulta,$this->conexion))
	{
  		return $resultado;
	}
	else
	{
		echo 'MySQL Error: ' . mysql_error()."  " .$consulta;
	    exit;
	}
  }
 function fetch_array($consulta)
 { 
  	return mysql_fetch_array($consulta);
 }
 function num_rows($consulta)
 { 
 	 return mysql_num_rows($consulta);
 }
 function fetch_row($consulta)
 { 
 	 return mysql_fetch_row($consulta);
 }
 function fetch_assoc($consulta)
 {
 	 return mysql_fetch_assoc($consulta);
 }
}

?>