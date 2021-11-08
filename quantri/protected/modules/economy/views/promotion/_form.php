<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'product-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        $from_create = Yii::app()->request->getParam('create');
        ?>

        <div class="tabbable">
            

            <div class="tab-content">
                <div id="basicinfo" class="tab-pane <?php if (!$from_create) echo 'active' ?>">
                    <?php
                    $this->renderPartial('partial/tabbasicinfo', array('model' => $model, 'form' => $form, 'option' => $option));
                    ?>
                </div>
                
            </div>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->