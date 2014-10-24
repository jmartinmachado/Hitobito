$(document).ready(function(){
	$("#resplandor").fadeTo("slow", 0.0);
	$("#resplandor").hover(function(){
		$(this).fadeTo("fast", 1.0);
	},function(){
		$("#resplandor").fadeTo("fast", 0.0);
	});
	$("#Field_formulario_C").fadeOut(1);

});