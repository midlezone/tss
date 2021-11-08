<?php
if (isset($allownull) && $allownull) {
    ?>
    <option value=""><?php echo Yii::t('common', 'choose_ward'); ?></option>
<?php } ?>
<?php
foreach ($listward as $ward) {
    ?>
    <option value="<?php echo $ward['ward_id'] ?>" latlng="<?php echo $ward['latlng']; ?>"><?php echo $ward['name']; ?></option>
<?php } ?>
