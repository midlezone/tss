<form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
    <div class="search-inputbox">
        <div class="search-input-submit">
            <input type="submit" value="<?php echo Yii::t('common', 'common_search'); ?>" class="submitForm">
        </div>
        <div class="search-input-content">
            <input type="text" class="form-control inputSearch keyword" placeholder="<?php echo $placeHolder; ?>" name="<?php echo $keyName; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
        </div>
    </div>
</form>
