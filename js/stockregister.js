$(document).on("ready", main);

function main(){
	var clasification;

	$("#clasification").change(function(){
		clasification=$(this).val();
		if (clasification=="parafarmacia") {
			$("#divclasification").slideDown( "slow" );
		}else{
			$("#divclasification").slideUp( "slow" );
		}
	});

	$("#perfiluser").hide();
	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow", {}, 4000);		
	});

	$("#saleprice").numeric({ decimal : "." });
	$("#purchaseprice").numeric({ decimal : "." });

	
}