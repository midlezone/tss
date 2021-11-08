<div class="search search1 ">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="form-horizontal clearfix">
        <input type="text" class="form-control" placeholder="<?php echo $placeHolder; ?>" name="<?php echo $keyName; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
        <input class="btn btn-default" type="submit" value="<?php echo Yii::t('common', 'common_search'); ?>">
    </form>
</div>