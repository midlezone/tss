<?php $this->beginContent('//layouts/main'); ?>
<style>
    #main .container{
        background: #fff; padding:0 15px;
    }
</style>
<div class="container">
    <?php
    $cat_id = Yii::app()->request->getParam('id', 0);
    $category = ProductCategories::model()->findByPk($cat_id);
    ?>
 
    <div class="content clearfix" style="margin-top: 20px;">
       
	    <div class="left">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
            ?>
        </div>
		<div class="arrange">
			<?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK2));
			?>
		</div>
		<div class="displayed">
			<?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK1));
			?>
		</div>
		
        <div class="right">
            <div id="contentCol">
                <div id="centerCol">
                    <div class="centerContent">
                        <?php
                        echo $content;
                        ?>
						
                        <?php

                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK7));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>