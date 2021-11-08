<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <?php
    $cat_id = Yii::app()->request->getParam('id', 0);
    $category = ProductCategories::model()->findByPk($cat_id);
    ?>
    <div class="banner">
        <?php if (isset($category->image_path) && isset($category->image_name) && $category->image_path != '' && $category->image_name != '') { ?>
            <img src="<?php echo ClaHost::getImageHost() . $category->image_path . $category->image_name ?>">
        <?php } ?>
    </div>
    <div class="content clearfix">
        <div class="left">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
            ?>
        </div>
        <div class="right">
            <div id="contentCol">
                <div id="centerCol">
                    <div class="centerContent">
                        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
                        <?php
                        echo $content;
                        ?>
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>