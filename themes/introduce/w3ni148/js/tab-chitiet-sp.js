$(document).ready (function(){
	//$('.tab-content:not(:first)').hide();
	$('.tabs li a').click(function(){
		if($(this).hasClass('active'))
			return false;
		$('.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.tab-container .tab-content').removeClass('active');
		//
		var activeTab = $(this).attr('href');
		//
		$(activeTab).addClass('active');
		//
		//$(activeTab).fadeIn();
		return false;
	});
});