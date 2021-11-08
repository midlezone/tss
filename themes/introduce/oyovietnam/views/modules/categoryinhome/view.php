<?php if (isset($data) && count($data)) { ?>
    <div class="post">
        <div class="container">
            <div class="row">
                <?php foreach ($data as $cat) { ?>
                    <div class="col-xs-4 well animated fadeOutDown sb-effect-displayed fadeInDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown" style="opacity: 1;">
                        <div class="box-all-nd">
                            <div class="box-nd">
                                <div class="nd-nd clearfix">
                                    <div class="img-box-nd">
                                        <div class="img-box">
                                            <a class="bg-lv"></a>
                                            <a href="<?php echo $cat['link'] ?>" class="xemnhanh"></a>
                                            <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $cat['image_path'] . 's250_250/' . $cat['image_name'] ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="header-panel">
                                        <a href="<?php echo $cat['link'] ?>">
                                            <h3><?php echo $cat['cat_name']; ?></h3>
                                        </a> 
                                    </div>
                                    <p><?php ?></p>
                                    <div class="more-w"> 
                                        <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">
                                            <span><?php echo Yii::t('common', 'detail') ?></span>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}