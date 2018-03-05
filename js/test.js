$(window).on("load",function(e){
	for(var z=2;z<=41;z++){
		$("#qn"+z).addClass("hide-question");
	}
	if($(window).width()<905){
		$(".question-index .sheet-title-holder>h2").text("Index");
	}
	else
		$(".question-index .sheet-title-holder>h2").text("Question Index");
});
// $(window).blur(function(){
// 	alert("Dont Leave Window");
// });
$(window).on("resize",function(e){
	for(var z=2;z<=41;z++){
		$("#qn"+z).addClass("hide-question");
	}
	if($(window).width()<905){
		$(".question-index .sheet-title-holder>h2").text("Index");
	}
	else
		$(".question-index .sheet-title-holder>h2").text("Question Index");
});
function qchanger(id){
	for(var i=1;i<=41;i++){
		if(("#qi"+i)!=id){
			$("#qn"+i).addClass("hide-question").removeClass("show-question");
			$("#qi"+i).removeClass("question-number-active").removeClass("prev-question").removeClass("next-question");
			if(("#qi"+(i+1))==id){
				$("#qi"+i).addClass("prev-question").removeClass("hide-question").removeClass("show-question");
			}
			if(("#qi"+(i-1))==id){
				$("#qi"+i).addClass("next-question").removeClass("hide-question").removeClass("show-question");
			}
		}
		else{
			$("#qn"+i).addClass("show-question").removeClass("hide-question");
			$("#qi"+i).addClass("question-number-active").removeClass("prev-question").removeClass("next-question");
		}
	}
}

$("#index-trigger-hide").click(function(){
	$(".sheet").toggleClass('full-screen-sheet');
	$("#index-trigger-show").toggleClass('change-index-trigger-show');
	$(".question-index").toggleClass('hide-index');
	$("#index-trigger-hide").toggleClass('change-index-trigger');
});
$("#index-trigger-show").click(function(){
	$(".sheet").toggleClass('full-screen-sheet');
	$("#index-trigger-show").toggleClass('change-index-trigger-show');
	$(".question-index").toggleClass('hide-index');
	$("#index-trigger-hide").toggleClass('change-index-trigger');
});




$("#qi1").click(function(){
	qchanger("#qi1");
});
$("#qi2").click(function(){
	qchanger("#qi2");
});
$("#qi3").click(function(){
	qchanger("#qi3");
});
$("#qi4").click(function(){
	qchanger("#qi4");
});
$("#qi5").click(function(){
	qchanger("#qi5");
});
$("#qi6").click(function(){
	qchanger("#qi6");
});
$("#qi7").click(function(){
	qchanger("#qi7");
});
$("#qi8").click(function(){
	qchanger("#qi8");
});
$("#qi9").click(function(){
	qchanger("#qi9");
});
$("#qi10").click(function(){
	qchanger("#qi10");
});
$("#qi11").click(function(){
	qchanger("#qi11");
});
$("#qi12").click(function(){
	qchanger("#qi12");
});
$("#qi13").click(function(){
	qchanger("#qi13");
});
$("#qi14").click(function(){
	qchanger("#qi14");
});
$("#qi15").click(function(){
	qchanger("#qi15");
});
$("#qi16").click(function(){
	qchanger("#qi16");
});
$("#qi17").click(function(){
	qchanger("#qi17");
});
$("#qi18").click(function(){
	qchanger("#qi18");
});
$("#qi19").click(function(){
	qchanger("#qi19");
});
$("#qi20").click(function(){
	qchanger("#qi20");
});
$("#qi21").click(function(){
	qchanger("#qi21");
});
$("#qi22").click(function(){
	qchanger("#qi22");
});
$("#qi23").click(function(){
	qchanger("#qi23");
});
$("#qi24").click(function(){
	qchanger("#qi24");
});
$("#qi25").click(function(){
	qchanger("#qi25");
});
$("#qi26").click(function(){
	qchanger("#qi26");
});
$("#qi27").click(function(){
	qchanger("#qi27");
});
$("#qi28").click(function(){
	qchanger("#qi28");
});
$("#qi29").click(function(){
	qchanger("#qi29");
});
$("#qi30").click(function(){
	qchanger("#qi30");
});
$("#qi31").click(function(){
	qchanger("#qi31");
});
$("#qi32").click(function(){
	qchanger("#qi32");
});
$("#qi33").click(function(){
	qchanger("#qi33");
});
$("#qi34").click(function(){
	qchanger("#qi34");
});
$("#qi35").click(function(){
	qchanger("#qi35");
});
$("#qi36").click(function(){
	qchanger("#qi36");
});
$("#qi37").click(function(){
	qchanger("#qi37");
});
$("#qi38").click(function(){
	qchanger("#qi38");
});
$("#qi39").click(function(){
	qchanger("#qi39");
});
$("#qi40").click(function(){
	qchanger("#qi40");
});
$("#prev").click(function(){
	$(".prev-question").each(function(){
		qchanger("#"+$(this).attr('id'));
	});
});
$("#next").click(function(){
	$(".next-question").each(function(){
		qchanger("#"+$(this).attr('id'));
	});
});


// $(window).blur(function(){
// 	alert("You are banned.");
// });