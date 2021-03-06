$(document).ready(function () {
	$(".controlador").click(function() {
		var valor = $(this).html();
		if(valor == "Calificaciones") {
			controlador(1);
		}
		if(valor == "Asistencia") {
			controlador(2);
		}
		if (valor == "Mis Datos") {
			controlador(3);
		}
		$("li").removeClass("active");	
		$(this).parent().closest("li").addClass("active");
	});

	$("#content").on("click", ".card", function(e) {
		var table = $(this).find(".tableCal");
		if(table.is(":hidden")) {
			table.slideDown("slow");
		} else {
			table.slideToggle("slow");
		}
	});
});

function controlador(direccion) {
	if (direccion == 1) {
		$.ajax({
			url: "Calificaciones.php",
			type: "POST",
			dataType: "HTML",
		}).done(function(data){
			$("#content").fadeOut(100, function(){
				$(this).html(data).fadeIn(100);
			});
		});
	}
	if (direccion == 2) {
		$.ajax({
			url: "Asistencia.php",
			type: "POST",
			dataType: "HTML",
		}).done(function(data){
			$("#content").fadeOut(100, function(){
				$(this).html(data).fadeIn(100);
			});
		});
	}
	if (direccion == 3) {
		$.ajax({
			url: "MisDatos.php",
			type: "POST",
			dataType: "HTML",
		}).done(function(data){
			$("#content").fadeOut(100, function(){
				$(this).html(data).fadeIn(100);
			});
		});
	}
}