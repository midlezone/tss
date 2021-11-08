<div id="home-page" class="container-wrapper textile">
	<div class="desktop-slideshow" id="slideshow-container">
	   <img class="slides-container" src="//cdn.shopify.com/s/files/1/0404/9121/t/59/assets/slide-show-container.png?2292869871446415388">
	   <div id="gallery">
			<?php foreach ($banners as $banner) { ?>
					<a href="#" >
						<img alt="<?php echo $banner['banner_name'] ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
					</a>
			<?php } ?>   	
			
	   </div>
	</div>
	<div class="col col50">
		<h2 class="text1">Công nghệ Hydorgen lần đầu tiên được ứng dụng trong ngành làm đẹp. Nó đã được thế giới chào đón như một sự kiện đặc biệt, 
		một bước ngoặt lớn trong ngành công nghiệp hàng trăm tỉ đô la này.</h2>
		<h3 class="text2">Chỉ cần chạm đến nó, bạn sẽ phải Ồ lên thích thú như vừa phát hiện ra một thếp tiền trong đống đồ cũ mà bạn đã bỏ quên lâu ngày.</h2>
		<h2 class="text3">Lisse - thật sự là một điều kỳ diệu mà xứ sở Kim Chi dành tặng cho thế giới.</h2>
		
	   <p class="home-desktop-view-button" style="text-align: center;"><a href="/san-pham" class="join fivetips-joinlink" style="z-index: 999; float: none; border-radius: 4px;
		  padding: 1em 3em;">Xem Sản Phẩm →</a></p>
	</div>
</div>

<style type="text/css">

	

</style>
<script type="text/javascript">

$(document).ready(function() {		
	
	//Execute the slideShow
	slideShow();

});

function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}

</script>