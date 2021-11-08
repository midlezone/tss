
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/toyotathanhvinh/css/slider/style.css" type="text/css" media="screen" />


<script type="text/javascript" src="/themes/introduce/koji/js/jquery.nivo.slider.js"></script> 
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 


<div class="slider-wrapper theme-default">

<div id="slider" class="nivoSlider"> 
		<?php foreach ($banners as $banner) { ?> 
			<img src="<?php echo $banner['banner_src']; ?>" data-thumb="<?php echo $banner['banner_src']; ?>" alt="" /> 
		<?php } ?>	
 </div>
 
</div>

