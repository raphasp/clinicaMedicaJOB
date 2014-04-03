$(document).on("ready", main);

function main(){
	$("#username").tooltip({
        placement : 'top'
    });
    $("#password").tooltip({
        placement : 'bottom'
    });
}