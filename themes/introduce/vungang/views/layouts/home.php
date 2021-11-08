<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>

<?php
echo $content;
?>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
<div class="strategy-product">
    <div class="container">
        <div class="title">
            <h2>
                <a href="#" title="#" class="ms-tittle-product">Sản phẩm</a>
            </h2>
        </div>
        <div class="cont">
            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3)); ?>
<div class="bottom-main">
    <div class="container">
        <div class="partner">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>