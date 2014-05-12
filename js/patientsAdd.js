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
		$("#divcommunity").toggleClass("col-md-offset-1");
		$("#divmunicipaly").toggleClass("col-md-offset-1");
		$("#divaddress").toggleClass("col-md-offset-1");
	});

	$("#patientAdd").submit(function(e){
		e.preventDefault(); 
		var pet=$(this).attr("action");
		var met=$(this).attr("method");
		if (verifyForm()==false) {
			messageInformation("Mensaje de Alerta",'Algún o algunos  de los campos de formulario están básicos o no cumplen con la especificación requerida',"OK",BootstrapDialog.TYPE_WARNING);
		} else{
			addPatient(pet,met);
		}		
	});

	$("#add-patient").on("click",function(){
		cleanAll();
		irScroll(".margintopconteiner");
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
	$("#previus").find(".note-editable").empty(); 
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
	info[6]=$("#previus").find(".note-editable").html();
	$("#editPrevius").val(info[6]);
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

function addPatient(pet,met){
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
          	messageInformation("Mensaje de Confirmación ","Se realizó con éxito la admisión del paciente en el sistema de la clínica.","OK",BootstrapDialog.TYPE_SUCCESS);
          	irScroll(".margintopconteiner");
          	cleanAll();
          }else{
          	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
          }
        },
        error:function(jqXHR,edo,error){
        	messageInformation("Mensaje de Error","Se produjo un error interno al momento de la admisión del paciente en el sistema.","OK",BootstrapDialog.TYPE_DANGER);
        },
        complete:function(jqXHR,edo){
        }
      })
}