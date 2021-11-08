<?php $this->beginContent('//layouts/main'); ?>
<div class="top-cont clearfix">
    <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
</div>
<div class="left overleaf">
    <div id="maincontent">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK7));
        ?>
        <?php
        $cat_id = Yii::app()->request->getParam('id', 0);
        $category = ProductCategories::model()->findByPk($cat_id);
        ?>
        <?php if($category->image_path != '' && $category['image_name'] != '') { ?>
            <div class="banner" style="margin-bottom: 10px;">
                <?php if (isset($category->image_path) && isset($category->image_name) && $category->image_path != '' && $category->image_name != '') { ?>
                    <img src="<?php echo ClaHost::getImageHost() . $category->image_path . $category->image_name ?>">
                <?php } ?>
            </div>
        <?php } ?>
        <div class="clearfix layout layout-2">
            <div id="contentCol" class="clearfix">
                <?php
                echo $content;
                ?>
                <?php
//                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                ?>
            </div>
            <div id="leftCol">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK8));
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->endContent(); ?>