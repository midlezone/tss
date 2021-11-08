<div class="about">
    <div class="container2">
       
		<div class="gdl-header-wrapper ">
			  <div class="gdl-header-left-bar">
			  </div>
			  <div class="gdl-header-left-bar"></div>
			  <h3 class="gdl-header-title"><?php echo $data['title'] ?></h3>
			  <div class="gdl-header-divider"></div>
			  <div class="clear"></div>
		   </div>
        <div class="content-w ">
            <div class="content-w-nd">
                <p><?php echo nl2br($data['sortdesc']); ?></p>
				<a class="blog-continue-reading1" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">Chi Tiết →</a>
            </div>
		
        </div>
    </div>
</div>
