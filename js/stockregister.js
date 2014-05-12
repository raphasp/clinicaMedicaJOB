$(document).on("ready", main);

function main(){
	var clasification;

	$("#perfiluser").hide();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow");		
	});

	$("#saleprice").numeric({ decimal : "." });

	$("#purchaseprice").numeric({ decimal : "." });

	$("#codebar").focusout(function(){
		verifyInputData("#codebar");
		$("#tdcodebar").html($(this).val());
	});

	$("#comercialname").focusout(function(){
		verifyInputData("#comercialname");
		$(this).val(changenUpperCase($(this).val()));
		$("#tdname").html($(this).val());
	});
	
	$("#description").focusout(function(){
		verifyInputData("#description");
		$("#tddescription").html($(this).val());
	});

	$("#laboratory").focusout(function(){
		verifyInputData("#laboratory");
		$("#tdlaboratory").html($(this).val());
	});

	$("input").focusout(function(){
		$(this).val(changenUpperCase($(this).val()));	
	});
	
	$("#purchaseprice").focusout(function(){
		verifyInputData("#purchaseprice");
		$("#tdpurchaseprice").html("$ "+$(this).val());
	});

	$("#saleprice").focusout(function(){
		verifyInputData("#saleprice");
		$("#tdsaleprice").html("$ "+$(this).val());
	});

	$("#clasification").focusout(function(){
		verifySelectData("#clasification");
	});

	$("#clasification").change(function(){
		verifySelectData("#clasification");
		clasification=$(this).val();
		if (clasification=="parafarmacia") {
			$("#divclasification").slideDown( "slow" );
			$("#nacionalcode").attr("required","required");
			slideMedicalForm();
		}else{
			$("#divclasification").slideUp( "slow" );
			$("#nacionalcode").removeAttr("required");
			$("#nacionalcode").val("");
			if(clasification=="medicamento"){
				slideMedicalForm();
				$("#tdclasificacion").html($(this).val());
			}
			else{
				slideMedicalForm();
			}
		}
	});

	$("#nacionalcode").change(function(){
		verifySelectData("#nacionalcode");
	});

	$("#nacionalcode").focusout(function(){
		verifySelectData("#nacionalcode");
	});

	$("#expiredate").change(function(){
		verifySelectData("#expiredate");
		$("#tdexpiredate").html($(this).val());
	});

	$("#expiredate").focusout(function(){
		verifySelectData("#expiredate");
	});

	$("#activesubtance").focusout(function(){
		verifyInputData("#activesubtance");
	});

	$("#containerSelect").focusout(function(){
		verifySelectData("#containerSelect");
	});

	$("#containerSelect").change(function(){
		verifySelectData("#containerSelect");
	});

	$("#unity").focusout(function(){
		verifyInputData("#unity");
	});

	$("#routeAdminidtrator").focusout(function(){
		verifySelectData("#routeAdminidtrator");
	});

	$("#routeAdminidtrator").change(function(){
		verifySelectData("#routeAdminidtrator");
	});

	$("#addProduct").submit(function(e){
		e.preventDefault(); 
		var pet=$(this).attr("action");
		var met=$(this).attr("method");
		var verifyone=verifyFirstForm();
		if (verifyone==false) {
			messageInformation("Mensaje de Alerta",'Algún o algunos  de los campos de formulario están básicos o no cumplen con la especificación requerida',"OK");
		} else{
			addClinicProduct(pet,met);
		}
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

function verifySelectData(string){
	var nextelement=$(string).parent().hasClass("has-error");	
	var valor=$(string).val();
	var req=$(string).attr('required');
	if (valor==""){
		if (req=='required') {
			
			if (nextelement==false) {
				$(string).parent().addClass("has-error");
			}
			else{}
			return false;
		} else{
			//console.log("aqui="+nextelement);
			if (nextelement==false) {
			}
			else{
				$(string).parent().removeClass("has-error");
			}
			return true;
		}
	}
	else{	
		if (nextelement==false) {}
		else{
			$(string).parent().removeClass("has-error");
		}
		return true;
	}
}

function verifyEveryElement(string,requ){
	var valor=$(string).val();
	var req=$(string).attr('required');
	//alert(string+" "+req+" "+requ)
	if (typeof(req)=="undefined") {
		if (valor=="" && requ==1) {
			return false;
		} else{
			return true;
		}
	} else{
		if (valor==""){
			if (req=='required') {
				return false;
			} else{
				return true;
			}
		}
		else{		
			return true;
		}
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

function slideMedicalForm(){
	//var auxUrl=$("#engagement").is(":visible");
	//console.log(auxUrl);
	if ($('#partOne2Product').is(':visible')) {		
		if($("#clasification").val()=="medicamento"){
			requiredMedical();
		}else{
			requiredRemoveMedical();
			$('#partOne2Product').slideUp('slow');
		}
	}else{
		if($("#clasification").val()=="medicamento"){
			$('#partOne2Product').slideDown('slow');
			requiredMedical();
		}else{
			requiredRemoveMedical();
		}
	}
	cleanFormMedical();		
}

function cleanFormMedical(){
	$("#activesubtance").val('');
	cleanInput("#activesubtance");
	$("#containerSelect").val('');
	cleanSelect("#containerSelect");
	$("#unity").val('');
	cleanInput("#unity");
	$("#routeAdminidtrator").val('');
	cleanSelect("#routeAdminidtrator");
}

function cleanInput(string){
	var nextelement=$(string).next().is("i");	
		var valor=$(string).val();
		if ($(string).val()=="" || $(string).val()!=""){
			if (nextelement==true) {
				$(string).next().remove();
			}
			else{}
		}
		else{}
}

function cleanSelect(string){
	var nextelement=$(string).parent().hasClass("has-error");
	var valor=$(string).val();
	if ($(string).val()=="" || $(string).val()!=""){
		if (nextelement==true) {
			$(string).parent().removeClass("has-error");
		}
		else{}
	}
	else{}
}

function requiredMedical(){
	$("#activesubtance").attr("required","required");
	$("#containerSelect").attr("required","required");
	$("#unity").attr("required","required");
	$("#routeAdminidtrator").attr("required","required");
}

function requiredRemoveMedical(){
	$("#activesubtance").removeAttr("required");
	$("#containerSelect").removeAttr("required");
	$("#unity").removeAttr("required");
	$("#routeAdminidtrator").removeAttr("required");
}

function verifyFirstForm(){
	var element=new Array("#codebar","#clasification","#nacionalcode","#comercialname","#description","#laboratory","#expiredate","#purchaseprice","#saleprice");
	var increment=0;
	for (var i = 0; i < element.length; i++) {
		if (i==2) {
			if ($("#clasification").val()=="parafarmacia") {
				if (verifyEveryElement(element[i],1)==true) {
					increment=increment+1;
				}else{}
			} else{
				if (verifyEveryElement(element[i],0)==true) {
					increment=increment+1;
				}else{}
			}
		} else{
			if (verifyEveryElement(element[i],1)==true) {
				increment=increment+1;
			} else{}
		}
	}
	//alert(increment);
	if (increment==element.length) {
		return true;
	} else{
		return false;
	}

}

function addClinicProduct(pet,met){
      $.ajax({
        beforeSend:function(){
        },
        url:pet,
        type:met,
        data:$('#addProduct').serialize(),
        success:function(data){
        	//console.log(data);
          if (data!=0) {
          	var sear=data.search("MySQL");
          	console.log(sear);
          	if(sear>=0){
				messageInformation("Mensaje de Alerta","Se creo un error al tratar de dar de alta en producto es posible que ya exista un producto con el mismo código de barras o verifique su conexión con el servidor.","OK");
          	}else{
				messageInformation("Mensaje de Confirmación ","Se realizó con éxito la admisión del producto en el sistema de la clínica.","OK");
          		slideBtnStock(data);
          	}
          	
          	
          }else{
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del producto en el sistema.","OK");
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del producto en el sistema.","OK");
        },
        complete:function(jqXHR,edo){
        }
      }); 
}

function slideBtnStock(codebar){
	var link="admonproviderproduct.php?code="+codebar;
	$("#btnStock").slideDown("slow");
	$("#btnsForm").slideUp("slow");
	$("#btnStock").find("a").attr("href",link);
}

function changenUpperCase(string){
	return string.charAt(0).toUpperCase() + string.slice(1);
}