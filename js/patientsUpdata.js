$(document).on("ready", main);

(function($) {
    $.fn.toggleDisabled = function() {
        return this.each(function() {
            var $this = $(this);
            if ($this.attr('disabled')) $this.removeAttr('disabled');
            else $this.attr('disabled', 'disabled');
        });
    };
})(jQuery);

function main(){
	loadData();

	$("#phone").mask("(999)-999-9999");

	$("#cellphone").mask("(999)-999-9999");

	$("#perfiluser").hide();

	$("#age").numeric();
	
	$("#code").numeric();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow");		
	});

	$("input").focusout(function(){
		valor=$(this).val();
		
		if ($(this).attr("type")=="text")  {
			if(valor=="(___)-___-____"){
				$(this).val("");
			}
			verifyInputData("#"+$(this).attr("id"));
			var valor=changenUpperCase($(this).val());
			$(this).val(valor);
		}else{
			if ($(this).attr("type")=="email") {
				verifyInputEmail("#"+$(this).attr("id"));
			} else{
				verifySelectData("#"+$(this).attr("id"));
			}				
		}
	});

	$("select").change(function(){
		verifySelectData("#"+$(this).attr("id"));
	});

	$("select").focusout(function(){
		verifySelectData("#"+$(this).attr("id"));
	});

	$("#cleanall").on("click",function(){
		cleanAll();
		irScroll(".margintopconteiner");
	});

	allEditor();

	$("#patientAdd").submit(function(e){
		e.preventDefault(); 
		var pet=$(this).attr("action");
		var met=$(this).attr("method");
		if (verifyForm()==false) {
			messageInformation("Mensaje de Alerta",'Algún o algunos  de los campos de formulario están básicos o no cumplen con la especificación requerida',"OK",BootstrapDialog.TYPE_WARNING);
		} else{
			updataPatient(pet,met);
		}		
	});

	$("#taphepl").on("click",function(){
		$("#formHelpModal").modal();
	});

	$( "input[type=checkbox]" ).on( "click", function(){
		if ($(this).is(':checked')) {
			var aux=Array();
			aux[0]=$("#helppathologic").find(".tabhelpbody").html();
			aux[1]=$("#helpfamily").find(".tabhelpbody").html();
			aux[2]=$("#helpnopathologic").find(".tabhelpbody").html();
			aux[3]=$("#helpactually").find(".tabhelpbody").html();
			aux[4]=$("#helpdevices").find(".tabhelpbody").html();
			aux[5]=$("#helpphysics").find(".tabhelpbody").html();
			aux[6]=$("#helpprevius").find(".tabhelpbody").html();
			//console.log(aux);
			$("#pathologic").find(".note-editable").html(aux[0]);
			$("#family").find(".note-editable").html(aux[1]);
			$("#nopathologic").find(".note-editable").html(aux[2]);
			$("#actually").find(".note-editable").html(aux[3]);
			$("#devices").find(".note-editable").html(aux[4]);
			$("#physics").find(".note-editable").html(aux[5]); 
			$("#previus").find(".note-editable").html(aux[6]); 
		} else{
			//alert("aqui");
			$("#pathologic").find(".note-editable").empty();
			$("#family").find(".note-editable").empty();
			$("#nopathologic").find(".note-editable").empty();
			$("#actually").find(".note-editable").empty();
			$("#devices").find(".note-editable").empty();
			$("#physics").find(".note-editable").empty(); 
			$("#previus").find(".note-editable").empty(); 
		}
	});

	$("#btnConsult").on("click", function(){
		//e.preventDefault(); 
		var pet=$("#formConsult").attr("action");
		var met=$("#formConsult").attr("method");
		addConsult(pet,met);
	});

	$("#edit-patient").on("click",function(){
		$("input").toggleDisabled();
		$('select').toggleDisabled();
	});

	$("#consult-patient").on("click", function(){
		/*var datos=$.parseHTML($("#formConsult").html());
		messageAsk("Descripción de la Cita",datos,BootstrapDialog.TYPE_WARNING);*/
		$("#formConsultModal").modal()
	});

	$('#formConsultModal').on('hidden.bs.modal', function (e) {
  		cleanSecondForm();
	});
}

