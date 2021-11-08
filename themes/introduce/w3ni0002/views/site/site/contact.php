<?php if (Yii::app()->user->hasFlash('contact')): ?>
    <div class="flash-succes stext-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
<?php else: ?>
    <div class="box-form content-post1">
        <p>Xin vui lòng điền các yêu cầu vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!</p>
        <br />
        <br />
        <div class="col-sm-12">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'contact_form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form-horizontal',
                    'role' => 'form',
                ),
            ));
            ?>
            <table border="0" cellspacing="5" cellpadding="5">
                <tr>
                    <td align="left">
                        <b>
                            <?php echo $model->getAttributeLabel('contact_name'); ?>
                            <span style="color:red">*</span>
                        </b>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'contact_name', array('class' => 'form-control inputbox')); ?>
                        <?php echo $form->error($model, 'contact_name'); ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>
                            <?php echo $model->getAttributeLabel('contact_email'); ?>
                            <span style="color:red">*</span>
                        </b>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'contact_email', array('class' => 'form-control inputbox')); ?>
                        <?php echo $form->error($model, 'contact_email'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>
                            <?php echo $model->getAttributeLabel('contact_phone'); ?>
                            <span style="color:red">*</span>
                        </b>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'contact_phone', array('class' => 'form-control inputbox')); ?>
                        <?php echo $form->error($model, 'contact_phone'); ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>
                            <?php echo $model->getAttributeLabel('contact_subject'); ?>
                            <span style="color:red">*</span>
                        </b>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'contact_subject', array('class' => 'form-control inputbox')); ?>
                        <?php echo $form->error($model, 'contact_subject'); ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>
                            <?php echo $model->getAttributeLabel('contact_enquiry'); ?>
                            <span style="color:red">*</span>
                        </b>
                    </td>
                    <td>
                        <?php echo $form->textArea($model, 'contact_enquiry', array('class' => 'form-control inputbox', 'style' => 'margin:5px;')); ?>
                        <?php echo $form->error($model, 'contact_enquiry'); ?>
                    </td>
                </tr>

                <?php if (CCaptcha::checkRequirements()): ?>
                    <tr>
                        <td>
                            <b>
                                <?php echo $model->getAttributeLabel('verifyCode'); ?>
                            </b>
                        </td>
                        <td>
                            <div>
                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model, 'verifyCode', array()); ?>
                            </div>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
            <div class="send-yc" align="center">
                <?php
                echo CHtml::submitButton(Yii::t('common', 'sendrequest'), array(
                    'class' => 'btn btn-primary'
                ));
                ?>
                <?php
                echo CHtml::resetButton(Yii::t('common', 'reset'), array(
                    'class' => 'btn'
                ));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- form -->
<?php endif; ?>