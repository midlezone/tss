<?php

echo CHtml::textField('link', $data['link'], array('class' => 'support-input', 'placeholder' => Yii::t('support', 'fb_link')));
echo CHtml::textField('title', $data['title'], array('class' => 'support-input', 'placeholder' => Yii::t('support', 'fb_title')));
?>