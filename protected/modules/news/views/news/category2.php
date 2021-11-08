<div class="listnews">
    <div class="list">
        <?php if (count($listnews)) { ?>
		
            <?php
            foreach ($listnews as $ne) {
                ?>
                <div class="list-item" style="padding: 5px;">
                    <div class="list-content">
                        <div class="list-content-box">
                            <?php if ($ne['image_path'] && $ne['image_name']) { ?>
                                <div class="list-content-img">
                                    <a href="<?php echo $ne['link']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                                    </a>
                                </div>
                            <?php } ?>

							<?php if($ne['news_category_id'] == '6300' || $ne['news_category_id'] == '6302' || $ne['news_category_id'] == '6301'
							|| $ne['news_category_id'] == '6290'): ?>

                                <div class="list-content-body">

                                    <span class="list-content-title">
                                        <a href="<?php echo $ne['link']; ?>">
                                            <?php echo $ne['news_title']; ?>
                                        </a>
                                    </span>
    									
    								
                                </div>
							<?php else: ?>

                                 <div class="list-content-body">

                                    <span class="list-content-title">
                                        <a href="<?php echo $ne['link']; ?>">
                                            <?php echo $ne['news_title']; ?>
                                        </a>
                                    </span>
                                       
                                    
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="wpager">
        <?php
        $this->widget('common.extensions.LinkPager.LinkPager', array(
            'itemCount' => $totalitem,
            'pageSize' => $limit,
            'header' => '',
            'selectedPageCssClass' => 'active',
        ));
        ?>
    </div>
</div>