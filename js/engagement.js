$(document).on("ready", main);

function main(){
	var verifyArray = [0, 0, 0, 0, 0, 0, 0];
	var verifyArrayData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var valor="";
	loadTableEmployed();
	$("#phone").mask("999-999-9999");
	$("#mobil").mask("999-999-9999");
	$("#age").mask("99");
	//$("#curp").mask("AAAA999999AAAAAA99");
	$("#codep").numeric();
	$("#license").numeric();

	$("#perfiluser").hide();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();		
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
	$("#email").on('focusout',function(){
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
	$("#name").on('focusout',function(){
		var nextelement=$(this).next().is("i");	
		valor=$(this).val();
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
	$("#lastpaternal").on('focusout',function(){
		var nextelement=$(this).next().is("i");	
		valor=$(this).val();
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
	$("#lastmaternal").on('focusout',function(){
		var nextelement=$(this).next().is("i");	
		valor=$(this).val();
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
	$("#password").on('focusout',function(){
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
	$("#password1").on('focusout',function(){
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
	$("#showfield").on('click',function(){
		$("input").each(function(){
			var readonly = $(this).attr("required");
			var id = $(this).attr("id");
		    if(readonly!='required' && id!="license") { // this is readonly
		        $(this).parent().parent().slideToggle();
		    }
		});
		$("select").each(function(){
			var readonly = $(this).attr("required");
			var id=$(this).attr("id");
			//console.log(id);
		    if(readonly!='required' && id!='speciality') { // this is readonly
		        $(this).parent().parent().slideToggle();
		    }
		});
	});
	$("#position").change(function(){
		$("#position option:selected").each(function(){
			var valor=$(this).val();
			if(valor=="D"){
				$("#speciality option:first").attr('selected','selected');
				$("#license").val("");
				var nextelement=$("#license").next().is("i");
				if (nextelement==true) {
					$("#license").next().remove();
				}
				verifyArrayData[ 1 ]=0;
				verifyArrayData[ 5 ]=0;
				$("#divspeciality").slideDown();	
				if($("#divlicense").is(":visible")){
				}else{
					$("#divlicense").slideDown();
				}
				$("#speciality").attr("required",'required');
				$("#license").attr("required",'required');
			}else{
				$("#speciality option:first").attr('selected','selected');
				$("#license").val("");
				verifyArrayData[ 1 ]=0;
				verifyArrayData[ 5 ]=0;
				var nextelement=$("#license").next().is("i");
				if (nextelement==true) {
					$("#license").next().remove();
				}
				$("#divspeciality").slideUp();
				$("#speciality").removeAttr('required');
				if (valor=="E") {
					if($("#divlicense").is(":visible")){
					}else{
						$("#divlicense").slideDown();
					}
					$("#license").attr("required",'required');
				}else{
					$("#divlicense").slideUp();
					$("#license").removeAttr('required');
				}	
			}
			
		});
		var resultado=verifySelectData("#position");
		if (resultado==false){
			verifyArray[ 6 ]=0;
		}
		else{
			verifyArray[ 6 ]=1;
		}
	});
	$("#state").change(function(){
		var resul=(verifySelectData("#state"));
		if (resul==false){
			verifyArrayData[ 0 ]=0;
		}
		else{
			verifyArrayData[ 0 ]=1;
		}
	});
	$("#speciality").change(function(){
		var resul=(verifySelectData("#speciality"));
		if (resul==false){
			verifyArrayData[ 1 ]=0;
		}
		else{
			verifyArrayData[ 1 ]=1;
		}
	});
	$("#marital").change(function(){
		var resul=(verifySelectData("#marital"));
		if (resul==false){
			verifyArrayData[ 2 ]=0;
		}
		else{
			verifyArrayData[ 2 ]=1;
		}
	});
	$("#sex").change(function(){
		var resul=(verifySelectData("#sex"));
		if (resul==false){
			verifyArrayData[ 3 ]=0;
		}
		else{
			verifyArrayData[ 3 ]=1;
		}
	});
	$("#borndate").change(function(){
		//console.log($("#borndate").val());
		var resul=(verifySelectData("#borndate"));
		if (resul==false){
			verifyArrayData[ 4 ]=0;
		}
		else{
			verifyArrayData[ 4 ]=1;
		}
	});
	$("#license").on("focusout",function(){
		var resul=verifyInputData("#license");
		if (resul==false){
			verifyArrayData[ 5 ]=0;
		}
		else{
			verifyArrayData[ 5 ]=1;
		}
	});
	$("#ife").on("focusout",function(){
		var resul=verifyInputData("#ife");
		if (resul==false){
			verifyArrayData[ 6 ]=0;
		}
		else{
			verifyArrayData[ 6 ]=1;
		}
		$(this).css('text-transform', 'uppercase');
	});
	$("#rfc").on("focusout",function(){
		var resul=verifyInputData("#rfc");
		if (resul==false){
			verifyArrayData[ 7 ]=0;
		}
		else{
			verifyArrayData[ 7 ]=1;
		}
		$(this).css('text-transform', 'uppercase');
	});
	$("#curp").on("focusout",function(){
		var resul=verifyInputData("#curp");
		if (resul==false){
			verifyArrayData[ 8 ]=0;
		}
		else{
			verifyArrayData[ 8 ]=1;
		}
		$(this).css('text-transform', 'uppercase');
	});
	$("#phone").on("focusout",function(){
		valor=$(this).val();
		if(valor=="___-___-____"){
			$(this).val("");
		}	
		var resul=verifyInputData("#phone");
		//console.log($("#phone").val());
		if (resul==false){
			verifyArrayData[ 9 ]=0;
		}
		else{
			verifyArrayData[ 9 ]=1;
		}
	});
	$("#mobil").on("focusout",function(){
		valor=$(this).val();
		if(valor=="___-___-____"){
			$(this).val("");
		}
		var resul=verifyInputData("#mobil");
		if (resul==false){
			verifyArrayData[ 10 ]=0;
		}
		else{
			verifyArrayData[ 10 ]=1;
		}
	});
	$("#age").on("focusout",function(){
		var classAux=$(this).parent().parent().hasClass("has-error");	
		valor=$(this).val();
		if(valor=="__"){
			$(this).val("");
		}
		var resul=verifyInputData("#age");
		if (resul==false){
			verifyArrayData[ 11 ]=0;
			if (classAux==false) {
				$(this).parent().parent().addClass("has-error");
			} else{}
		}
		else{
			var num=$("#age").val();
			if(num>15 && num<65){
				verifyArrayData[ 11 ]=1;
				if (classAux==false) {
				}else{
					$(this).parent().parent().removeClass("has-error");
				}
			}else{
				verifyArrayData[ 11 ]=0;
				if (classAux==false) {
					$(this).parent().parent().addClass("has-error");
				}else{}
			}
		}
	});
	$("#street").on("focusout",function(){
		var resul=verifyInputData("#");
		if (resul==false){
			verifyArrayData[ 12 ]=0;
		}
		else{
			verifyArrayData[ 12 ]=1;
		}
	});
	$("#number").on("focusout",function(){
		var resul=verifyInputData("#");
		if (resul==false){
			verifyArrayData[ 13 ]=0;
		}
		else{
			verifyArrayData[ 13 ]=1;
		}
	});
	$("#colonia").on("focusout",function(){
		valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		var resul=verifyInputData("#colonia");
		if (resul==false){
			verifyArrayData[ 14 ]=0;
		}
		else{
			verifyArrayData[ 14 ]=1;
		}
	});
	$("#comunity").on("focusout",function(){
		valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		var resul=verifyInputData("#comunity");
		if (resul==false){
			verifyArrayData[ 15 ]=0;
		}
		else{
			verifyArrayData[ 15 ]=1;
		}
	});
	$("#municipaly").on("focusout",function(){
		valor=$(this).val();
		valor=changenUpperCase(valor);	// Very simple validation
		$(this).val(valor);
		var resul=verifyInputData("#municipaly");
		if (resul==false){
			verifyArrayData[ 16 ]=0;
		}
		else{
			verifyArrayData[ 16 ]=1;
		}
	});
	$("#codep").on("focusout",function(){
		var resul=verifyInputData("#codep");	
		if (resul==false){
			verifyArrayData[ 17 ]=0;
		}
		else{
			verifyArrayData[ 17 ]=1;
		}
	});
	
	$("#engagement").submit(function(e){
		e.preventDefault(); 
		var pet="class/"+$(this).attr("action");
		var met=$(this).attr("method");
		//console.log(verifyArrayData);
		var verify=verifyInput(verifyArray,7);
		var verifysf=verifySecondForm(verifyArrayData);
		//console.log(verifysf);
		if ($(this).attr("action")=='addEngagement.php') {
			if (verify==false || verifysf==false) {
				messageInformation("Mensaje de Alerta",'Algún o algunos  de los campos de formulario están básicos o no cumplen con la especificación requerida',"OK");
			}else{
				//var info=$(this).serialize();
				addEngagement(pet,met);			
			}
		} else{
			updataEmployed(pet, met);
		}
			
	});

	$("#Add-empleado").on("click",function(){
		slideAddForm();
	});

	$("#engagement").on("reset",function(){
		$('#engagement').slideUp('slow');
		$("#engagement").attr("action","");
		animateTabEqual();
		$("#Add-empleado").find("span").toggleClass("glyphicon-collapse-up").toggleClass("glyphicon-expand");	
		cleanFormAddEngagement();	
	});

	$("#engagementbody").delegate("tr","click",function(){
		var id=$(this).attr("id");	
		loadDataEmployed(id);
		slideUpdataForm();
	});
}

function changenUpperCase(string){
	return string.charAt(0).toUpperCase() + string.slice(1);
}

function verifyInput(string,limit){
	var increment=0;
 	for (var i = string.length - 1; i >= 0; i--) {
 		increment=increment+string[i];
 	}
 	//console.log(increment);
 	if (increment==limit) {
 		return true;
 	}else{
 		return false;
 	}
}

function verifySecondForm(string){
	var increment=0;
	var element=$("#position option:selected").val();
	if (element=="D" || element=='E') {
		if (element=="E") {
			for (var i = 0; i < string.length; i++) {
				//console.log(string[i]);
				if(i==1  || i==9  || i==10 || i==12 || i==13 || i==14 || i==17){
		 			increment=increment+1;
		 		}else{
					increment=increment+string[i];
		 		}
			}
		} else{
			for (var i = 0; i < string.length; i++) {
				//console.log(string[i]);
				if(i==9  || i==10 || i==12 || i==13 || i==14 || i==17){
		 			increment=increment+1;
		 		}else{
					increment=increment+string[i];
		 		}
			}
		}
	} else{
		for (var i = string.length - 1; i >= 0; i--) {
	 		if(i==1  || i==5 || i==9  || i==10 || i==12 || i==13 || i==14 || i==17){
	 			increment=increment+1;
	 		}else{
				increment=increment+string[i];
	 		}
	 	}	
	}
	//console.log(increment);
 	if (increment==18) {
 		return increment;
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

function messageAskAdd(titletxt,messagetxt){
	BootstrapDialog.show({
            title: titletxt,
            message: messagetxt,
            buttons: [{
                label: 'No',
                action: function(dialog) {
                    dialog.close();
                    return false;
                }
            }, {
                label: 'Si',
                action: function(dialog) {
                    dialog.close();
                    return true;
                }
            }]
        });
}

function cleanFormAddEngagement(){
	$("#name").val('');
	cleanInput("#name");
	$("#lastpaternal").val('');
	cleanInput("#lastpaternal");
	$("#lastmaternal").val('');
	cleanInput("#lastmaternal");
	$("#email").val('');
	cleanInput("#email");
	$("#position").val('');
	cleanInput("#position");
	$("#password").val('');
	cleanInput("#password");
	$("#password1").val('');
	cleanInput("#password1");
	$("#progressbarpass").css("width","0%");
	cleanInput("#state");
	$("#state").val('');
	cleanInput("#speciality");
	$("#speciality").val('');
	cleanInput("#license");
	$("#license").val('');
	cleanInput("#ife");
	$("#ife").val('');
	cleanInput("#rfc");
	$("#rfc").val('');
	cleanInput("#curp");
	$("#curp").val('');
	cleanInput("#phone");
	$("#phone").val('');
	cleanInput("#mobil");
	$("#mobil").val('');
	cleanInput("#marital");
	$("#marital").val('');
	cleanInput("#age");
	$("#age").val('');
	cleanInput("#borndate");
	$("#borndate").val('');
	cleanInput("#sex");
	$("#sex").val('');
	cleanInput("#street");
	$("#street").val('');
	cleanInput("#number");
	$("#number").val('');
	cleanInput("#colonia");
	$("#colonia").val('');
	cleanInput("#comunity");
	$("#comunity").val('');
	cleanInput("#municipaly");
	$("#municipaly").val('');
	cleanInput("#codep");	
	$("#codep").val('');
}

function slideAddForm(){
	//var auxUrl=$("#engagement").is(":visible");
	//console.log(auxUrl);
	if ($('#engagement').is(':visible')) {		
		if($("#Update-empleado").css('width')>$("#Add-empleado").css('width')){
			animateTabAdd();
			$("#Add-empleado").css({"border-bottom":"3px solid #31bc86"})
			$("#engagement").attr("action","addEngagement.php");
			$("#btnSubmit").text("Agregar");
		}else{
			$('#engagement').slideUp('slow');
			$("#engagement").attr("action","");
			animateTabEqual();
		}
	}else{
		animateTabAdd();
		$("#Add-empleado").css({"border-bottom":"3px solid #31bc86"});
		$('#engagement').slideDown('slow');
		$("#engagement").attr("action","addEngagement.php");
		$("#btnSubmit").text("Agregar");
	}
	//$("#engagement").slideToggle("slow");
	//$("#Add-empleado").find("span").toggleClass("glyphicon-collapse-up").toggleClass("glyphicon-expand");	
	cleanFormAddEngagement();		
}

function slideUpdataForm(){	
	if ($('#engagement').is(':visible')) {
		$("#engagement").attr("action","updataEngagement.php");
		$("#Update-empleado").css({"border-bottom":"3px solid #31bc86"});
		$("#btnSubmit").text("Actualizar");
		if($("#Update-empleado").css('width')>$("#Add-empleado").css('width')){
		}else{
			animateTabUpdata();
		}
	}else{
		$("#Update-empleado").css({"border-bottom":"3px solid #31bc86"});
		animateTabUpdata();
		$('#engagement').slideDown('slow');
		$("#engagement").attr("action","updataEngagement.php");
		$("#btnSubmit").text("Actualizar");

	}	
}

function animateTabUpdata(){
	$("#Add-empleado").animate({
	    width: "25%"
	 }, 500 );
	$("#Add-empleado").css({"border-bottom":"3px solid #FCFCFC"});
	$("#Update-empleado").animate({
	    width: "65%",
	}, 1000 );
}

function animateTabAdd(){
	$("#Update-empleado").animate({
	    width: "40%",
	}, 500 );
	$("#Update-empleado").css({"border-bottom":"3px solid #FCFCFC"});
	$("#Add-empleado").animate({
	    width: "55%"
	 }, 1000 );
}

function animateTabEqual(){
	$("#Update-empleado").animate({
	    width: "45%",
	}, 500 );
	$("#Add-empleado").animate({
	    width: "45%"
	 }, 500 );
	$("#Update-empleado").css({"border-bottom":"3px solid #FCFCFC"});
	$("#Add-empleado").css({"border-bottom":"3px solid #FCFCFC"});
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

function verifyInputDataTwo(string){
	var valor=$(string).val();
	var req=$(string).attr('required');
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

function verifySelectDataTow(string){
	var valor=$(string).val();
	var req=$(string).attr('required');
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

function addEngagement(pet,met){
      $.ajax({
        beforeSend:function(){
        },
        url:pet,
        type:met,
        data:$('#engagement').serialize(),
        success:function(data){
        	//console.log(data);
          if (data!=0) {
          	messageInformation("Mensaje de Confirmación ","Se realizó con éxito la admisión del empleado en el sistema de la clínica.","OK");
          	irScroll("#updataproduct");
          	slideAddForm();
          	loadTableEmployed();
          }else{
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del empleado en el sistema.","OK");
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del empleado en el sistema.","OK");
        },
        complete:function(jqXHR,edo){
        }
      }); 
}

function irScroll(id){
  $("body, html").animate({
    scrollTop:$(id).offset().top-110,
  },500);
  return false;
}

function loadTableEmployed(){
	var pet="class/enployedtable.php";
  $.get(pet,function(data){
    $("#engagementbody").empty();
    $("#engagementbody").append(data);
  }).fail(function() { 
  	messageInformation("Mensaje de Error","Se produjo un error interno al cargar la lista de empleados.","OK");
   });
}

function loadDataEmployed(iduser){
	var id=iduser;
  	var pet="class/dataEmployed.php";
  	$.get(pet,{id:id},function(data){
    	if (data!=0) {
	    	var dataJson = eval(data);
	    	var iduser='',names='',lastpaternal="",lastmaternal="",email="",position="",password="",state="",speciality="",license="",ife="",rfc="",curp="",phone="",mobil="",marital="",age="",borndate="",sex="",street="",number="",colonia="",comunity="",municipaly="",codep="";
	      	for(var i in dataJson){
	        	iduser=dataJson[i].iduser;
				name=dataJson[i].names;
				lastpaternal=dataJson[i].lastpaternal;
				lastmaternal=dataJson[i].lastmaternal;
				email=dataJson[i].email;
				password=dataJson[i].password;
				userlevel=dataJson[i].userlevel;
				position=dataJson[i].position;
				statu=dataJson[i].statu;
				professionalicense=dataJson[i].professionalicense;
				ife=dataJson[i].ife;
				rfc=dataJson[i].rfc;
				curp=dataJson[i].curp;
				phone=dataJson[i].phone;
				mobile=dataJson[i].mobile;
				marital=dataJson[i].marital;
				age=dataJson[i].age;
				borndate=dataJson[i].borndate;
				sex=dataJson[i].sex;
				street=dataJson[i].street;
				numberstreet=dataJson[i].numberstreet;
				colonia=dataJson[i].colonia;
				community=dataJson[i].community;
				municipality=dataJson[i].municipality;
				postcode=dataJson[i].postcode;
	      	} 
	      	cleanFormAddEngagement();
	      	$("#iduser").val(iduser);
			$("#name").val(name);
			$("#lastpaternal").val(lastpaternal);
			$("#lastmaternal").val(lastmaternal);
			$("#email").val(email);
			$("#password").val(password);
			$("#password1").val(password);
			$("#position").val(userlevel);
			//verifyFormOne(arrayData);
			if(userlevel=="D"){
				$("#speciality option:first").attr('selected','selected');
				$("#license").val("");
				var nextelement=$("#license").next().is("i");
				if (nextelement==true) {
					$("#license").next().remove();
				}
				$("#divspeciality").slideDown();	
				if($("#divlicense").is(":visible")){
				}else{
					$("#divlicense").slideDown();
				}
				$("#speciality").attr("required",'required');
				$("#license").attr("required",'required');
			}else{
				$("#speciality option:first").attr('selected','selected');
				$("#license").val("");
				var nextelement=$("#license").next().is("i");
				if (nextelement==true) {
					$("#license").next().remove();
				}
				$("#divspeciality").slideUp();
				$("#speciality").removeAttr('required');
				if (userlevel=="E") {
					if($("#divlicense").is(":visible")){
					}else{
						$("#divlicense").slideDown();
					}
					$("#license").attr("required",'required');
				}else{
					$("#divlicense").slideUp();
					$("#license").removeAttr('required');
				}	
			}
			$("#state").val(statu);
			$("#speciality").val(position);
			$("#license").val(professionalicense);
			$("#ife").val(ife);
			$("#rfc").val(rfc);
			$("#curp").val(curp);
			$("#phone").val(phone);
			$("#mobile").val(mobile);
			$("#marital").val(marital);
			$("#age").val(age);
			$("#borndate").val(borndate);
			$("#sex").val(sex);
			$("#street").val(street);
			$("#number").val(numberstreet);
			$("#colonia").val(colonia);
			$("#comunity").val(community);
			$("#municipaly").val(municipality);
			$("#codep").val(postcode);
    	}else{
    		messageInformation("Mensaje de Error","Se produjo un error interno al momento de buscar los del empleado en el sistema.","OK");     
    	}
  	}).fail(function() { messageInformation("Mensaje de Error","Se produjo un error interno al momento de buscar los del empleado en el sistema.","OK");
  	 });
}

function updataEmployed(pet, met){
      $.ajax({
        beforeSend:function(){
        },
        url:pet,
        type:met,
        data:$('#engagement').serialize(),
        success:function(data){
        	//console.log(data);
          if (data==1) {
          	messageInformation("Mensaje de Confirmación ","Se realizó con éxito la actualización del empleado en el sistema de la clínica.","OK");
          	irScroll("#updataproduct");
          	slideUpdataForm();
          	loadTableEmployed();
          	console.log(data);
          }else{
          	console.log(data);
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del empleado en el sistema.","OK");
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del empleado en el sistema.","OK");
        },
        complete:function(jqXHR,edo){
        }
      }); 
}

function verifyFormOne(form){
	var element=new Array("#email","#name","#lastpaternal","#lastmaternal","#password","#password1","#position");

	for (var i = 0; i < element.length; i++) {
		if (i==7) {
			var resul=(verifySelectData(element[i]));
			if (resul==false){
				form[ i ]=0;
			}
			else{
				form[ i ]=1;
			}
		}else{
			var result=verifyInputDataTwo(element[i]);
			if (result==true){
				form[ i ]=1;
			}
			else{
				form[ i ]=2;
			}
		}			
	}
	return form;
}

function verifyFormTwo(form){
	$element=new Array("#speciality","#marital","#sex","#borndate");
	$element=new Array("#state","#license","#ife","#rfc","#curp","#phone","#mobil","#age","#street","#number","#colonia","#comunity","#municipaly","#codep");
}