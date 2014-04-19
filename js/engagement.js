$(document).on("ready", main);

function main(){
	var verifyArray = [0, 0, 0, 0, 0, 0];

	$("#perfiluser").hide();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow", {}, 4000);		
	});	
	$("#password").complexify({minimumChars:6, strengthScaleFactor:0.7}, function(valid, complexity){
		var roundvalor=Math.round(complexity).toFixed(0)+"%";
		    if(valid){
		    	//console.log(roundvalor);
				$("#progressbarpass").css({"width":roundvalor,"background-color":"#1fa67a"});

			}
			else{
				//console.log(roundvalor)
				$("#progressbarpass").css({"width":roundvalor,"background-color":"#f24242"});
			}
	  });

	$("#email").on('blur',function(){
		var nextelement=$(this).next().is("i");		// Very simple validation
		if (!/^\S+@\S+\.\S+$/.test($(this).val())){
			verifyArray[ 0 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 0 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#name").on('blur',function(){
		var nextelement=$(this).next().is("i");	
		var valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		if ($(this).val()==""){
			verifyArray[ 1 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 1 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#lastpaternal").on('blur',function(){
		var nextelement=$(this).next().is("i");	
		var valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		if ($(this).val()==""){
			verifyArray[ 2 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 2 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#lastmaternal").on('blur',function(){
		var nextelement=$(this).next().is("i");	
		var valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		if ($(this).val()==""){
			verifyArray[ 3 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 3 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#password").on('blur',function(){
		var nextelement=$(this).next().is("i");	
		if ($(this).val()==""){
			verifyArray[ 4 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 4 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#password1").on('blur',function(){
		var nextelement=$(this).next().is("i");	
		var pass1=$("#password").val();
		if ($(this).val()=="" || $(this).val()!= pass1 ){
			verifyArray[ 5 ]=0;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			verifyArray[ 5 ]=1;
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			//
		}
	});
	$("#engagement").submit(function(e){
		e.preventDefault(); 
		var pet=$(this).attr("action");
		var met=$(this).attr("method");
		console.log(verifyArray);
		var verify=verifyInput(verifyArray);
		if (verify==false) {
			messageInformation("Mensaje de alerta",'Algún o algunos  de los campos de formulario están básicos o no cumplen con la especificación requerida',"Cerrar");
		}else{
			var info=$(this).serialize();
			alert(pet+met+info);
		}
	});
}

function changenUpperCase(string){
	return string.charAt(0).toUpperCase() + string.slice(1);
}

function verifyInput(string){
	var increment=0;
 	for (var i = string.length - 1; i >= 0; i--) {
 		increment=increment+string[i];
 	}
 	console.log(increment);
 	if (increment==6) {
 		return true;
 	}else{
 		return false;
 	}
}

function messageInformation(titletxt,messagetxt,btntext){
	BootstrapDialog.show({
		title: titletxt,
		message: messagetxt,
		buttons: [{
		    label: btntext,
		    action: function(dialogItself){
		    dialogItself.close();
		    }
		}]
		});
}