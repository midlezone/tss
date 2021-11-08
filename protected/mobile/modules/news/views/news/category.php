 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<div class="listnews">
    <div class="list">
        <?php if (count($listnews)) { ?>
            <?php
            foreach ($listnews as $ne) {
                ?>
                <div class="list-item blogBox moreBox" style="display: none;">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $ne['link']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <span class="list-content-title">
                                    <a href="<?php echo $ne['link']; ?>">
                                        <?php echo $ne['news_title']; ?>
                                    </a>
                                </span>
                                <div class="list-content-detail">
                                    <p>
                                        <?php
                                        echo $ne['news_sortdesc'];
                                        ?>
                                    </p>
                                </div>
								<div class="redmore">
								 <a href="<?php echo $ne['link']; ?>">Xem Thêm</a>
							  </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
			<a id="loadMore" class="join fivetips-joinlink" style="z-index: 999; float: none; border-radius: 4px;
			 padding: 7px 16px; margin-top: 15px;">Xem Thêm →</a>
			 
       <?php } ?>
    </div>
	
	
			 
</div>

<script>

	$( document ).ready(function () {
                $(".moreBox").slice(0, 8).show();
                if ($(".blogBox:hidden").length != 0) {
                        $("#loadMore").show();
                }               
                $("#loadMore").on('click', function (e) {
                        e.preventDefault();
                        $(".moreBox:hidden").slice(0, 8).slideDown();
                        if ($(".moreBox:hidden").length == 0) {
                                $("#loadMore").fadeOut('slow');
                        }
                });
        });
		

</script>

