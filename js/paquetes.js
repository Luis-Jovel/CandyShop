$(document).on("ready",function(){
	$("#menu-paquete").click(function (e) {
		e.preventDefault();
		$("#modal-paquete").modal();
	});
});