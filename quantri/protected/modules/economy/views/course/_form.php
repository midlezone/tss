<div class="row">
    <div class="col-xs-12 no-padding">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'course-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ));
        ?>
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#basicinfo">
                        <?php echo Yii::t('course', 'course_basicinfo'); ?>
                    </a>
                </li>
                
            </ul>

            <div class="tab-content">
                <div id="basicinfo" class="tab-pane active">
                    <?php
                    $this->renderPartial('partial/tab_basic_info', array(
                        'model' => $model, 
                        'form' => $form, 
                        'category' => $category,
                    ));
                    ?>
                </div>
                
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>