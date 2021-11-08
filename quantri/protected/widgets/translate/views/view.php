<?php
$params[ClaSite::LANGUAGE_KEY] = 'en';
$params[ClaSite::LANGUAGE_ENCRYPTION] = ClaSite::getLanguagePublicKey('en');
?>
<a href="<?php echo Yii::app()->createUrl($baseUrl, $params); ?>">
    <i class="icon-language <?php echo $iconClass; ?>"></i>
</a>