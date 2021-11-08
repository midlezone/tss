<div class="icon-tk"> </div>
<div class="timkiem">
    <div class="search search1 ">
        <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="form-horizontal clearfix">
            <input type="text" class="form-control" name="<?php echo $keyName; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
            <input class="btn btn-default" type="submit" value="<?php echo Yii::t('common', 'common_search') ?>">
        </form>
    </div>
</div>
<script>
    $(function () {
        $(".icon-tk").click(function () {
            if ($(".timkiem").hasClass("abc") == false) {
                $(".timkiem").addClass("abc")
            }
            else {
                $(".timkiem").removeClass("abc")
            }
        })
    });
</script>
