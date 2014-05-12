$(document).on("ready", main);

function main(){
	$("#perfiluser").hide();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow");		
	});
}