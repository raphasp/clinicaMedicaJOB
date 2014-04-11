<?php
	/**
	* 
	*/
	class xmlstruct
	{
		private $address;
		function __construct($argument)
		{
			$this->address=$argument;
			//echo $this->address;
		}

		public function Container(){
			$docxml= new DOMDocument();
			$docxml->load($this->address);

			$unity=$docxml->getElementsByTagName("envases");
			foreach ($unity as $unidad => $value) {
				$conteiner=$value->getElementsByTagName("envase");
				$contenido=$conteiner->item(0)->nodeValue;
				echo "<option value='".$contenido."'>".ucfirst($contenido)."</option>";
			}
		}
		public function routeAdminidtrator(){
			$docxml= new DOMDocument();
			$docxml->load($this->address);

			$unity=$docxml->getElementsByTagName("viasadministracion");
			foreach ($unity as $unidad => $value) {
				$conteiner=$value->getElementsByTagName("viaadministracion");
				$contenido=$conteiner->item(0)->nodeValue;
				$route=strtolower($contenido);
				echo "<option value='".$contenido."'>".ucfirst($route)."</option>";
			}
		}
	}	
?>