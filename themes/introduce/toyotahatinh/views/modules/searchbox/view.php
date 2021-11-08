
<div class="search-form">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div class="clearfix">
            <input type="text" class="svalue box-search" placeholder="<?php echo $placeHolder; ?>" name="<?php echo $keyName; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
            <input type="submit" value="<?php echo Yii::t('common', 'common_search'); ?>" class="btnsearch">
        </div>
    </form>
</div>