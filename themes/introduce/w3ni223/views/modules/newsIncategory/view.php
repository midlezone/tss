<?php if (count($news)) { ?>
    <div class="product-home">
        <div class="container">
            <div class="title clearfix">
                <h2><?php echo $category['cat_name'] ?></h2>
                <a class="view" href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo Yii::t('common', 'viewall') ?></a>
            </div>
            <div class="cont">
                <div class="row">
                    <?php foreach ($news as $ne) { ?>
                        <div class="col-sm-4 box-product">
                            <div class="box-img">
                                <a href="<?php echo $ne['link'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's350_350/' . $ne['image_name'] ?>" alt="<?php echo $ne['news_title'] ?>">
                                </a>
                            </div>
                            <div class="title-product">
                                <h3>
                                    <a href="<?php echo $ne['link'] ?>" title="<?php echo $ne['news_title'] ?>"><?php echo $ne['news_title'] ?></a>
                                </h3>
                            </div>
                            <div class="body-product">
                                <div class="description">
                                    <p><?php echo nl2br($ne['news_sortdesc']); ?></p>
                                </div>
                                <div class="buttom-view">
                                    <a href="<?php echo $ne['link'] ?>" title="<?php echo Yii::t('common', 'view_detail') ?>"><?php echo Yii::t('common', 'view_detail') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

