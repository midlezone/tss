<?php if ($category['image_path'] != '' && $category['image_name'] != '') { ?>
    <div class="banner-trong">
        <a onclick="javascript:void(0)">
            <img alt="<?php echo $category['cat_name'] ?>" src="<?php echo ClaHost::getImageHost() . $category['image_path'] . $category['image_name'] ?>" />
        </a>
    </div>
<?php } ?>

<div class="content clearfix">
    <div class="left">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
    </div>
    <div class="right">
        <div id="contentCol">
            <div id="centerCol">
                <div class="centerContent">
                    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
                    <div class="welcome ">
                        <div class="title-w">
                            <h2><?php echo $category['cat_name'] ?></h2>
                        </div>
                        <div class="content-w ">
                            <div class="content-w-nd">
                                <p><?php echo nl2br($category['cat_description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php if (count($listnews)) { ?>
                        <div class="centerContent">
                            <div class="center-main-center">
                                <div class="listnews">
                                    <div class="list">
                                        <?php foreach ($listnews as $ne) { ?>
                                            <div class="list-item list-item-category">
                                                <div class="list-content">
                                                    <div class="list-content-box">
                                                        <div class="list-content-img">
                                                            <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title'] ?>">
                                                                <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's200_200/' . $ne['image_name']; ?>" alt="<?php echo $ne['news_title']; ?>" />
                                                            </a>
                                                        </div>
                                                        <div class="list-content-body">
                                                            <span class="list-content-title">
                                                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title'] ?>">
                                                                    <?php echo $ne['news_title']; ?>
                                                                </a>
                                                            </span>
                                                            <div class="list-content-detail">
                                                                <p><?php echo $ne['news_sortdesc'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="box-product-page clearfix">
                                        <div class="product-page" style="float:right; max-width: 500px; text-align: right; ">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featured-services">
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
</div>
