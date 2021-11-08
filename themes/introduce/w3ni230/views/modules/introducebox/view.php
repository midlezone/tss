<div class="col-xs-4">
    <div class="box-all-nd">
        <div class="header-panel">
            <a class="head-title" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title']; ?>">
                <h3><?php echo $data['title']; ?></h3>
            </a>
        </div>
        <div class="box-nd">
            <div class="nd-nd">	
                <div class="img-box-nd">
                    <div class="img-box">
                        <a href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>" title="<?php echo $data['title']; ?>">
                            <img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . 's280_280/' . $data['image_name']; ?>" alt="<?php echo $data['title']; ?>"/>
                        </a>
                    </div>
                </div>
                <p>
                    <?php
                    echo $data['sortdesc'];
                    ?>
                </p>	
            </div>
        </div><!--end-box-nd-->	
    </div>
</div>