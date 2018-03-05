$(window).on("load",function(e){
	var winheight=$( window ).height();
	winheight=winheight-50;
	$(".left-menu").css('height',winheight);
	$(".slider img").css('max-height',winheight);
	$(".item-holder").css('height',winheight-59);
});

$('#mainmenutrigger').click(function(){
	$('.mainmenu').slideToggle();
});
$("#user-panel-icon").click(function(){
	$(".userarea").slideToggle();
});