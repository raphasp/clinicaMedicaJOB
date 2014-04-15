<?php
class encryp  
{
	var $key="admon";
	function encrypt($string) {
	   return base64_encode($string);
	}
	function decrypt($string) {
	   $result = base64_decode($string);
	   return $result;
	}
	/*function encrypt($string) {
	   $result = '';
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
	      $char = chr(ord($char)+ord($keychar));
	      $result.=$char;
	   }
	   return base64_encode($result);
	}


	function decrypt($string) {
	   $result = '';
	   $string = base64_decode($string);
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
	      $char = chr(ord($char)-ord($keychar));
	      $result.=$char;
	   }
	   return $result;
	}*/
}
?>
