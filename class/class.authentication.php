<?php
 	class athentication extends MySQL
 	{
 		var	$campos="iduser";
		var $condicion="";
		var $tabla="userlogin";
 		private $email;
 		private $pass;

 		function __construct($em, $ps){
 			$this->email=$em;
 			$this->pass=$ps;
 			parent::__construct();
 		}

 		function Verify(){
			$this->condicion="email='".$this->email."' AND password='".$this->pass."'";
			try {

				$line="select * from ".$this->tabla." WHERE ".$this->condicion;
				$consulta = parent::Select_db($line);
				$num_total_registros = parent::num_rows($consulta);
				//echo $num_total_registros;
				if($num_total_registros>0)
				{
					$result=parent::fetch_array($consulta);
					$encode=athentication::encrypt($result['iduser']);
					session_start();
					$_SESSION['iduser']=$encode;
					//echo $encode."<br>";
					//echo "".$result['iduser'];
	 				return $result['iduser'];
				}
				else
				{	
					return false;
				}
			} catch (Exception $e) {
				echo $e->errorMessage();
			}
 			
				
 		}

 		function encrypt($string){
 			return base64_encode($string);
 		}
 	}
?>