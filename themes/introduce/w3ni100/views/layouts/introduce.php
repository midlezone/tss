<?php $this->beginContent('//layouts/main'); ?>

<?php
$this->renderPartial('//layouts/partial/ileft');
?>

<?php echo $content; ?>
<?php
$this->renderPartial('//layouts/partial/iright');
?>
<div style="clear:both"></div>
<?php $this->endContent(); ?>