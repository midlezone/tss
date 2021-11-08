<div class="box-timkiem"> 
    <div class="icon-tk"> </div>
    <div class="timkiem">
        <div class="search search1 ">
            <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
                <input type="text" class="form-control" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
                
                <input type="submit" value="<?php echo Yii::t('common', 'common_search'); ?>" class="btn btn-default"/>
            </form>
        </div>
    </div>
</div>
