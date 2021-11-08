
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/themes/introduce/dulich/css/slider/style.css" type="text/css" media="screen" />


<script type="text/javascript" src="/themes/introduce/dulich/js/jquery.nivo.slider.js"></script> 
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<div class="slider-wrapper theme-default">

<div id="slider" class="nivoSlider"> 
		<?php foreach ($banners as $banner) { ?> 
			<img src="<?php echo $banner['banner_src']; ?>" data-thumb="<?php echo $banner['banner_src']; ?>" alt="" /> 
		<?php } ?>	
 </div>
 
</div>

