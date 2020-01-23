var contador = 1;
function header(){
	if(contador == 1){
		$('nav').animate({
			left: '0'
		});
		contador = 0;
	}else{
		contador = 1;
		$('nav').animate({
			left: '-100%'
		});
	}
}

$("#main").click(function(e) {
		contador = 1;
		$('nav').animate({
			left: '-100%'
		});
});

// function ifrmOver(){
// 	var checkS = $("#servicios").hasClass("hide");
// 	if (!checkS) {
// 		$("#servicios").addClass("hide");
// 	}
// 	var checkN = $("#nosotros").hasClass("hide");
// 	if (!checkN) {
// 		$("#nosotros").addClass("hide");
// 	}
// 	var checkG = $("#servicios").hasClass("hide");
// 	if (!checkG) {
// 		$("#gestion").addClass("hide");
// 	}
// }

// SERVICIOS
$(".titular").click(function(e) {
	var check = $(".currentDropdown").hasClass("hide");
	if (e.target.className != "current") {
		if (!check) {
			$(".dropdown").addClass("hide");
			$(".button_nav").removeClass("current")
			$(".dropdown").removeClass("currentDropdown")
		}
	}
	});


$(".main").click(function(e) {
	var check = $(".currentDropdown").hasClass("hide");
	if (e.target.className != "current") {
		if (!check) {
			$(".dropdown").addClass("hide");
			$(".button_nav").removeClass("current")
			$(".dropdown").removeClass("currentDropdown")			
		}
	}
});

function hidder(id, idNav){
	if($(".current")[0]){
		if($('#' + idNav).hasClass("current")){
			$(".dropdown").addClass("hide");
			$(".button_nav").removeClass("current")[0];
			$(".dropdown").removeClass("currentDropdown")[0];
		}else{
			$(".dropdown").addClass("hide");
			$(".button_nav").removeClass("current")[0];
			$(".dropdown").removeClass("currentDropdown")[0];
			var check = $('#' + id).hasClass("hide");
			if(check){
				$('#' + id).addClass("currentDropdown")
				$('#' + idNav).addClass("current");
				$('#' + id).removeClass("hide");
			}
		}
	}else{
		var check = $('#' + id).hasClass("hide");
		if(check){
			$('#' + id).addClass("currentDropdown")
			$('#' + idNav).addClass("current");
			$('#' + id).removeClass("hide");
		}else{
			$('#' + id).removeClass("currentDropdown")
			$('#' + idNav).removeClass("current");
			$('#' + id).addClass("hide");
		}
	}
}