function verifyInputEmail(string){
	$(string).on('focusout',function(){
		var nextelement=$(this).next().is("i");		// Very simple validation
		if (!/^\S+@\S+\.\S+$/.test($(this).val())){
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-remove form-control-feedback'></i>");
			}
		}
		else{
			if (nextelement==true) {
				$(this).next().remove();
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
			else{
				$(this).after("<i class='glyphicon glyphicon-ok form-control-feedback'></i>");
			}
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
	var nextelement=$(string).parent().parent().hasClass("has-error");	
	var valor=$(string).val();
	var req=$(string).attr('required');
	if (valor==""){
		if (req=='required') {
			
			if (nextelement==false) {
				$(string).parent().parent().addClass("has-error");
			}
			else{}
			return false;
		} else{
			//console.log("aqui="+nextelement);
			if (nextelement==false) {
			}
			else{
				$(string).parent().parent().removeClass("has-error");
			}
			return true;
		}
	}
	else{	
		if (nextelement==false) {}
		else{
			$(string).parent().parent().removeClass("has-error");
		}
		return true;
	}
}

function changenUpperCase(string){
	return string.charAt(0).toUpperCase() + string.slice(1);
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

function verifyForm(){
	var element=new Array("#name","#app","#apm","#sex","#borndate","#age","#bloodgroup","#phone","#cellphone","#marital","#address","#community","#municipaly","#code","#levelschool","#profesional","#religion","#email","#observation");
	var requiredElement=new Array(1,1,1,1,1,1,0,0,0,0,1,1,1,0,0,0,0,0,0);
	var increment=0;
	for (var i = 0; i < element.length; i++) {
		if (verifyEveryElement(element[i],requiredElement[i])==true) {
			increment=increment+1;
		}else{

		}
	}
	//alert(increment);
	if (increment==element.length) {
		return true;
	} else{
		return false;
	}
}

function cleanAll(){
	var element=new Array("#name","#app","#apm","#sex","#borndate","#age","#bloodgroup","#phone","#cellphone","#marital","#address","#community","#municipaly","#code","#levelschool","#profesional","#religion","#email","#observation");
	for (var i = 0; i < element.length; i++) {
		$(element[i]).val('');
		cleanInput(element[i]);
	};
	$("textarea").val("");
	$("#pathologic").find(".note-editable").empty();
	$("#family").find(".note-editable").empty();
	$("#nopathologic").find(".note-editable").empty();
	$("#actually").find(".note-editable").empty();
	$("#devices").find(".note-editable").empty();
	$("#physics").find(".note-editable").empty(); 
}

function cleanSecondForm(){
	var element=new Array("#dates","#hour","#office","#doctor","#type");
	for (var i = 0; i < element.length; i++) {
		$(element[i]).val('');
		cleanInput(element[i]);
	};
}

function cleanInput(string){
	var nextelement=$(string).next().is("i");
	var parentelement=$(string).parent().parent().hasClass("has-error");
		var valor=$(string).val();
		if ($(string).val()=="" || $(string).val()!=""){
			if (nextelement==true) {
				$(string).next().remove();
			}
			else{}
			if (parentelement==true) {
				$(string).parent().parent().removeClass("has-error");
			}
			else{}
		}
		else{}
}

function irScroll(id){
  $("body, html").animate({
    scrollTop:$(id).offset().top-110,
  },1000);
  return false;
}

function messageInformation(titletxt,messagetxt,btntext, typebtn){
	BootstrapDialog.show({
		type: typebtn,
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

function messageAsk(titletxt,messagetxt, typebtn){
	BootstrapDialog.show({
		type: typebtn,
		title: titletxt,
		message: messagetxt,
		buttons: [{
                label: 'Cancelar',
                action: function(dialog) {
                    dialog.close();
                }
            }, {
                label: 'Agregar',
                action: function(dialog) {
                    dialog.setTitle('Title 2');
                }
            }]
		});
}

function crearData(){
	var info=[];
	info[0]=$("#pathologic").find(".note-editable").html();
	$("#editPathologic").val(info[0]);
	info[1]=$("#family").find(".note-editable").html();
	$("#editFamily").val(info[1]);
	info[2]=$("#nopathologic").find(".note-editable").html();
	$("#editNopathologic").val(info[2]);
	info[3]=$("#actually").find(".note-editable").html();
	$("#editActually").val(info[3]);
	info[4]=$("#devices").find(".note-editable").html();
	$("#editDevices").val(info[4]);
	info[5]=$("#physics").find(".note-editable").html(); 
	$("#editPhysics").val(info[5]);
}

function allEditor(){
	$('#editPathologic').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
	$('#editFamily').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
	$('#editNopathologic').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
	$('#editActually').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
	$('#editDevices').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
	$('#editPhysics').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
    $('#editPrevius').summernote({
        toolbar: [
    	    ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
        ],
        height: 300, codemirror: {
	    theme: 'monokai'}
    });
}

function updataPatient(pet,met){
	crearData();
	 $.ajax({
        beforeSend:function(){
        },
        url:pet,
        type:met,
        data:$('#patientAdd').serialize(),
        success:function(data){
        	console.log(data);
          if (data!=0 && data.length==1) {
          	loadData();
          	messageInformation("Mensaje de Confirmación ","Se realizó con éxito la actualización de los datos del paciente en el sistema de la clínica.","OK",BootstrapDialog.TYPE_SUCCESS);
          	irScroll(".margintopconteiner");
          	
          }else{
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la actualización de los datos del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la actualización de los datos del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
        },
        complete:function(jqXHR,edo){
        }
      })
}

function loadData(){
	var datos=$("#id").val();
	$("#idpatient").val(datos);
	if (datos!='') {
		$.get("class/patientLoad.php",{id:datos},function(data){
			//console.log(data);
			if(data!=0){
				var dataJson = eval(data);
		      	for(var i in dataJson){
		      		$('#name').val(dataJson[i].name);
					$('#app').val(dataJson[i].app);
					$('#apm').val(dataJson[i].apm);
					$("#patient").val(dataJson[i].name+" "+dataJson[i].app+" "+dataJson[i].apm)
					$('#sex').val(dataJson[i].sex);
					$('#borndate').val(dataJson[i].borndate);
					$('#age').val(dataJson[i].age);
					$('#bloodgroup').val(dataJson[i].bloodgroup);
					$('#phone').val(dataJson[i].phone);
					$('#cellphone').val(dataJson[i].cellphone);
					$('#marital').val(dataJson[i].marital);
					$('#address').val(dataJson[i].address);
					$('#community').val(dataJson[i].community);
					$('#municipaly').val(dataJson[i].municipaly);
					$('#code').val(dataJson[i].code);
					$('#levelschool').val(dataJson[i].levelschool);
					$('#profesional').val(dataJson[i].profesional);
					$('#religion').val(dataJson[i].religion);
					$('#email').val(dataJson[i].email);
					$('#observation').val(dataJson[i].observation);
					$("#pathologic").find(".note-editable").html(dataJson[i].patologic);
					$("#family").find(".note-editable").html(dataJson[i].family);
					$("#nopathologic").find(".note-editable").html(dataJson[i].nopatologic);
					$("#actually").find(".note-editable").html(dataJson[i].actually);
					$("#devices").find(".note-editable").html(dataJson[i].systemdevices);
					$("#previus").find(".note-editable").html(dataJson[i].previousdiagnoses); 
					$("#physics").find(".note-editable").html(dataJson[i].physic); 
		      	}
			}else{
				messageInformation("Información error de sistema","El sistema no puede cargar los datos del paciente.","OK",BootstrapDialog.TYPE_DANGER);		
			}
		});
	} else{
		messageInformation("Información error de sistema","El sistema no puede cargar los datos del paciente.","OK",BootstrapDialog.TYPE_DANGER);
	}
}

function addConsult(pet,met){
	crearData();
	 $.ajax({
        beforeSend:function(){
        },
        url:pet,
        type:met,
        data:$('#formConsult').serialize(),
        success:function(data){
        	console.log(data);
        	
          if (data!=0 && data.length==1) {
          	$('#formConsultModal').modal('hide');
          	messageInformation("Mensaje de Confirmación ","Se realizó con éxito la actualización de los datos del paciente en el sistema de la clínica.","OK",BootstrapDialog.TYPE_SUCCESS);
          	irScroll(".margintopconteiner");
          	
          }else{
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la actualización de los datos del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la actualización de los datos del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
        },
        complete:function(jqXHR,edo){
        }
      })
}