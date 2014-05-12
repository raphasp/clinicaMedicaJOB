$(document).on("ready", main);

function main(){
	var clasification;
	createDate();
	var cal = new CalHeatMap();
		cal.init({
			itemSelector: "#cal-heatmap",
			domain: "month",
			subDomain: "x_day",
			range: 4,
			cellSize: 28,
			cellPadding: 5,
			cellRadius: 3,
			subDomainTextFormat: "%d",
			domainMargin: 20,
			highlight: ["now"],
			displayLegend: false,
			previousSelector: "#cal-before",
			nextSelector: "#cal-next",
			tooltip: true,
			
			onClick: function(date, nb) {
				//alert(date.getDay()+"/"+date.getMonth()+"/"+date.getFullYear());
			}		
		});

	$("#phone").mask("999-999-9999");
	$("#cellphone").mask("999-999-9999");

	$("#perfiluser").hide();
	$("#age").numeric();

	$("#nameuser").click(function(){
		var $div;
		$div=$("#perfiluser");
		$div.fadeToggle();
		$div.effect("slow");		
	});

	$("#patient").focusin(function(){
		var string="<div class='col-md-12'><div class='input-back-job-lg form-group has-feedback'><input class='form-control input-sm input-job' id='search' name='search' type='text' placeholder='Abc...z' required></div></div>"
		var inputs=$.parseHTML(string)
		messageAskAdd("Asignar Paciente ", inputs);
	});

	$("body").delegate("#tableexam tr","click",function(){
		alert("HOLASSS");
	});

	$("input").focusout(function(){
		valor=$(this).val();
		
		if ($(this).attr("type")=="text" || $(this).attr("type")=="email")  {
			if(valor=="___-___-____"){
				$(this).val("");
			}
			verifyInputData("#"+$(this).attr("id"));
			var valor=changenUpperCase($(this).val());
			$(this).val(valor);
		}else{
			verifySelectData("#"+$(this).attr("id"));	
		}
	});

	$("#cal-start").on("click",function(){
		cal.rewind();
	});

	$("select").change(function(){
		verifySelectData("#"+$(this).attr("id"));
	});

	$("select").focusout(function(){
		verifySelectData("#"+$(this).attr("id"));
	});

	$('#editPathologic').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
	});
	$('#editFamily').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
	});
	$('#editNopathologic').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
	});
	$('#editActually').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
	});
	$('#editDevices').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
	});
	$('#editPhysics').summernote({height: 300, codemirror: {
	    theme: 'monokai'}
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

function createDate(){
	var monthNames=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Nobriembre","Diciembre"];
	var dayNames=["Lunes","Martes","Miércoles","Jueves","Viernes","Sabado","Domingo"]

	var newDate=new Date();

	newDate.setDate(newDate.getDate());
	$("#Date").html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval(function(){
		var seconds=new Date().getSeconds();
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);

	setInterval(function(){
		var minutes=new Date().getMinutes();
		$("#min").html((minutes<10 ? "0":"")+minutes);
	},1000);
	
	setInterval(function(){
		var hours=new Date().getHours();
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	},1000);
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