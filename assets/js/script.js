/*------------------- 
|   EVENT NAVBAR    |
-------------------*/
$(window).on('scroll', function () {
	if ($(window).scrollTop()) {
		$('.navbar').css({
			'background-color': '#000000'
		})
		$(".navbar").addClass("shadow-sm");
	} else {
		$('.navbar').css({
			'background': 'transparent'
		})
		$(".navbar").removeClass("shadow-sm");
	}
})
