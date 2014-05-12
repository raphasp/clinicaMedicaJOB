$(document).on("ready", main);

function main(){
	$("#perfiluser").hide();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow");		
	});

	$("input").focusout(function(){
		verifyInputData("#codebar");
	});
}

function verifyInputData(string){
	var nextelement=$(string).next().is("i");	
	var valor=$(string).val();
	var req=$(string).attr('required');
	if (valor==""){
		if (req=='required') {
			if (nextelement==true) {
				$(string).next().remove();
				$(string).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(string).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			return false;
		} else{
			if (nextelement==true) {
				$(string).next().remove();
			}
			else{}
			return true;
		}
	}
	else{		
		if (nextelement==true) {
			$(string).next().remove();
			$(string).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
		}
		else{
			$(string).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
		}
		return true;
	}
}