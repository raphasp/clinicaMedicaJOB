$(document).on("ready", main);

function main(){
	searchCook();
	$("#username").tooltip({
        placement : 'top'
    });
    $("#password").tooltip({
        placement : 'bottom'
    });
}

function searchCook(){
	
	var url=("class/securitysesion.php");
	
	$.get(url,function(data){
		if(data=="error"){
			}else{
				redireccionar(data);
			}
	});
}

function redireccionar(dir){  
  window.location.href="/ClinicaJOB/clinicaMedicaJOB/"+dir;  
}   
