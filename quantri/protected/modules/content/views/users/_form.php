
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/imagesloaded.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/effects/masonry.min.js');
?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js') ?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/style3/colorbox.css"></link>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.css"></script>

<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        ));
        ?>

        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#basicinfo">
                        <?php echo Yii::t('users', 'Thông tin cơ bản'); ?>
                    </a>
                </li>
				
               
             
              
            </ul>

            <div class="tab-content">
                <div id="basicinfo" class="tab-pane active">
                    <?php
                    $this->renderPartial('partial/tabbasicinfo', array('model' => $model,'district_id' => $district_id,'province_id' => $province_id,'form' => $form));
                    ?>
                </div>
				
           
            </div>
        </div>
		
		 <div class="control-group form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'save') : Yii::t('common', 'save'), array('class' => 'btn btn-info', 'id' => 'savenews')); ?>
		</div>
	
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
